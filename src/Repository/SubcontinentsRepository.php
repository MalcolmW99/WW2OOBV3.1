<?php

namespace App\Repository;

use App\Entity\Subcontinents;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Subcontinents|null find($id, $lockMode = null, $lockVersion = null)
 * @method Subcontinents|null findOneBy(array $criteria, array $orderBy = null)
 * @method Subcontinents[]    findAll()
 * @method Subcontinents[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubcontinentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Subcontinents::class);
    }

    // /**
    //  * @return Subcontinents[] Returns an array of Subcontinents objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Subcontinents
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
