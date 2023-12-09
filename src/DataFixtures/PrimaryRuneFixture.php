<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\PrimaryRune as PrimaryRuneEntity;

class PrimaryRuneFixture extends Fixture
{
    public const PRIMARY_RUNE_REFERENCE = 'PrimaryRune';

    public function load(ObjectManager $manager)
    {
        $primaryRunes = [
            [
                'name' => 'Precision',
                'description' => 'descPrecision',
                'image' => 'fixturePicture/PrimaryRunes/Precision.png',
                'color' => '#d59535'
            ],
            [
                'name' => 'Domination',
                'description' => 'descDomination',
                'image' => 'fixturePicture/PrimaryRunes/Domination.png',
                'color' => '#ee2352'
            ],
            [
                'name' => 'Sorcery',
                'description' => 'descSorcery',
                'image' => 'fixturePicture/PrimaryRunes/Sorcery.png',
                'color' => '#3ec7fa'
            ],
            [
                'name' => 'Resolve',
                'description' => 'descResolve',
                'image' => 'fixturePicture/PrimaryRunes/Resolve.png',
                'color' => '#23dd46'
            ],
            [
                'name' => 'Inspiration',
                'description' => 'descInspiration',
                'image' => 'fixturePicture/PrimaryRunes/Inspiration.png',
                'color' => '#2de1ec'
            ]
        ];

        foreach ($primaryRunes as $key => $primaryRune) {
            $primaryRuneEntity = new PrimaryRuneEntity();
            $primaryRuneEntity->setName($primaryRune['name']);
            $primaryRuneEntity->setDescription($primaryRune['description']);
            $primaryRuneEntity->setImage($primaryRune['image']);
            $primaryRuneEntity->setColor($primaryRune['color']);
            $manager->persist($primaryRuneEntity);
            $this->addReference(self::PRIMARY_RUNE_REFERENCE . '_' . $key, $primaryRuneEntity);
        }

        $manager->flush();

    }
}