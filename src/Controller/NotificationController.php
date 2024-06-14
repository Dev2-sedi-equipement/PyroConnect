<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Notification;
use App\Form\NotificationType;
use Symfony\UX\Turbo\TurboBundle;
use App\Service\PreviousPageService;
use Symfony\Component\Mercure\Update;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\NotificationRepository;
use Symfony\Component\Mercure\HubInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/notification')]
class NotificationController extends AbstractController
{
    #[Route('/', name: 'app_notification_index', methods: ['GET'])]
    public function index(NotificationRepository $notificationRepository): Response
    {
        return $this->render('notification/index.html.twig', [
            'notification' => $notificationRepository->findAll(),
        ]);
    }
    

    #[Route('/new', name: 'app_notification_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $notification = new Notification();
        $form = $this->createForm(NotificationType::class, $notification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($notification);
            $entityManager->flush();

            return $this->redirectToRoute('app_notification_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('notification/new.html.twig', [
            'notification' => $notification,
            'form' => $form,
        ]);
    }



    #[Route('/{id}/edit', name: 'app_notification_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Notification $notification, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NotificationType::class, $notification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_notification_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('notification/edit.html.twig', [
            'notification' => $notification,
            'form' => $form,
        ]);
    }


    #[Route('/{id}', name: 'app_notification_delete', methods: ['POST'])]
    public function delete(NotificationRepository $notificationRepository, int $id, EntityManagerInterface $entityManager): Response
    {   
        // Récupérer la notification par son ID
        $notification = $notificationRepository->find($id);
    
        // Vérifier si la notification existe
    if (!$notification) {
        // Si la notification n'existe pas, renvoyer une réponse 404 avec l'ID de la notification et l'URL de la requête
        $message = sprintf('Notification with ID %d not found for request %s', $id, $_SERVER['REQUEST_URI']);
        return new Response($message, Response::HTTP_NOT_FOUND);
    }

        
    
        // Supprimer la notification et enregistrer les changements
        $entityManager->remove($notification);
        $entityManager->flush();
    
        // Répondre avec succès
        return new Response('Notification deleted', Response::HTTP_OK);
    }
    
    


    #[Route('/deleteByUser', name: 'app_notification_delete_by_user')]
    public function deleteNotificationsByUser(Request $request, NotificationRepository $notificationRepository): Response
    {
        // Récupérer l'ID de l'utilisateur depuis la requête POST
        $userId = $this->getUser()->getId();
        
        // Vérifier si l'ID de l'utilisateur est valide
        if ($userId !== null) {
            // Supprimer toutes les notifications de l'utilisateur
            $notificationRepository->deleteNotificationsByUser($userId);
            // Retourner une réponse JSON indiquant le succès
            return new JsonResponse(['success' => true]);

      
        } else {
            // Retourner une réponse JSON indiquant l'échec
            return new JsonResponse(['success' => false, 'error' => 'Impossible de supprimer les notifications de l\'utilisateur'], Response::HTTP_BAD_REQUEST);
        }
    }

   
      
    // #[Route('/fetchNotifications', name: 'fetch_notifications')]
    // public function fetchNotifications(NotificationRepository $notificationRepository): JsonResponse
    // {
    //     $user = $this->getUser();
    //     $userId = $user->getId();
    //     // Récupérer les notifications depuis la base de données
    //     $notifications = $notificationRepository->findNotificationsByUser($userId);
        
    //     // Convertir les notifications en tableau associatif
    //     $notificationArray = [];
    //     foreach ($notifications as $notification) {
    //         $notificationArray[] = [
    //             'id' => $notification->getId(),
    //             'type' => $notification->getType(),
    //             'dateCreation' => $notification->getDateCreation()->format('d-m-Y H:i:s'),
    //             'titre' => $notification->getTitre(),
    //             'iddossier' => $notification->getIdDossier(),
    //         ];
    //     }
    
    //     // Retourner directement les données sans encapsulation JSON
    //     return new JsonResponse($notificationArray);
    // }
    
    
    

}
