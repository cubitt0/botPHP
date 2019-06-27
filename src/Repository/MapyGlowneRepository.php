<?php

namespace App\Repository;

use App\Entity\MapyGlowne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MapyGlowne|null find($id, $lockMode = null, $lockVersion = null)
 * @method MapyGlowne|null findOneBy(array $criteria, array $orderBy = null)
 * @method MapyGlowne[]    findAll()
 * @method MapyGlowne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MapyGlowneRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MapyGlowne::class);
    }

    // /**
    //  * @return MapyGlowne[] Returns an array of MapyGlowne objects
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
    public function findOneBySomeField($value): ?MapyGlowne
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
