<?php

namespace App\Repository;

use App\Entity\SplashArt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SplashArt>
 *
 * @method SplashArt|null find($id, $lockMode = null, $lockVersion = null)
 * @method SplashArt|null findOneBy(array $criteria, array $orderBy = null)
 * @method SplashArt[]    findAll()
 * @method SplashArt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SplashArtRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SplashArt::class);
    }

//    /**
//     * @return SplashArt[] Returns an array of SplashArt objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SplashArt
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
