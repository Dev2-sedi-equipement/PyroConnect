<?php
// src/AppBundle/EventListener/SearchIndexerSubscriber.php
namespace App\EventSubscriber;

use App\Entity\User;
use App\Entity\Statut;
use Doctrine\ORM\Events;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
// Importez les classes nécessaires ici

class UserDeleteSubscriber implements EventSubscriberInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    

  
    public static function getSubscribedEvents(): array
    {
        return [
            Events::preRemove => [
                ['preRemove', 10],
            ]

        ];
    }


    public function preRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        if ($entity instanceof User) {
            $this->archiveUserDossiers($entity);
        }
    }

    private function archiveUserDossiers(User $user)
    {
        $entityManager = $this->entityManager;
        $entityManager->beginTransaction();

    
        // Récupérer le statut "Archivé"
        $statutArchived = $entityManager->getRepository(Statut::class)->findOneBy(['libelle' => 'Archivé']);

        if (!$statutArchived) {
            throw new \RuntimeException('Le statut "Archivé" n\'existe pas.');
        }

        // Récupérer les dossiers de l'utilisateur
        $dossiers = $user->getDossiers();

        foreach ($dossiers as $dossier) {
            // Définir le statut du dossier sur "Archivé"
            $dossier->setStatutId($statutArchived);
            $entityManager->persist($dossier);
        }
        

        $entityManager->flush();
        $entityManager->commit();

       
    }
}
