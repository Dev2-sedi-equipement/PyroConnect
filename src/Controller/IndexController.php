<?php

namespace App\Controller;

use App\Entity\Notification;
use Symfony\Component\WebLink\Link;
use App\Repository\DossiersRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\NotificationRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(Security $security,DossiersRepository $dossiersRepository,EntityManagerInterface $entityManager, Request $request, NotificationRepository $notificationRepository): Response
    { 
        // Récupérer l'utilisateur
        $user = $security->getUser();

        if ($user === null) {
            return $this->redirectToRoute('app_login');
        } else if($security->getUser()->getRoles() == ["VRP"]) {
            return $this->redirectToRoute('app_vrp');
        } else {

            $userId = $user->getId();
            $notificationRepository = $entityManager->getRepository(Notification::class);
            $notificationsLength = count($notificationRepository->findNotificationsByUser($userId));   


            $response = $this->sendEarlyHints([
                (new Link(href: 'assets/app.scss'))->withAttribute('as', 'stylesheet'),
                (new Link(href: 'assets/app.js'))->withAttribute('as', 'script'),
            ]);


     
            $notifications = $notificationRepository->findBy(['user' => $user]);
          
                    
            return $this->render('index/index.html.twig', [
                'user' => $user,
                'response' => $response,
                'notifications' => $notifications,
                'notificationsLength' => $notificationsLength,
       


            ]);
        }
    
    }
   
}