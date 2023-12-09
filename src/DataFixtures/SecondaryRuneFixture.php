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
                'image' => 'fixturePicture/SecondaryRunes/Domination/Electrocute.png',
                'primaryRune' => $domination,
            ],
            [
                'name' => 'Dark_Harvest',
                'image' => 'fixturePicture/SecondaryRunes/Domination/DarkHarvest.png',
                'primaryRune' => $domination,
            ],
            [
                'name' => 'Predator',
                'image' => 'fixturePicture/SecondaryRunes/Domination/Predator.png',
                'primaryRune' => $domination,
            ],
            [
                'name' => 'Hail_of_Blade',
                'image' => 'fixturePicture/SecondaryRunes/Domination/HailOfBlades.png',
                'primaryRune' => $domination,
            ],
            [
                'name' => 'First_Strike',
                'image' => 'fixturePicture/SecondaryRunes/Inspiration/FirstStrike.png',
                'primaryRune' => $inspiration,
            ],
            [
                'name' => 'Glacial_Augment',
                'image' => 'fixturePicture/SecondaryRunes/Inspiration/GlacialAugment.png',
                'primaryRune' => $inspiration,
            ],
            [
                'name' => 'Unsealed_Spellbook',
                'image' => 'fixturePicture/SecondaryRunes/Inspiration/UnsealedSpellbook.png',
                'primaryRune' => $inspiration,
            ],
            [
                'name' => 'Conqueror',
                'image' => 'fixturePicture/SecondaryRunes/Precision/Conqueror.png',
                'primaryRune' => $precision,
            ],
            [
                'name' => 'Fleet_Footwork',
                'image' => 'fixturePicture/SecondaryRunes/Precision/FleetFootwork.png',
                'primaryRune' => $precision,
            ],
            [
                'name' => 'Lethal_Tempo',
                'image' => 'fixturePicture/SecondaryRunes/Precision/LethalTempoTemp.png',
                'primaryRune' => $precision,
            ],
            [
                'name' => 'Press_the_Attack',
                'image' => 'fixturePicture/SecondaryRunes/Precision/PressTheAttack.png',
                'primaryRune' => $precision,
            ],
            [
                'name' => 'Grasp_of_the_Undying',
                'image' => 'fixturePicture/SecondaryRunes/Resolve/GraspOfTheUndying.png',
                'primaryRune' => $resolve,
            ],
            [
                'name' => 'Aftershock',
                'image' => 'fixturePicture/SecondaryRunes/Resolve/VeteranAftershock.png',
                'primaryRune' => $resolve,
            ],
            [
                'name' => 'Guardian',
                'image' => 'fixturePicture/SecondaryRunes/Resolve/Guardian.png',
                'primaryRune' => $resolve,
            ],
            [
                'name' => 'Arcane_Comet',
                'image' => 'fixturePicture/SecondaryRunes/Sorcery/ArcaneComet.png',
                'primaryRune' => $sorcery,
            ],
            [
                'name' => 'Phase_Rush',
                'image' => 'fixturePicture/SecondaryRunes/Sorcery/PhaseRush.png',
                'primaryRune' => $sorcery,
            ],
            [
                'name' => 'Summon_Aery',
                'image' => 'fixturePicture/SecondaryRunes/Sorcery/SummonAery.png',
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