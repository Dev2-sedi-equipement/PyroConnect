<?php

namespace App\Repository;

use App\Entity\Notification;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Notification>
 *
 * @method Notification|null find($id, $lockMode = null, $lockVersion = null)
 * @method Notification|null findOneBy(array $criteria, array $orderBy = null)
 * @method Notification[]    findAll()
 * @method Notification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotificationRepository extends ServiceEntityRepository
{

    private const HOURS_BEFORE_REJECTED_REMOVAL = 6;


    public function countOldRejected(): int
        {
            return $this->getOldRejectedQueryBuilder()->select('COUNT(c.id)')->getQuery()->getSingleScalarResult();
        }

    public function deleteOldRejected(): int
        {
            return $this->getOldRejectedQueryBuilder()->delete()->getQuery()->execute();
        }
        private function getOldRejectedQueryBuilder(): QueryBuilder
        {
            $parameters = new ArrayCollection([
                'date' => new \DateTimeImmutable('-'.self::HOURS_BEFORE_REJECTED_REMOVAL.' hours'),
            ]);
        
            return $this->createQueryBuilder('c')
                ->andWhere('c.dateCreation < :date')
                ->setParameters($parameters);
        }
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Notification::class);
    }



      /**
     * Retourne les notifications d'un utilisateur donné.
     *
     * @param int $userId L'ID de l'utilisateur
     * @return Notification[] Les notifications de l'utilisateur
     */
    public function findByUserId(int $userId): array
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.user = :userId')
            ->setParameter('userId', $userId)
            ->orderBy('n.dateCreation', 'DESC')
            ->getQuery()
            ->getResult();
    }
    
    public function findNotificationsByUser(int $userId): array
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.user = :userId')
            ->setParameter('userId', $userId)
            ->getQuery()
            ->getResult();
    }

    public function findRecentNotificationsByUser(int $userId): array
    {
        $date = new \DateTime();
        $date->modify('-1 minute'); // Moins d'une minute avant la date actuelle
    
        return $this->createQueryBuilder('n')
            ->andWhere('n.user = :userId')
            ->andWhere('n.dateCreation > :date') // Condition sur la date de création
            ->setParameter('userId', $userId)
            ->setParameter('date', $date)
            ->getQuery()
            ->getResult();
    }
    public function deleteNotificationsByUser(int $userId): void
    {
        $qb = $this->createQueryBuilder('n');
        $qb
            ->delete()
            ->andWhere('n.user = :userId')
            ->setParameter('userId', $userId);

        $query = $qb->getQuery();
        $query->execute();
    }
    
    public function deleteNotificationsByUserAndNotificationID(int $userId, int $notificationId): bool
    {
        $entityManager = $this->getEntityManager();
    
        $queryBuilder = $entityManager->createQueryBuilder();
        $queryBuilder
            ->delete('App\Entity\Notification', 'n')
            ->where('n.user = :userId')
            ->andWhere('n.id = :notificationId')
            ->setParameter('userId', $userId)
            ->setParameter('notificationId', $notificationId);
    
        $query = $queryBuilder->getQuery();
        $result = $query->execute();
    
        return $result > 0; // Retourne true si au moins une ligne a été supprimée
    }
    
    

//    /**
//     * @return Notification[] Returns an array of Notification objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Notification
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
