<?php

namespace App\MessageHandler;

use App\Message\NewNotificationsMessage;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\NotificationRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;


#[AsMessageHandler]
final class NewNotificationsMessageHandler
{

    public function __construct(private EntityManagerInterface $entityManager, private NotificationRepository $notificationRepository)
    {

    }

    public function __invoke(NewNotificationsMessage $message, Security $security)
    { 
        $user = $security->getUser();
        $userId = $user->getId();

        
        // Code pour récupérer les notifications depuis le repository
        $notifications = $this->notificationRepository->findNotificationsByUser($userId); // Remplacez par votre méthode de récupération de notifications
        dd($notifications);

        return $notifications;
    }
}