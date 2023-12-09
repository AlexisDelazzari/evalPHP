<?php

namespace App\DataFixtures;

use App\Enum\GeneratedChampionStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\GeneratedChampion as GeneratedChampionEntity;

class GeneratedChampionFixture extends Fixture
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

        foreach ($generatedChampions as $key => $generatedChampion) {
            $generatedChampionEntity = new GeneratedChampionEntity();
            $generatedChampionEntity->setStatus($generatedChampion['status']);
            $manager->persist($generatedChampionEntity);
            $this->addReference(self::GENERATED_CHAMPION_REFERENCE . '_' . $key, $generatedChampionEntity);
        }

        $manager->flush();

    }
}



