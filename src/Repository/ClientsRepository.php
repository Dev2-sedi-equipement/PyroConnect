<?php

namespace App\Repository;

use App\Entity\Clients;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Clients>
 */
class ClientsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Clients::class);
    }


    public function maxResult($codeVrp): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('TRIM(c.codeVrp) = :codeVrp')
            ->setParameter('codeVrp', trim($codeVrp)) // Assurez-vous aussi de supprimer les espaces dans le paramètre
            ->setMaxResults(100)
            ->getQuery()
            ->getResult();
    }
    
    
    public function maxResultSf( ): array
    {
        
        return $this->createQueryBuilder('c')
            ->setMaxResults(100)
            ->getQuery()
            ->getResult();
    }
    
       public function searchClients(string $searchTerm,string $codeVrp): array
       {
           return $this->createQueryBuilder('c')
               ->andWhere('c.nom LIKE :searchTerm')
               ->setParameter('searchTerm', '%' . $searchTerm . '%')
               ->andWhere('c.codeVrp = :codeVrp')
               ->setParameter('codeVrp', $codeVrp)
               ->setMaxResults(100)
               ->getQuery()
               ->getResult()
           ;
       }


       public function searchVille(string $searchTerm,int $codeVrp): array
       {
           return $this->createQueryBuilder('c')
               ->andWhere('c.ville LIKE :searchTerm')
               ->setParameter('searchTerm', '%' . $searchTerm . '%')
               ->andWhere('c.codeVrp = :codeVrp')
               ->setParameter('codeVrp', $codeVrp)
               ->setMaxResults(100)
               ->getQuery()
               ->getResult()
           ;
       }
       public function searchC0(string $searchTerm,int $codeVrp): array
       {
           return $this->createQueryBuilder('c')
               ->andWhere('c.codeClient LIKE :searchTerm')
               ->setParameter('searchTerm', '%' . $searchTerm . '%')
               ->andWhere('c.codeVrp = :codeVrp')
               ->setParameter('codeVrp', $codeVrp)
               ->setMaxResults(100)
               ->getQuery()
               ->getResult()
           ;
       }

       public function searchClientsSf(string $searchTerm): array
       {
           return $this->createQueryBuilder('c')
               ->andWhere('c.nom LIKE :searchTerm')
               ->setParameter('searchTerm', '%' . $searchTerm . '%')
               ->setMaxResults(100)
               ->getQuery()
               ->getResult()
           ;
       }


       public function searchVilleSf(string $searchTerm): array
       {
           return $this->createQueryBuilder('c')
               ->andWhere('c.ville LIKE :searchTerm')
               ->setParameter('searchTerm', '%' . $searchTerm . '%')
                ->setMaxResults(100)

               ->getQuery()
               ->getResult()
           ;
       }
       public function searchC0Sf(string $searchTerm): array
       {
           return $this->createQueryBuilder('c')
               ->andWhere('c.codeClient LIKE :searchTerm')
               ->setParameter('searchTerm', '%' . $searchTerm . '%')
               ->setMaxResults(100)
               ->getQuery()
               ->getResult()
           ;
       }


       public function searchDpt(string $searchTerm): array
       {
           return $this->createQueryBuilder('c')
               ->andWhere('c.codeDpt LIKE :searchTerm')
               ->setParameter('searchTerm', '%' . $searchTerm . '%')
               ->getQuery()
               ->getResult()
           ;
       }

    //    public function findOneBySomeField($value): ?Clients
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
