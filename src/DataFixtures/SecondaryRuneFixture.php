<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\PrimaryRune as PrimaryRuneEntity;
use App\Entity\SecondaryRune as SecondaryRuneEntity;

class SecondaryRuneFixture extends Fixture
{
    public const SECONDARY_RUNE_REFERENCE = 'SecondaryRune';

    public function load(ObjectManager $manager)
    {
        $precision = $manager->getRepository(PrimaryRuneEntity::class)->findOneBy(['name' => 'Precision']);
        $domination = $manager->getRepository(PrimaryRuneEntity::class)->findOneBy(['name' => 'Domination']);
        $sorcery = $manager->getRepository(PrimaryRuneEntity::class)->findOneBy(['name' => 'Sorcery']);
        $resolve = $manager->getRepository(PrimaryRuneEntity::class)->findOneBy(['name' => 'Resolve']);
        $inspiration = $manager->getRepository(PrimaryRuneEntity::class)->findOneBy(['name' => 'Inspiration']);

        $secondaryRunes = [
            [
                'name' => 'Electrocution',
                'image' => 'fixturePicture/SecondaryRunes/Electrocute.png',
                'primaryRune' => $domination,
            ],
            [
                'name' => 'Dark Harvest',
                'image' => 'fixturePicture/SecondaryRunes/DarkHarvest.png',
                'primaryRune' => $domination,
            ],
            [
                'name' => 'Predator',
                'image' => 'fixturePicture/SecondaryRunes/Predator.png',
                'primaryRune' => $domination,
            ],
            [
                'name' => 'Hail of Blade',
                'image' => 'fixturePicture/SecondaryRunes/HailOfBlade.png',
                'primaryRune' => $domination,
            ],
            [
                'name' => 'First Strike',
                'image' => 'fixturePicture/SecondaryRunes/FirstStrike.png',
                'primaryRune' => $inspiration,
            ],
            [
                'name' => 'Glacial Augment',
                'image' => 'fixturePicture/SecondaryRunes/GlacialAugment.png',
                'primaryRune' => $inspiration,
            ],
            [
                'name' => 'Unsealed Spellbook',
                'image' => 'fixturePicture/SecondaryRunes/UnsealedSpellbook.png',
                'primaryRune' => $inspiration,
            ],
            [
                'name' => 'Conqueror',
                'image' => 'fixturePicture/SecondaryRunes/Conqueror.png',
                'primaryRune' => $precision,
            ],
            [
                'name' => 'Fleet Footwork',
                'image' => 'fixturePicture/SecondaryRunes/FleetFootwork.png',
                'primaryRune' => $precision,
            ],
            [
                'name' => 'Lethal Tempo',
                'image' => 'fixturePicture/SecondaryRunes/LethalTempoTemp.png',
                'primaryRune' => $precision,
            ],
            [
                'name' => 'Press the Attack',
                'image' => 'fixturePicture/SecondaryRunes/PressTheAttack.png',
                'primaryRune' => $precision,
            ],
            [
                'name' => 'Grasp of the Undying',
                'image' => 'fixturePicture/SecondaryRunes/GraspOfTheUndying.png',
                'primaryRune' => $resolve,
            ],
            [
                'name' => 'Aftershock',
                'image' => 'fixturePicture/SecondaryRunes/VeteranAftershock.png',
                'primaryRune' => $resolve,
            ],
            [
                'name' => 'Guardian',
                'image' => 'fixturePicture/SecondaryRunes/Guardian.png',
                'primaryRune' => $resolve,
            ],
            [
                'name' => 'Arcane Comet',
                'image' => 'fixturePicture/SecondaryRunes/ArcaneComet.png',
                'primaryRune' => $sorcery,
            ],
            [
                'name' => 'Phase Rush',
                'image' => 'fixturePicture/SecondaryRunes/PhaseRush.png',
                'primaryRune' => $sorcery,
            ],
            [
                'name' => 'Summon Aery',
                'image' => 'fixturePicture/SecondaryRunes/SummonAery.png',
                'primaryRune' => $sorcery,
            ]
        ];

        foreach ($secondaryRunes as $key => $secondaryRune) {
            $secondaryRuneEntity = new SecondaryRuneEntity();
            $secondaryRuneEntity->setName($secondaryRune['name']);
            $secondaryRuneEntity->setImage($secondaryRune['image']);
            $secondaryRuneEntity->setPrimaryRune($secondaryRune['primaryRune']);
            $manager->persist($secondaryRuneEntity);
            $this->addReference(self::SECONDARY_RUNE_REFERENCE . '_' . $key, $secondaryRuneEntity);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            PrimaryRuneFixture::class,
        ];
    }
}