<?php

namespace App\EventSubscriber;

use App\Entity\Dossiers;
use App\Entity\Notification;
use App\Repository\DossiersRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Event\FireWorksNotificationEvent;
use Symfony\Component\Security\Http\Event\LogoutEvent;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class FireWorksNotificationSubscriber implements EventSubscriberInterface
{
    private $dossiersRepository;
    private $entityManager;
    private $tokenStorage;

    public function __construct(DossiersRepository $dossiersRepository, EntityManagerInterface $entityManager, TokenStorageInterface $tokenStorage)
    {
        $this->dossiersRepository = $dossiersRepository;
        $this->entityManager = $entityManager;
        $this->tokenStorage = $tokenStorage;
    }



    public static function getSubscribedEvents()
    {
        // Déclarez l'événement que vous souhaitez écouter et la méthode à appeler lorsque cet événement se produit
        return [
            FireWorksNotificationEvent::class => 'onFireWorksNotification',
        ];
    }

    public function notifyOneDayBeforeFireWorks(): void
    {
        $user = $this->getUserFromTokenStorage();
        if ($user && in_array('SF', $user->getRoles())) {
            $dossiers = $this->dossiersRepository->findDossiersWithFireWorksOneDayBefore();
            foreach ($dossiers as $dossier) {
                // Vérifiez si le champ personnel de tir est vide et que le nombre de personnel de tir est rempli
                if (empty($dossier->getNomPersonnel()) && !empty($dossier->getNbPersonnel())) {
                    $this->createNotification($user, $dossier);
                }
            }
        }
    }

    private function getUserFromTokenStorage(): ?UserInterface
    {
        $token = $this->tokenStorage->getToken();
        if ($token && $token->getUser() instanceof UserInterface) {
            return $token->getUser();
        }
        return null;
    }

    private function createNotification(UserInterface $user, Dossiers $dossier): void
    {
        $notification = new Notification();
        $notification->setTitre('Tir de feu dans un jour');
        $notification->setUser($user->getId());
        $notification->setDateCreation(new \DateTimeImmutable());
        $notification->setIdDossier($dossier->getId());
        $notification->setType('tir_feu_un_jour_avant');
        $this->entityManager->persist($notification);
        $this->entityManager->flush();
    }
}
