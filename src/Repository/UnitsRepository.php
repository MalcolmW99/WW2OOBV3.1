<?php

namespace App\Repository;

use App\Entity\Units;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Units|null find($id, $lockMode = null, $lockVersion = null)
 * @method Units|null findOneBy(array $criteria, array $orderBy = null)
 * @method Units[]    findAll()
 * @method Units[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnitsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Units::class);
    }

    // /**
    //  * @return Units[] Returns an array of Units objects
    //  */


    public function findByForceField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.Forces = :val')
            ->setParameter('val', $value)
            ->orderBy('u.UnitNo', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    
    /*
    public function findOneBySomeField($value): ?Units
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
