<?php

namespace App\Repository;

use App\Entity\Sol;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sol|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sol|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sol[]    findAll()
 * @method Sol[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SolRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sol::class);
    }

    // /**
    //  * @return Sol[] Returns an array of Sol objects
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
    public function findOneBySomeField($value): ?Sol
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
