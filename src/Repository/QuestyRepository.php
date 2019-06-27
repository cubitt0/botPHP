<?php

namespace App\Repository;

use App\Entity\Questy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Questy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Questy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Questy[]    findAll()
 * @method Questy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Questy::class);
    }

    // /**
    //  * @return Questy[] Returns an array of Questy objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Questy
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
