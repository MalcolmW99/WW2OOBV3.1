<?php

namespace App\Repository;

use App\Entity\Headline;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Headline|null find($id, $lockMode = null, $lockVersion = null)
 * @method Headline|null findOneBy(array $criteria, array $orderBy = null)
 * @method Headline[]    findAll()
 * @method Headline[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeadlineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Headline::class);
    }

    // /**
    //  * @return Headline[] Returns an array of Headline objects
    //  */
    
    public function findByID($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.id >= :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult()
        ;
    }

    
    public function findOnThisDay($today)
    {
        
        return $this->createQueryBuilder('h')
            ->setParameter('val', $today)    
            ->where("month(h.date) = month(:val)")
            ->andWhere("day(h.date) = day(:val)")
            ->orderBy('h.date', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

}
