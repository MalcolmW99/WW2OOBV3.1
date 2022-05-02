<?php

namespace App\Repository;

use App\Entity\SubCampaign;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SubCampaign|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubCampaign|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubCampaign[]    findAll()
 * @method SubCampaign[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubCampaignRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubCampaign::class);
    }

    // /**
    //  * @return SubCampaign[] Returns an array of SubCampaign objects
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
    public function findOneBySomeField($value): ?SubCampaign
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
