<?php

namespace App\Repository;

use App\Entity\Champion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Champion>
 *
 * @method Champion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Champion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Champion[]    findAll()
 * @method Champion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChampionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Champion::class);
    }

    public function countChampions(): int
    {
        $queryBuilder = $this->createQueryBuilder('champion')
            ->select('COUNT(champion)')
            ->getQuery();

        return $queryBuilder->getSingleScalarResult();
    }

    public function getRandChampion(): Champion
    {
        $champions = $this->findAll();
        shuffle($champions);

        return $champions[0];
    }
}
