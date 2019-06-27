<?php

namespace App\Repository;

use App\Entity\Expowiska;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Expowiska|null find($id, $lockMode = null, $lockVersion = null)
 * @method Expowiska|null findOneBy(array $criteria, array $orderBy = null)
 * @method Expowiska[]    findAll()
 * @method Expowiska[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpowiskaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Expowiska::class);
    }

    // /**
    //  * @return Expowiska[] Returns an array of Expowiska objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Expowiska
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
