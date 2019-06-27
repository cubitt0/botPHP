<?php

namespace App\Repository;

use App\Entity\Sklepy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Sklepy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sklepy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sklepy[]    findAll()
 * @method Sklepy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SklepyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Sklepy::class);
    }

    // /**
    //  * @return Sklepy[] Returns an array of Sklepy objects
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
    public function findOneBySomeField($value): ?Sklepy
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
