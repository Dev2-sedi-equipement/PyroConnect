<?php

namespace App\Controller;

use App\Entity\Dossiers;
use App\Entity\Notification;
use App\Repository\DossiersRepository;
use App\Twig\Components\DossiersSearch;
use App\Message\NewNotificationsMessage;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\NotificationRepository;
use App\Components\DossiersSearchComponent;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VrpController extends AbstractController
{

    
    #[Route('/vrp', name: 'app_vrp', methods: ['GET', 'POST'])]
    public function index(Security $security, EntityManagerInterface $entityManager, DossiersRepository $dossiersRepository, Request $request,PaginatorInterface $paginator,NotificationRepository $notificationRepository,
    ): Response
    {
        
        // Créer une instance du cache
        $cache = new FilesystemAdapter();

        // Vider tout le cache
        $cache->clear();
 
        $user = $security->getUser();
 

        $VRP = $security->getUser()->getRoles() == ["VRP"];
        $SF = $security->getUser()->getRoles() == ["SF"];

        $this->isGranted('VRP');
        
        // Vérifie si l'utilisateur est connecté
        if ($user === null) {
            return $this->redirectToRoute('app_login');
        }else if($SF) {
            return $this->redirectToRoute('app_index');
        } else {
            
            $dossiersSearch = new DossiersSearch($dossiersRepository, $security);
            $userId = $user->getId();
          

            $cache = new FilesystemAdapter();

            $dossiers = $cache->get('dossiers_' . $userId, function ($item) use ($dossiersRepository, $user) {
                $item->expiresAfter(3600); // Temps de mise en cache : 1 heure
                return $dossiersRepository->findDossiersByVrpId($user->getId());
            });
            
            $notificationRepository = $entityManager->getRepository(Notification::class);
            $notificationsLength = count($notificationRepository->findNotificationsByUser($userId));   


            $noResult = "Aucun dossier disponible";
            $user = $security->getUser(); 
            $notifications = $notificationRepository->findBy(['user' => $user]);

            if ($user === null) {
                return $this->redirectToRoute('app_login');
            }
        
            // if (in_array('SF', $user->getRoles()) || in_array('ROLE_ADMIN', $user->getRoles())) {
            //     throw new \Exception('Votre rôle ne vous permet pas d\'accéder à cette ressource.');
            // }
            
            $pagination = $paginator->paginate(
                    $dossiersRepository->findDossiersByVrpId($userId),
                    $request->query->get("page",1),
            );
    
         
            return $this->render('vrp/index.html.twig', [
                'user' => $user,
                'dossiers' => $dossiers,
                'noResult' => $noResult,
                'notifications' => $notifications,
                'notificationsLength' => $notificationsLength,
                'dossiersSearch' => $dossiersSearch,
                "pagination" =>$pagination
            ]);
        }
    
    }

 
}