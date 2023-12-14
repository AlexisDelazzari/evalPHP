<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Summoner as SummonerEntity;

class SummonerFixture extends Fixture
{
    public const SUMMONER_REFERENCE = 'Summoner';

    public function load(ObjectManager $manager): void
    {
        $summoners = [
            [
                'name' => 'summoner.flash',
                'image' => 'fixturePicture/Summoners/Flash.webp',
                'description' => 'summoner.description.flash'
            ],
            [
                'name' => 'summoner.teleport',
                'image' => 'fixturePicture/Summoners/Teleport.webp',
                'description' => 'summoner.description.teleport'
            ],
            [
                'name' => 'summoner.ignite',
                'image' => 'fixturePicture/Summoners/Ignite.webp',
                'description' => 'summoner.description.ignite'
            ],
            [
                'name' => 'summoner.heal',
                'image' => 'fixturePicture/Summoners/Heal.webp',
                'description' => 'summoner.description.heal'
            ],
            [
                'name' => 'summoner.barrier',
                'image' => 'fixturePicture/Summoners/Barrier.webp',
                'description' => 'summoner.description.barrier'
            ],
            [
                'name' => 'summoner.cleanse',
                'image' => 'fixturePicture/Summoners/Cleanse.webp',
                'description' => 'summoner.description.cleanse'
            ],
            [
                'name' => 'summoner.exhaust',
                'image' => 'fixturePicture/Summoners/Exhaust.webp',
                'description' => 'summoner.description.exhaust'
            ],
            [
                'name' => 'summoner.smite',
                'image' => 'fixturePicture/Summoners/Smite.webp',
                'description' => 'summoner.description.smite'
            ],
            [
                'name' => 'summoner.ghost',
                'image' => 'fixturePicture/Summoners/Ghost.webp',
                'description' => 'summoner.description.ghost'
            ]
        ];

        foreach ($summoners as $summoner) {
            $summonerEntity = new SummonerEntity();
            $summonerEntity->setName($summoner['name']);
            $summonerEntity->setImage($summoner['image']);
            $summonerEntity->setDescription($summoner['description']);
            $manager->persist($summonerEntity);
            $manager->flush();
            $this->addReference(self::SUMMONER_REFERENCE . '_' . $summoner['name'], $summonerEntity);
        }

        $manager->flush();
    }
}
