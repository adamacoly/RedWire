<?php

namespace App\Repository;

use App\Entity\UserSys;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UserSys|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserSys|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserSys[]    findAll()
 * @method UserSys[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserSysRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserSys::class);
    }

    // /**
    //  * @return UserSys[] Returns an array of UserSys objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserSys
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
