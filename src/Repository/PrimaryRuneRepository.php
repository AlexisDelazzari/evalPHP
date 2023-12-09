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

    public function countPrimaryRunes(): int
    {
        $queryBuilder = $this->createQueryBuilder('primaryRune')
            ->select('COUNT(primaryRune)')
            ->getQuery();

        return $queryBuilder->getSingleScalarResult();
    }
}
