<?php

namespace App\Repository;

use App\Entity\GeneratedChampion;
use App\Enum\GeneratedChampionStatus;
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

    public function countGeneratedChampions(): int
    {
        $queryBuilder = $this->createQueryBuilder('generatedChampion')
            ->select('COUNT(generatedChampion)')
            ->getQuery();

        return $queryBuilder->getSingleScalarResult();
    }

    public function countGeneratedChampionsValided(GeneratedChampionStatus $status): int
    {
        $queryBuilder = $this->createQueryBuilder('generatedChampion')
            ->select('COUNT(generatedChampion)')
            ->where('generatedChampion.status = :status')
            ->setParameter('status', $status)
            ->getQuery();

        return $queryBuilder->getSingleScalarResult();
    }

    public function countGeneratedChampionsByChampion(int $id): int
    {
        $queryBuilder = $this->createQueryBuilder('generatedChampion')
            ->select('COUNT(generatedChampion)')
            ->where('generatedChampion.champion = :id')
            ->setParameter('id', $id)
            ->getQuery();

        return $queryBuilder->getSingleScalarResult();
    }

    public function averageChampionsGeneratedPerUser(): int
    {
        $queryBuilder = $this->createQueryBuilder('generatedChampion')
            ->select('COUNT(generatedChampion)')
            ->groupBy('generatedChampion.user')
            ->getQuery();

        $result = $queryBuilder->getResult();
        $nbUsers = count($result);
        $nbChampions = 0;
        foreach ($result as $value) {
            $nbChampions += $value['1'];
        }
        if ($nbUsers == 0) {
            return 0;
        }
        return $nbChampions / $nbUsers;
    }

    public function findGeneratedChampionWithSummoner(int $id): array
    {
        $queryBuilder = $this->createQueryBuilder('generatedChampion')
            ->select('generatedChampion')
            ->where('generatedChampion.summoner1 = :id')
            ->orWhere('generatedChampion.summoner2 = :id')
            ->setParameter('id', $id)
            ->getQuery();

        return $queryBuilder->getResult();
    }

    public function findGeneratedChampionWithSecondaryRune(int $id): array
    {
        $queryBuilder = $this->createQueryBuilder('generatedChampion')
            ->select('generatedChampion')
            ->where('generatedChampion.secondaryRune1 = :id')
            ->orWhere('generatedChampion.secondaryRune2 = :id')
            ->setParameter('id', $id)
            ->getQuery();

        return $queryBuilder->getResult();
    }

    public function findGeneratedChampionWithItem(int $id): array
    {
        $queryBuilder = $this->createQueryBuilder('generatedChampion')
            ->select('generatedChampion')
            ->where(':id MEMBER OF generatedChampion.items')
            ->setParameter('id', $id)
            ->getQuery();

        return $queryBuilder->getResult();
    }
}
