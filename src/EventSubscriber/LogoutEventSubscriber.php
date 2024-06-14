<?php


namespace App\EventSubscriber;

use App\Repository\DossiersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\LogoutEvent;

class LogoutEventSubscriber implements EventSubscriberInterface
{
    private $dossiersRepository;
    private $entityManager;

    public function __construct(DossiersRepository $dossiersRepository, EntityManagerInterface $entityManager)
    {
        $this->dossiersRepository = $dossiersRepository;
        $this->entityManager = $entityManager;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            LogoutEvent::class => 'onLogout',
        ];
    }

    public function onLogout(LogoutEvent $event)
    {
        $user = $event->getToken()->getUser();
        // Vérifier si l'utilisateur est authentifié
        if ($user) {
            // Déverrouiller tous les dossiers verrouillés par cet utilisateur
            $dossiers = $this->dossiersRepository->findBy(['lockedBy' => $user]);
            foreach ($dossiers as $dossier) {
                $dossier->unlock();
                $this->entityManager->persist($dossier);
            }
            // Enregistrer les modifications
            $this->entityManager->flush();
        }
    }
}
