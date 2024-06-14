<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
* @implements PasswordUpgraderInterface<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }
    
    /**
     * Finds users with the 'VRP' role.
     *
     * @return User[] Returns an array of User objects
     */
    public function findVrpUsers(): array
    {
        $allUsers = $this->findAll();
        $vrpUsers = [];

        foreach ($allUsers as $user) {
            if (in_array('VRP', $user->getRoles())) {
                $vrpUsers[] = $user;
            }
        }

        return $vrpUsers;
    }

        
    /**
 * Finds IDs of users with the 'VRP' role.
 *
 * @return int[] Returns an array of user IDs
 */
public function findVrpUserIds(): array
{
    $allUsers = $this->findAll();
    $vrpUserIds = [];

    // Suppose $allUsers contient tous les utilisateurs de votre système
    foreach ($allUsers as $user) {
        if (in_array('VRP', $user->getRoles(), true)) {
            $vrpUserIds[] = $user->getId();
        }
    }

    return $vrpUserIds;
}

    /**
     * Finds users with the 'VRP' role.
     *
     * @return User[] Returns an array of User objects
     */
    public function findSFUsers(): array
    {
        $allUsers = $this->findAll();
        $sfUSers = [];

        foreach ($allUsers as $user) {
            if (in_array('SF', $user->getRoles())) {
                $sfUSers[] = $user->getId();
            }
        }

        return $sfUSers;
    }


    public function findOneByEmail($email): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.email = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function userExists($userId): bool
    {
        return $this->entityManager
            ->getRepository(User::class)
            ->createQueryBuilder('u')
            ->select('COUNT(u.id)')
            ->andWhere('u.id = :userId')
            ->setParameter('userId', $userId)
            ->getQuery()
            ->getSingleScalarResult() > 0;
    }
    
//    /**
//     * @return User[] Returns an array of User objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?User
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
