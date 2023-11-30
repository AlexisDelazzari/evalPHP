<?php

namespace App\Repository;

use App\Entity\PrimaryRune;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PrimaryRune>
 *
 * @method PrimaryRune|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrimaryRune|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrimaryRune[]    findAll()
 * @method PrimaryRune[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrimaryRuneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrimaryRune::class);
    }

//    /**
//     * @return PrimaryRune[] Returns an array of PrimaryRune objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PrimaryRune
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
