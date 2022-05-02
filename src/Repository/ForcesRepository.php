<?php

namespace App\Repository;

use App\Entity\Forces;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Forces|null find($id, $lockMode = null, $lockVersion = null)
 * @method Forces|null findOneBy(array $criteria, array $orderBy = null)
 * @method Forces[]    findAll()
 * @method Forces[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ForcesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Forces::class);
    }

    // /**
    //  * @return Forces[] Returns an array of Forces objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Forces
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
