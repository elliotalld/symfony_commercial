<?php

namespace App\Repository;

use App\Entity\Livraision;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Livraision|null find($id, $lockMode = null, $lockVersion = null)
 * @method Livraision|null findOneBy(array $criteria, array $orderBy = null)
 * @method Livraision[]    findAll()
 * @method Livraision[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivraisionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livraision::class);
    }

    // /**
    //  * @return Livraision[] Returns an array of Livraision objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Livraision
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
