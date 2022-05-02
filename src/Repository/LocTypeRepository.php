<?php

namespace App\Repository;

use App\Entity\LocType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LocType|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocType|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocType[]    findAll()
 * @method LocType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LocType::class);
    }

    // /**
    //  * @return LocType[] Returns an array of LocType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LocType
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
