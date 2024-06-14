<?php
// src/Service/DossiersSearchService.php

namespace App\Service;

use App\Entity\Dossiers;
use App\Repository\DossiersRepository;
use Symfony\Component\Security\Core\Security;

class DossiersSearchService
{
    private DossiersRepository $dossiersRepository;
    private Security $security;

    public function __construct(DossiersRepository $dossiersRepository, Security $security)
    {
        $this->dossiersRepository = $dossiersRepository;
        $this->security = $security;
    }

    /**
     * Recherche les dossiers en fonction de critères spécifiques.
     *
     * @param array $criteria Critères de recherche (ex: ['nom' => 'ABC', 'ville' => 'Paris'])
     * @return array Liste des dossiers correspondants aux critères
     */
    public function searchDossiers(array $criteria): array
    {
        // Récupérer l'utilisateur actuellement authentifié
        $user = $this->security->getUser();

        // Ajouter l'ID du VRP aux critères de recherche
        $criteria['vrpId'] = $user->getId();

        // Effectuer la recherche des dossiers en utilisant le repository
        return $this->dossiersRepository->findByCriteria($criteria);
    }
}
