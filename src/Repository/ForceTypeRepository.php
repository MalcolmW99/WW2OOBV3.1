<?php

namespace App\Repository;

use App\Entity\ForceType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ForceType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ForceType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ForceType[]    findAll()
 * @method ForceType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ForceTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ForceType::class);
    }

    // /**
    //  * @return ForceType[] Returns an array of ForceType objects
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
    public function findOneBySomeField($value): ?ForceType
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
