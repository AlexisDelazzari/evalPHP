<?php

namespace App\Repository;

use App\Entity\GeneratedChampion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GeneratedChampion>
 *
 * @method GeneratedChampion|null find($id, $lockMode = null, $lockVersion = null)
 * @method GeneratedChampion|null findOneBy(array $criteria, array $orderBy = null)
 * @method GeneratedChampion[]    findAll()
 * @method GeneratedChampion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeneratedChampionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GeneratedChampion::class);
    }

//    /**
//     * @return GeneratedChampion[] Returns an array of GeneratedChampion objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GeneratedChampion
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
