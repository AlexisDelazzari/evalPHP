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

    public function findAllWithPrimaryRune(): array
    {
        $queryBuilder = $this->createQueryBuilder('secondaryRune')
            ->select('secondaryRune', 'primaryRune')
            ->join('secondaryRune.primaryRune', 'primaryRune')
            ->orderBy('primaryRune.name', 'ASC')
            ->getQuery();

        return $queryBuilder->getResult();
    }

    public function countSecondaryRunes(): int
    {
        $queryBuilder = $this->createQueryBuilder('secondaryRune')
            ->select('COUNT(secondaryRune)')
            ->getQuery();

        return $queryBuilder->getSingleScalarResult();
    }

    public function getRandSecondaryRunes(): array
    {
        $secondaryRunes = $this->findAll();
        shuffle($secondaryRunes);
        return array_slice($secondaryRunes, 0, 2);
    }
}
