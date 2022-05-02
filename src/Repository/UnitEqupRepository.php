<?php

namespace App\Repository;

use App\Entity\UnitEqup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UnitEqup|null find($id, $lockMode = null, $lockVersion = null)
 * @method UnitEqup|null findOneBy(array $criteria, array $orderBy = null)
 * @method UnitEqup[]    findAll()
 * @method UnitEqup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnitEqupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UnitEqup::class);
    }

    // /**
    //  * @return UnitEqup[] Returns an array of UnitEqup objects
    //  */
    
    public function findByUnit($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.unit = :val')
            ->setParameter('val', $value)
            ->orderBy('u.StartDate', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?UnitEqup
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
