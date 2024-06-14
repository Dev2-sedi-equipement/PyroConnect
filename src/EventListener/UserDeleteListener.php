<?php
// src/EventListener/UserDeleteListener.php

namespace App\EventListener;

use App\Entity\User;
use App\Entity\Statut;
use Doctrine\ORM\EntityManagerInterface;

class UserDeleteListener
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function prePersist(User $user): void
    {
        $entityManager = $this->entityManager;
        $entityManager->beginTransaction();
        
        try {
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
                $dossier->setLockedBy(null);

                $entityManager->persist($dossier);
            }
            
            $entityManager->flush();
            $entityManager->commit();
        } catch (\Exception $e) {
            $entityManager->rollback();
            throw $e;
        }
    }
}
