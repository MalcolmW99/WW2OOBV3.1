<?php

namespace App\Repository;

use App\Entity\UnitStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UnitStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method UnitStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method UnitStatus[]    findAll()
 * @method UnitStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnitStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UnitStatus::class);
    }

     /**
      * @return UnitStatus[] Returns an array of UnitStatus objects
      */
 
    public function findByHigherUnit($value, $value2)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.HigherUnit = :val')
            ->andWhere(':val2 BETWEEN u.StartDate AND u.EndDate')
            ->setParameter(':val', $value)
            ->setParameter(':val2', $value2)
            ->OrderBy('u.StartDate')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByCO($value)
    {
        return $this->createQueryBuilder('us')
            ->andWhere('us.CO = :val')
            ->setParameter(':val', $value)
            ->OrderBy('us.StartDate')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByLocation($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.Location = :val')
            ->setParameter(':val', $value)
            ->OrderBy('u.StartDate')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByUnit($value, $value2)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.Unit = :val')
            ->andWhere(':val2 BETWEEN u.StartDate AND u.EndDate')
            ->setParameter(':val', $value)
            ->setParameter(':val2', $value2)
            ->OrderBy('u.StartDate')
            ->getQuery()
            ->getResult()
        ;
    }

 }
