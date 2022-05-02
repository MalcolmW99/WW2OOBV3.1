<?php

namespace App\Repository;

use App\Entity\Fronts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fronts|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fronts|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fronts[]    findAll()
 * @method Fronts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FrontsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fronts::class);
    }

    // /**
    //  * @return Fronts[] Returns an array of Fronts objects
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
    public function findOneBySomeField($value): ?Fronts
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
