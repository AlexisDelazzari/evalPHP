<?php

namespace App\Repository;

use App\Entity\RandomName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RandomName>
 *
 * @method RandomName|null find($id, $lockMode = null, $lockVersion = null)
 * @method RandomName|null findOneBy(array $criteria, array $orderBy = null)
 * @method RandomName[]    findAll()
 * @method RandomName[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RandomNameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RandomName::class);
    }

//    /**
//     * @return RandomName[] Returns an array of RandomName objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RandomName
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
