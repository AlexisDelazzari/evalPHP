<?php

namespace App\DataFixtures;

use App\Entity\Item;
use App\Entity\RandomName;
use App\Entity\SecondaryRune;
use App\Entity\Summoner;
use App\Entity\User;
use App\Enum\GeneratedChampionStatus;
use App\Repository\ItemRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\GeneratedChampion as GeneratedChampionEntity;
use App\Entity\Champion as ChampionEntity;

class GeneratedChampionFixture extends Fixture implements DependentFixtureInterface
{
    public const GENERATED_CHAMPION_REFERENCE = 'GeneratedChampion';

    public function load(ObjectManager $manager)
    {
        $generatedChampions = [
            [
                'status' => GeneratedChampionStatus::VALIDATED
            ],
            [
                'status' => GeneratedChampionStatus::NOT_VALIDATED
            ]
        ];

        $user = $manager->getRepository(User::class)->findOneBy(['email' => 'adelazzari8@gmail.com']);
        $items = $manager->getRepository(Item::class)->getRandItems();
        $champion = $manager->getRepository(ChampionEntity::class)->findOneBy(['name' => 'Aatrox']);
        $summoners = $manager->getRepository(Summoner::class)->getRandSummoners();
        $secondaryRunes = $manager->getRepository(SecondaryRune::class)->getRandSecondaryRunes();

        $summoner1 = $summoners[0];
        $summoner2 = $summoners[1];

        $secondaryRune1 = $secondaryRunes[0];
        $secondaryRune2 = $secondaryRunes[1];


        foreach ($generatedChampions as $key => $generatedChampion) {
            $randomName = 'GeneratedChampion_' . $key;
            $randomNameEntity = new RandomName();
            $randomNameEntity->setName($randomName);
            $manager->persist($randomNameEntity);
            $manager->flush();

            $generatedChampionEntity = new GeneratedChampionEntity();
            $generatedChampionEntity->setStatus($generatedChampion['status']);
            $generatedChampionEntity->setUser($user);
            $generatedChampionEntity->setItem($items);
            $generatedChampionEntity->setChampion($champion);
            $generatedChampionEntity->setSummoner1($summoner1);
            $generatedChampionEntity->setSummoner2($summoner2);
            $generatedChampionEntity->setSecondaryRune1($secondaryRune1);
            $generatedChampionEntity->setSecondaryRune2($secondaryRune2);
            $generatedChampionEntity->setRandomName($randomNameEntity);
            $generatedChampionEntity->setCommentaires(new \Doctrine\Common\Collections\ArrayCollection([]));

            $manager->persist($generatedChampionEntity);
            $this->addReference(self::GENERATED_CHAMPION_REFERENCE . '_' . $key, $generatedChampionEntity);
        }

        $manager->flush();

    }
    public function getDependencies(): array
    {
        return [
            UserFixture::class,
            ChampionFixture::class,
            ItemFixture::class,
            SummonerFixture::class,
        ];
    }
}



