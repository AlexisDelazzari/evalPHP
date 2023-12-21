<?php

namespace App\Repository;

use App\Entity\Item;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Item>
 *
 * @method Item|null find($id, $lockMode = null, $lockVersion = null)
 * @method Item|null findOneBy(array $criteria, array $orderBy = null)
 * @method Item[]    findAll()
 * @method Item[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Item::class);
    }

    public function countItems(): int
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
    //count item mytique
    public function countMythicItems(): int
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->where('i.isMythic = 1')
            ->getQuery()
            ->getSingleScalarResult();
    }

    //count item legendary
    public function countLegendaryItems(): int
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->where('i.isMythic = 0')
            ->andWhere('i.isBotte = 0')
            ->getQuery()
            ->getSingleScalarResult();
    }
    //count item botte
    public function countBotteItems(): int
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->where('i.isBotte = 1')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getRandItems(): \Doctrine\Common\Collections\ArrayCollection
    {
        $bottes = $this->findBy(
            ['isBotte' => true],
        );
        $mythics = $this->findBy(
            ['isMythic' => true],
        );
        $legendaries = $this->findBy(
            ['isMythic' => false, 'isBotte' => false],
        );

        //on melange les tableaux
        shuffle($bottes);
        shuffle($mythics);
        shuffle($legendaries);

        //on prend une botte un mythic et 4 legendaries
        $items = array_merge(
            array_slice($bottes, 0, 1),
            array_slice($mythics, 0, 1),
            array_slice($legendaries, 0, 4)
        );

        return new \Doctrine\Common\Collections\ArrayCollection($items);
    }
}
