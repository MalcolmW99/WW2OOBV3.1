<?php

namespace App\Repository;

use App\Entity\Subcampaigns;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Subcampaigns|null find($id, $lockMode = null, $lockVersion = null)
 * @method Subcampaigns|null findOneBy(array $criteria, array $orderBy = null)
 * @method Subcampaigns[]    findAll()
 * @method Subcampaigns[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubcampaignsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Subcampaigns::class);
    }

    // /**
    //  * @return Subcampaigns[] Returns an array of Subcampaigns objects
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
    public function findOneBySomeField($value): ?Subcampaigns
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
