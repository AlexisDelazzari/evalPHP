<?php

namespace App\DataFixtures;

use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ItemFixture extends Fixture
{

    public const ITEM_REFERENCE = 'Item';

    public function load(ObjectManager $manager): void
    {
        $items = [
            [
                'name' => 'Frostfire Gauntlet',
                'description' => 'Taking or dealing damage causes you to begin dealing magic damage per second to nearby enemies. Attacks create a frost field that slows enemies.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/6632.png',
                'price' => 3400,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Sunfire Aegis',
                'description' => 'Taking or dealing damage causes you to begin dealing magic damage per second to nearby enemies. Damaging champions or epic monsters increases subsequent damage and burns nearby enemies at maximum stacks.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/6662.png',
                'price' => 3500,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Turbo Chemtank',
                'description' => 'Taking or dealing damage causes you to begin dealing magic damage per second to nearby enemies. Grants supercharged move speed towards enemies and emits a shockwave that slows nearby champions.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/6664.png',
                'price' => 2800,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Trinity Force',
                'description' => 'Attacks grant move speed and increase base attack damage. After using an ability, your next attack is enhanced with additional physical damage on-hit.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3078.png',
                'price' => 3333,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Divine Sunderer',
                'description' => 'After using an ability, your next attack is enhanced with additional max health physical damage on-hit. Grants armor penetration and magic penetration.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/6630.png',
                'price' => 3300,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Stridebreaker',
                'description' => 'Lunge a short distance and deal physical damage to nearby enemies, slowing them. Dealing physical damage grants move speed.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/6631.png',
                'price' => 3300,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Galeforce',
                'description' => 'Dash in target direction, firing three missiles at the lowest health enemy near your destination. Deals magic damage, increased against low health targets.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/6672.png',
                'price' => 3400,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Kraken Slayer',
                'description' => 'Every third attack deals additional true damage. Grants attack speed.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/6673.png',
                'price' => 3400,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Immortal Shieldbow',
                'description' => 'When taking damage that would reduce you below 30% health, gain a shield and bonus attack damage. Grants lifesteal.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/6671.png',
                'price' => 3400,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Duskblade of Draktharr',
                'description' => 'Attacking a champion deals additional physical damage and slows the target. Becomes invisible if a champion you damaged dies.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/6691.png',
                'price' => 3200,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Prowler’s Claw',
                'description' => 'Dash through target enemy, dealing physical damage. Deals increased damage to the target for the next 3 seconds.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/6692.png',
                'price' => 3200,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Imperial Mandate',
                'description' => 'Abilities that slow or immobilize a champion deal bonus magic damage and mark them. Ally champion damage detonates the mark, dealing additional magic damage and granting move speed.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/4005.png',
                'price' => 2500,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Moonstone Renewer',
                'description' => 'When affecting champions with attacks or abilities in combat, restore health to the most wounded nearby ally. Each second spent in combat with champions increases your heal and shield power.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/6616.png',
                'price' => 2500,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Shurelya’s Battlesong',
                'description' => 'Grants nearby allies decaying move speed for 4 seconds. Empowering or protecting another ally champion grants both allies move speed.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/6676.png',
                'price' => 2500,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Locket of the Iron Solari',
                'description' => 'Grant nearby allies a shield that decays over 2.5 seconds. Grant nearby allied champions armor and magic resist.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3190.png',
                'price' => 2500,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Everfrost',
                'description' => 'Deal magic damage in a cone, slowing enemies. Enemies at the center of the cone are rooted. Grants ability power.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/6656.png',
                'price' => 3400,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Luden’s Tempest',
                'description' => 'Damaging abilities deal additional magic damage to the target and nearby enemies. Grants ability power and magic penetration.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/6655.png',
                'price' => 3400,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Liandry’s Anguish',
                'description' => 'Deal bonus magic damage to champions based on their bonus health. Dealing damage with abilities causes enemies to burn for magic damage over time.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/6653.png',
                'price' => 3400,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Night Harvester',
                'description' => 'Damaging a champion deals additional magic damage and grants move speed. Damaging a new champion extends the duration of the move speed bonus.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/4637.png',
                'price' => 3200,
                'isBotte' => false,
                'isMythic' => true,
            ],
            [
                'name' => 'Hextech Rocketbelt',
                'description' => 'Dash in target direction, unleashing an arc of magic missiles that deal magic damage. Gain move speed towards enemy champions.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3152.png',
                'price' => 3200,
                'isBotte' => false,
                'isMythic' => true,
            ],


            //on declare les bottes


            [
                'name' => 'Mercury\'s Treads',
                'description' => 'Boots of Swiftness',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3111.png',
                'price' => 1100,
                'isBotte' => true,
                'isMythic' => false,
            ],
            [
                'name' => 'Ninja Tabi',
                'description' => '',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3047.png',
                'price' => 1100,
                'isBotte' => true,
                'isMythic' => false,
            ],
            [
                'name' => 'Plated Steelcaps',
                'description' => '',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3020.png',
                'price' => 1100,
                'isBotte' => true,
                'isMythic' => false,
            ],
            [
                'name' => 'Mobility Boots',
                'description' => '',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3117.png',
                'price' => 900,
                'isBotte' => true,
                'isMythic' => false,
            ],
            [
                'name' => 'Lucidity Boots',
                'description' => '',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3158.png',
                'price' => 900,
                'isBotte' => true,
                'isMythic' => false,
            ],
            [
                'name' => 'Berserker\'s Greaves',
                'description' => '',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3006.png',
                'price' => 1100,
                'isBotte' => true,
                'isMythic' => false,
            ],
            [
                'name' => 'Sorcerer\'s Shoes',
                'description' => '',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3009.png',
                'price' => 900,
                'isBotte' => true,
                'isMythic' => false,
            ],


            [
                'name' => 'Dead Man\'s Plate',
                'description' => 'Builds stacks as you move, gaining bonus movement speed. At max stacks, your next basic attack deals bonus damage and slows the target.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3742.png',
                'price' => 2900,
                'isBotte' => false,
                'isMythic' => false,
            ],
            [
                'name' => 'Infinity Edge',
                'description' => 'Increases critical strike damage and provides bonus attack damage. Critical strikes deal bonus damage.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3031.png',
                'price' => 3400,
                'isBotte' => false,
                'isMythic' => false,
            ],
            [
                'name' => 'Ravenous Hydra',
                'description' => 'Grants bonus attack damage and omnivamp. Your basic attacks and abilities heal you for a portion of the damage dealt.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3074.png',
                'price' => 3300,
                'isBotte' => false,
                'isMythic' => false,
            ],
            [
                'name' => 'Seraph\'s Embrace',
                'description' => 'Provides bonus ability power, mana, and ability haste. Grants a shield that absorbs damage based on your maximum mana.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3040.png',
                'price' => 2600,
                'isBotte' => false,
                'isMythic' => false,
            ],
            [
                'name' => 'Spirit Visage',
                'description' => 'Increases your healing and shielding effects. Grants bonus health and magic resist.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3065.png',
                'price' => 2900,
                'isBotte' => false,
                'isMythic' => false,
            ],
            [
                'name' => 'Black Cleaver',
                'description' => 'Dealing physical damage to a champion reduces their armor. Grants bonus attack damage and health.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3071.png',
                'price' => 3300,
                'isBotte' => false,
                'isMythic' => false,
            ],
            [
                'name' => 'Guardian Angel',
                'description' => 'Upon taking lethal damage, revive with a portion of your health. Grants bonus attack damage and attack damage.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3026.png',
                'price' => 2800,
                'isBotte' => false,
                'isMythic' => false,
            ],
            [
                'name' => 'Banshee\'s Veil',
                'description' => 'Blocks a single enemy ability. Grants bonus ability power, health, and magic resist.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3157.png',
                'price' => 2600,
                'isBotte' => false,
                'isMythic' => false,
            ],
            [
                'name' => 'Randuin\'s Omen',
                'description' => 'Reduces incoming critical strike damage. Slows nearby enemies on basic attacks. Grants bonus health and armor.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3143.png',
                'price' => 2700,
                'isBotte' => false,
                'isMythic' => false,
            ],
            [
                'name' => 'Blade of the Ruined King',
                'description' => 'Basic attacks deal bonus damage and steal the target\'s movement speed. Grants bonus attack damage, attack speed, and life steal.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3153.png',
                'price' => 3200,
                'isBotte' => false,
                'isMythic' => false,
            ],
            [
                'name' => 'Sterak\'s Gage',
                'description' => 'Grants bonus attack damage and a shield when taking damage that reduces you below a certain health threshold. The shield scales with your bonus health.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3053.png',
                'price' => 3100,
                'isBotte' => false,
                'isMythic' => false,
            ],
            [
                'name' => 'Mortal Reminder',
                'description' => 'Inflicts grievous wounds on enemies hit by your physical damage. Grants bonus attack damage and armor penetration.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3033.png',
                'price' => 2700,
                'isBotte' => false,
                'isMythic' => false,
            ],
            [
                'name' => 'Lord Dominik\'s Regards',
                'description' => 'Deals bonus damage to high-health targets. Grants bonus attack damage and armor penetration.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3036.png',
                'price' => 2900,
                'isBotte' => false,
                'isMythic' => false,
            ],
            [
                'name' => 'Frozen Heart',
                'description' => 'Reduces attack speed of nearby enemies. Grants bonus armor, mana, and ability haste.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3110.png',
                'price' => 2500,
                'isBotte' => false,
                'isMythic' => false,
            ],
            [
                'name' => 'Warmog\'s Armor',
                'description' => 'Grants bonus health and health regeneration. Restores a percentage of your maximum health every 5 seconds if you haven\'t taken damage recently.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3083.png',
                'price' => 3000,
                'isBotte' => false,
                'isMythic' => false,
            ],
            [
                'name' => 'Thornmail',
                'description' => 'Reflects a portion of damage taken from basic attacks. Inflicts grievous wounds on enemies hit by your basic attacks. Grants bonus armor.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3075.png',
                'price' => 2700,
                'isBotte' => false,
                'isMythic' => false,
            ],
            [
                'name' => 'Maw of Malmortius',
                'description' => 'Grants bonus attack damage and magic resist. Lifeline grants a shield when taking magic damage below a certain health threshold.',
                'image' => 'https://ddragon.leagueoflegends.com/cdn/11.18.1/img/item/3156.png',
                'price' => 2800,
                'isBotte' => false,
                'isMythic' => false,
            ],
        ];

        foreach ($items as $item) {
            $itemEntity = new Item();
            $itemEntity->setName($item['name']);
            $itemEntity->setDescription($item['description']);
            $itemEntity->setImage($item['image']);
            $itemEntity->setPrice($item['price']);
            $itemEntity->setIsBotte($item['isBotte']);
            $itemEntity->setIsMythic($item['isMythic']);
            $manager->persist($itemEntity);
            $this->addReference(self::ITEM_REFERENCE . '_' . $item['name'], $itemEntity);
        }

        $manager->flush();
    }
}
