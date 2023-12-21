<?php

namespace App\Repository;

use App\Entity\Summoner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Summoner>
 *
 * @method Summoner|null find($id, $lockMode = null, $lockVersion = null)
 * @method Summoner|null findOneBy(array $criteria, array $orderBy = null)
 * @method Summoner[]    findAll()
 * @method Summoner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SummonerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Summoner::class);
    }

    public function countSummoners(): int
    {
        return $this->createQueryBuilder('s')
            ->select('count(s.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getRandSummoners(): array
    {
        $summoners = $this->findAll();
        shuffle($summoners);
        return array_slice($summoners, 0, 2);
    }
}
