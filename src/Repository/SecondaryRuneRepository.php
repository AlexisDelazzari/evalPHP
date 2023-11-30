<?php

namespace App\Repository;

use App\Entity\SecondaryRune;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SecondaryRune>
 *
 * @method SecondaryRune|null find($id, $lockMode = null, $lockVersion = null)
 * @method SecondaryRune|null findOneBy(array $criteria, array $orderBy = null)
 * @method SecondaryRune[]    findAll()
 * @method SecondaryRune[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SecondaryRuneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SecondaryRune::class);
    }

//    /**
//     * @return SecondaryRune[] Returns an array of SecondaryRune objects
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

//    public function findOneBySomeField($value): ?SecondaryRune
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
