<?php

namespace App\Repository;

use App\Entity\Moby;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Moby|null find($id, $lockMode = null, $lockVersion = null)
 * @method Moby|null findOneBy(array $criteria, array $orderBy = null)
 * @method Moby[]    findAll()
 * @method Moby[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MobyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Moby::class);
    }

    // /**
    //  * @return Moby[] Returns an array of Moby objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Moby
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
