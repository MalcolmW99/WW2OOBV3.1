<?php

namespace App\Repository;

use App\Entity\CO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CO|null find($id, $lockMode = null, $lockVersion = null)
 * @method CO|null findOneBy(array $criteria, array $orderBy = null)
 * @method CO[]    findAll()
 * @method CO[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CORepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CO::class);
    }

    // /**
    //  * @return CO[] Returns an array of CO objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CO
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
