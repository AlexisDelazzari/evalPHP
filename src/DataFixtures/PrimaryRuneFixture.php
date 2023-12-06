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
                'description' => 'Augmente les dégâts d\'attaque et la vitesse d\'attaque',
                'image' => 'fixturePicture/PrimaryRunes/Precision.png'
            ],
            [
                'name' => 'Domination',
                'description' => 'Augmente les dégâts des capacités et la pénétration magique',
                'image' => 'fixturePicture/PrimaryRunes/Domination.png'
            ],
            [
                'name' => 'Sorcery',
                'description' => 'Augmente la puissance des capacités et la vitesse de déplacement',
                'image' => 'fixturePicture/PrimaryRunes/Sorcery.png'
            ],
            [
                'name' => 'Resolve',
                'description' => 'Augmente la résistance et la durabilité',
                'image' => 'fixturePicture/PrimaryRunes/Resolve.png'
            ],
            [
                'name' => 'Inspiration',
                'description' => 'Augmente la créativité et l\'utilité',
                'image' => 'fixturePicture/PrimaryRunes/Inspiration.png'
            ]
        ];

        foreach ($primaryRunes as $key => $primaryRune) {
            $primaryRuneEntity = new PrimaryRuneEntity();
            $primaryRuneEntity->setName($primaryRune['name']);
            $primaryRuneEntity->setDescription($primaryRune['description']);
            $primaryRuneEntity->setImage($primaryRune['image']);
            $manager->persist($primaryRuneEntity);
            $this->addReference(self::PRIMARY_RUNE_REFERENCE . '_' . $key, $primaryRuneEntity);
        }

        $manager->flush();

    }
}