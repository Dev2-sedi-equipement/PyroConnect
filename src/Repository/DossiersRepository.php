<?php

namespace App\Repository;

use App\Entity\Dossiers;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Dossiers>
 *
 * @method Dossiers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dossiers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dossiers[]    findAll()
 * @method Dossiers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DossiersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dossiers::class);
    }

    public function findAllDossiers(): array
    {
        return $this->createQueryBuilder('d')
            ->select('d')
            // ->orderBy('d.dateCreation', $sortOrder) 
            ->getQuery()
            ->getResult();
    }
    public function findAllTraite(): array
    {
        return $this->createQueryBuilder('d')
            ->select('d')
            ->where('d.statut = :statut')
            ->setParameter('statut', 2) // 2 correspond au statut que vous souhaitez filtrer
            ->getQuery()
            ->getResult();
    }

    public function findAllEnCours(): array
    {
        return $this->createQueryBuilder('d')
            ->select('d')
            ->where('d.statut = :statut')
            ->setParameter('statut', 3) // 2 correspond au statut que vous souhaitez filtrer
            ->getQuery()
            ->getResult();
    }
    public function findAllNonTraite(): array
    {
        return $this->createQueryBuilder('d')
            ->select('d')
            ->where('d.statut = :statut')
            ->setParameter('statut', 4) // 2 correspond au statut que vous souhaitez filtrer
            ->getQuery()
            ->getResult();
    }

    public function findAllArchive(): array
    {
        return $this->createQueryBuilder('d')
            ->select('d')
            ->where('d.statut = :statut')
            ->setParameter('statut', 1) // 2 correspond au statut que vous souhaitez filtrer
            ->getQuery()
            ->getResult();
    }
    
    
    // public function findDossiersByAssignVrpId(int $userId): array
    // {
    //     return $this->createQueryBuilder('d')
    //         ->andWhere('d.assignVrp = :userId') 
    //         ->setParameter('userId', $userId)
    //         ->orderBy('d.dateCreation', 'DESC') 
    //         ->getQuery()
    //         ->getResult();
    // }


    public function findByQuery(string $query): array
    {
        if (empty($query)) {
            return [];
        }
    
        $queryBuilder = $this->createQueryBuilder('d')
            ->andWhere('d.nom LIKE :query OR d.nomVrp LIKE :query OR d.typeFeu LIKE :query OR d.dateTir LIKE :query') // Recherche pas nom de dossier ou nom Vrp ou type feux
        ->setParameter('query', '%' . strtolower($query) . '%');    
        return $queryBuilder
            ->getQuery()
            ->getResult();
    }

    public function findByQueryAndUserId(string $query, int $userId, string $sortOrder): array
    {
        if (empty($query)) {
            return [];
        }
    
        $queryBuilder = $this->createQueryBuilder('d')
            ->where('d.assignVrp = :userId')
            ->andWhere('d.nom LIKE :query OR d.typeFeu LIKE :query OR d.dateTir LIKE :query') // Recherche pas nom de dossier ou nom Vrp ou type feux
            ->andWhere('d.statut != :statut')
            ->setParameter('userId', $userId)
            ->setParameter('query', '%' . $query . '%')
            ->setParameter('statut', '1');
    
        // Vérifier le paramètre de tri
        if ($sortOrder === 'desc') {
            $queryBuilder->orderBy('d.dateCreation', 'DESC');
        } elseif ($sortOrder === 'asc') {
            $queryBuilder->orderBy('d.dateCreation', 'ASC');
        }
    
        return $queryBuilder
            ->getQuery()
            ->getResult();
    }
    
    

    // Method to find dossiers by status
    public function findByStatus(?int $statut): void
    {
        $queryBuilder = $this->createQueryBuilder('d');

        if ($statut !== null) {
            $queryBuilder->andWhere('d.statut = :statut')
                ->setParameter('statut', $statut);
        }

        $queryBuilder
        ->getQuery()
        ->getResult();
    } 
    
    public function findAllEnCoursTraitementDossiers(string $sortOrder,int $statut): array
    {
        return $this->createQueryBuilder('d')
        ->select('d')
        ->where('d.statut = :statutEnCours')
        ->setParameter('statutEnCours',$statut) 
        ->orderBy('d.dateCreation', $sortOrder) 
        ->getQuery()
        ->getResult();
    }

    public function findAllNonTraiteDossiers(string $sortOrder,int $statut): array
    {
        return $this->createQueryBuilder('d')
        ->select('d')
        ->where('d.statut = :statutNonTraite')
        ->setParameter('statutNonTraite', $statut) 
        ->orderBy('d.dateCreation', $sortOrder) 
        ->getQuery()
        ->getResult();
    }

    public function findAllTraiteDossiers(string $sortOrder, int $statut): array
    {
        return $this->createQueryBuilder('d')
        ->select('d')
        ->where('d.statut = :statutTraite')
        ->setParameter('statutTraite', $statut) 
        ->orderBy('d.dateCreation', $sortOrder) 
        ->getQuery()
        ->getResult();
    }

    public function findDossiersByVrpId(int $vrpId): array
    {
        $statutArchiveId = 1; // Remplacez par l'ID du statut "archive"
        
        $queryBuilder = $this->createQueryBuilder('d')
            ->andWhere('d.assignVrp = :vrpId')
            ->setParameter('vrpId', $vrpId)
            ->andWhere('d.statut != :statutArchive') // Exclut les dossiers avec le statut "archive"
            ->setParameter('statutArchive', $statutArchiveId) // Remplacez $statutArchiveId par l'ID du statut "archive"
            ->orderBy('d.dateTir', 'DESC'); // Trie les résultats par date de tir dans l'ordre croissant
        
        return $queryBuilder
            ->getQuery()
            ->getResult();
    }
    public function findDossiersByCreatorId(int $createurDossier): array
    {
        $statutArchiveId = 1; // Remplacez par l'ID du statut "archive"
        
        $queryBuilder = $this->createQueryBuilder('d')
            ->andWhere('d.createurDossier = :createurDossier')
            ->setParameter('createurDossier', $createurDossier)
            ->andWhere('d.statut != :statutArchive') // Exclut les dossiers avec le statut "archive"
            ->setParameter('statutArchive', $statutArchiveId) ;// Remplacez $statutArchiveId par l'ID du statut "archive"

        return $queryBuilder
            ->getQuery()
            ->getResult();
    }
    
    
        
    /**
     * @param int $userId L'ID de l'utilisateur
     * @return array Les identifiants des utilisateurs associés à chaque dossier de l'utilisateur spécifié
     */
    public function findDossiersByUserId(int $userId): array
    {
        return $this->createQueryBuilder('d')
        ->where('d.id = :userId')
        ->setParameter('userId', $userId)
        ->getQuery()
        ->getResult();
    }
    public function findTraiteDossiersByAssignVrpId(int $userId, string $sortOrder): array
    {
        return $this->createQueryBuilder('d')
        ->andWhere('d.assignVrp = :userId') 
        ->andWhere('d.statut = :statutTraite')
        ->setParameter('userId', $userId)
        ->setParameter('statutTraite', 2) 
        ->orderBy('d.dateCreation', $sortOrder) 
        ->getQuery()
        ->getResult();
    }

    public function findAllTraiteDossiersByAssignVrpId(int $userId, string $sortOrder, int $statut): array
    {
        return $this->createQueryBuilder('d')
        ->andWhere('d.statut = :statutTraite')
        ->andWhere('d.assignVrp = :userId') 
        ->andWhere('d.statut = :statutTraite')
        ->setParameter('userId', $userId)
        ->setParameter('statutTraite', $statut) 
        ->orderBy('d.dateCreation', $sortOrder) 
        ->getQuery()
        ->getResult();
    }
    
    
    public function findAllEnCoursTraitementDossiersByAssignVrpId(int $userId, string $sortOrder, int $statut): array
    {
        return $this->createQueryBuilder('d')
        ->andWhere('d.assignVrp = :userId') 
        ->andWhere('d.statut = :statutEnCoursTraitement')
        ->setParameter('userId', $userId)
        ->setParameter('statutEnCoursTraitement', $statut) 
        ->orderBy('d.dateCreation', $sortOrder) 
        
        ->getQuery()
        ->getResult();
    }
    


    public function findEnCoursTraitementDossiersByAssignVrpId(int $userId, string $sortOrder): array
    {
        return $this->createQueryBuilder('d')
        ->andWhere('d.assignVrp = :userId') 
        ->andWhere('d.statut = :statutEnCoursTraitement')
        ->setParameter('userId', $userId)
        ->setParameter('statutEnCoursTraitement', 3) 
        ->orderBy('d.dateCreation', $sortOrder) 
        
        ->getQuery()
        ->getResult();
    }
    
    
    /**
     * @param int $assignVrpId L'ID de l'utilisateur
     * @return Dossiers[] Les dossiers associés à l'utilisateur spécifié avec le statut 4 (Non traité)
     */
    public function findAllArchiveDossiers(string $sortOrder,int $statut): array
    {
        return $this->createQueryBuilder('d')

            ->andWhere('d.statut = :statut')
            ->setParameter('statut', $statut) // 4 correspond au statut "Non traité"
            ->orderBy('d.dateCreation', $sortOrder)             
            ->getQuery()
            ->getResult();
        }
        
        
        /**
         * @param int $assignVrpId L'ID de l'utilisateur
         * @return Dossiers[] Les dossiers associés à l'utilisateur spécifié avec le statut 4 (Non traité)
         */
        public function findNonTraiteDossiersByAssignVrpId(int $userId, string $sortOrder): array
        {
            return $this->createQueryBuilder('d')
            ->andWhere('d.assignVrp = :assignVrpId')
            ->andWhere('d.statut = :statut')
            ->setParameter('assignVrpId', $userId)
            ->setParameter('statut', 4) // 4 correspond au statut "Non traité"
            ->orderBy('d.dateCreation', $sortOrder) 
            
            ->getQuery()
            ->getResult();
        }
        
        
           /**
         * @param int $assignVrpId L'ID de l'utilisateur
         * @return Dossiers[] Les dossiers associés à l'utilisateur spécifié avec le statut 4 (Non traité)
         */
        public function findAllNonTraiteDossiersByAssignVrpId(int $userId,int $statut, string $sortOrder): array
        {
            return $this->createQueryBuilder('d')
            ->andWhere('d.assignVrp = :assignVrpId')
            ->andWhere('d.statut = :statut')
            ->setParameter('assignVrpId', $userId)
            ->setParameter('statut', $statut)
            ->orderBy('d.dateCreation', $sortOrder) 

            ->getQuery()
            ->getResult();
        }
        /**
         * Find dossiers with fire works in one month
         *
         * @return Dossiers[] Returns an array of Dossiers objects
         */
        public function findDossiersWithFireWorksInOneMonth(): array
        {
            // Date actuelle
            $currentDate = new \DateTimeImmutable();

            // Date dans un mois
            $oneMonthLater = $currentDate->modify('+1 month');

            // Créer une requête pour trouver les dossiers avec les feux d'artifice dans un mois
            return $this->createQueryBuilder('d')
                ->andWhere('d.dateTir >= :currentDate')
                ->andWhere('d.dateTir < :oneMonthLater')
                ->setParameter('currentDate', $currentDate)
                ->setParameter('oneMonthLater', $oneMonthLater)
                ->getQuery()
                ->getResult();
        }


        public function findDossiersWithFireWorksRecents(): array
        {
            // Créer une requête pour trouver tous les dossiers avec les feux d'artifice
            return $this->createQueryBuilder('d')
                ->orderBy('d.dateTir', 'ASC') // Trie les résultats par date de tir les plus proche
                ->getQuery()
                ->getResult();
        }
        
         /**
     * Find dossiers with fire works one day before
     *
     * @return Dossiers[] Returns an array of Dossiers objects
     */
        public function findDossiersWithFireWorksOneDayBefore(): array
        {
            // Date actuelle
            $currentDate = new \DateTimeImmutable();

            // Date dans un jour
            $oneDayBefore = $currentDate->modify('-1 day');

            // Créer une requête pour trouver les dossiers avec les feux d'artifice prévus à un jour avant
            return $this->createQueryBuilder('d')
                ->andWhere('d.dateTir = :oneDayBefore')
                ->setParameter('oneDayBefore', $oneDayBefore)
                ->getQuery()
                ->getResult();
        }

           /**
     * Trouver tous les dossiers verrouillés.
     *
     * @return Dossier[] Un tableau contenant tous les dossiers verrouillés.
     */
    public function findLockedDossiers(): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.lockedBy IS NOT NULL') // Vérifier que le dossier est verrouillé
            ->getQuery()
            ->getResult();
    }
    }
        
        //    /**
        //     * @return Dossiers[] Returns an array of Dossiers objects
        //     */
        //    public function findByExampleField($value): array
        //    {
            //        return $this->createQueryBuilder('d')
            //            ->andWhere('d.exampleField = :val')
            //            ->setParameter('val', $value)
            //            ->orderBy('d.id', 'ASC')
            //            ->setMaxResults(10)
            //            ->getQuery()
            //            ->getResult()
            //        ;
            //    }
            
            
            //    public function findOneBySomeField($value): ?Dossiers
            //    {
                //        return $this->createQueryBuilder('d')
                //            ->andWhere('d.exampleField = :val')
                //            ->setParameter('val', $value)
                //            ->getQuery()
                //            ->getOneOrNullResult()
                //        ;
                //    }
                // DossiersRepository.php
                
                    // Méthode de recherche par mots-clés et ID utilisateur
                    // public function findByKeywordAndUserId(?string $keyword, ?string $typeFeu, int $userId): array
                    // {
                    //     // Initialiser le query builder
                    //     $queryBuilder = $this->createQueryBuilder('d')
                    //         ->leftJoin('d.statut', 's') // Joindre avec l'entité statut
                    //         ->where('d.assignVrp = :userId')
                    //         ->setParameter('userId', $userId);
                    
                    //     // Ajouter les conditions pour les critères de recherche
                    //     if (!empty($keyword)) {
                    //         $queryBuilder->andWhere('d.nom LIKE :keyword OR d.ville LIKE :keyword OR d.typeFeu LIKE :keyword')
                    //             ->setParameter('keyword', '%' . $keyword . '%');
                    //     }
                    
                    
                    
                    //     if (!empty($typeFeu)) {
                    //         $queryBuilder->andWhere('d.typeFeu = :typeFeu')
                    //             ->setParameter('typeFeu', $typeFeu);
                    //     }
                    
                    //     // Exécuter la requête et récupérer les résultats
                    //     return $queryBuilder->orderBy('d.nom', 'ASC')
                    //         ->getQuery()
                    //         ->getResult();
                    // }
                    
                    
                    // public function findByKeyword(?string $keyword, ?string $typeFeu): array
                    // {
                    //     // Initialiser le query builder
                    //     $queryBuilder = $this->createQueryBuilder('d')
                    //         ->leftJoin('d.statut', 's'); // Joindre avec l'entité statut
                
                    
                    //     // Ajouter les conditions pour les critères de recherche
                    //     if (!empty($keyword)) {
                    //         $queryBuilder->andWhere('d.nom LIKE :keyword OR d.ville LIKE :keyword OR d.typeFeu LIKE :keyword')
                    //             ->setParameter('keyword', '%' . $keyword . '%');
                    //     }
                    
                   
                    
                    //     if (!empty($typeFeu)) {
                    //         $queryBuilder->andWhere('d.typeFeu = :typeFeu')
                    //             ->setParameter('typeFeu', $typeFeu);
                    //     }
                    
                    //     // Exécuter la requête et récupérer les résultats
                    //     return $queryBuilder->orderBy('d.nom', 'ASC')
                    //         ->getQuery()
                    //         ->getResult();
                    // }