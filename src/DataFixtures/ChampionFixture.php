<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Champion as ChampionEntity;

class ChampionFixture extends Fixture
{
    public const CHAMPION_REFERENCE = 'Champion';

    public function load(ObjectManager $manager)
    {
        $champions = [
            [
                'name' => 'Aatrox',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Aatrox.png'
            ],
            [
                'name' => 'Ahri',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Ahri.png'
            ],
            [
                'name' => 'Akali',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Akali.png'
            ],
            [
                'name' => 'Alistar',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Alistar.png'
            ],
            [
                'name' => 'Amumu',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Amumu.png'
            ],
            [
                'name' => 'Anivia',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Anivia.png'
            ],
[
                'name' => 'Annie',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Annie.png'
            ],
            [
                'name' => 'Aphelios',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Aphelios.png'
            ],
            [
                'name' => 'Ashe',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Ashe.png'
            ],
            [
                'name' => 'Aurelion Sol',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/AurelionSol.png'
            ],
            [
                'name' => 'Azir',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Azir.png'
            ],
            [
                'name' => 'Bard',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Bard.png'
            ],
            [
                'name' => 'Blitzcrank',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Blitzcrank.png'
            ],
            [
                'name' => 'Brand',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Brand.png'
            ],
            [
                'name' => 'Braum',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Braum.png'
            ],
            [
                'name' => 'Caitlyn',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Caitlyn.png'
            ],
            [
                'name' => 'Camille',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Camille.png'
            ],
            [
                'name' => 'Cassiopeia',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Cassiopeia.png'
            ],
            [
                'name' => 'Cho\'Gath',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/ChoGath.png'
            ],
            [
                'name' => 'Corki',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Corki.png'
            ],
            [
                'name' => 'Darius',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Darius.png'
            ],
            [
                'name' => 'Diana',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Diana.png'
            ],
            [
                'name' => 'Dr. Mundo',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/DrMundo.png'
            ],
            [
                'name' => 'Draven',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Draven.png'
            ],
            [
                'name' => 'Ekko',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Ekko.png'
            ],
            [
                'name' => 'Elise',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Elise.png'
            ],
            [
                'name' => 'Evelynn',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Evelynn.png'
            ],
            [
                'name' => 'Ezreal',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Ezreal.png'
            ],
            [
                'name' => 'Fiddlesticks',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Fiddlesticks.png'
            ],
            [
                'name' => 'Fiora',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Fiora.png'
            ],
            [
                'name' => 'Fizz',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Fizz.png'
            ],
            [
                'name' => 'Galio',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Galio.png'
            ],
            [
                'name' => 'Gangplank',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Gangplank.png'
            ],
            [
                'name' => 'Garen',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Garen.png'
            ],
            [
                'name' => 'Gnar',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Gnar.png'
            ],
            [
                'name' => 'Gragas',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Gragas.png'
            ],
            [
                'name' => 'Graves',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Graves.png'
            ],
            [
                'name' => 'Hecarim',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Hecarim.png'
            ],
            [
                'name' => 'Heimerdinger',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Heimerdinger.png'
            ],
            [
                'name' => 'Illaoi',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Illaoi.png'
            ],
            [
                'name' => 'Irelia',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Irelia.png'
            ],
            [
                'name' => 'Ivern',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Ivern.png'
            ],
            [
                'name' => 'Janna',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Janna.png'
            ],
            [
                'name' => 'Jarvan IV',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/JarvanIV.png'
            ],
            [
                'name' => 'Jax',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Jax.png'
            ],
            [
                'name' => 'Jayce',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Jayce.png'
            ],
            [
                'name' => 'Jhin',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Jhin.png'
            ],
            [
                'name' => 'Jinx',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Jinx.png'
            ],
            [
                'name' => 'Kai\'Sa',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/KaiSa.png'
            ],
            [
                'name' => 'Kalista',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Kalista.png'
            ],
            [
                'name' => 'Karma',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Karma.png'
            ],
            [
                'name' => 'Karthus',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Karthus.png'
            ],
            [
                'name' => 'Kassadin',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Kassadin.png'
            ],
            [
                'name' => 'Katarina',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Katarina.png'
            ],
            [
                'name' => 'Kayle',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Kayle.png'
            ],
            [
                'name' => 'Kayn',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Kayn.png'
            ],
            [
                'name' => 'Kennen',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Kennen.png'
            ],
            [
                'name' => 'Kha\'Zix',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/KhaZix.png'
            ],
            [
                'name' => 'Kindred',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Kindred.png'
            ],
            [
                'name' => 'Kled',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Kled.png'
            ],
            [
                'name' => 'Kog\'Maw',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/KogMaw.png'
            ],
            [
                'name' => 'LeBlanc',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/LeBlanc.png'
            ],
            [
                'name' => 'Lee Sin',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/LeeSin.png'
            ],
            [
                'name' => 'Leona',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Leona.png'
            ],
            [
                'name' => 'Lillia',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Lillia.png'
            ],
            [
                'name' => 'Lissandra',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Lissandra.png'
            ],
            [
                'name' => 'Lucian',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Lucian.png'
            ],
            [
                'name' => 'Lulu',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Lulu.png'
            ],
            [
                'name' => 'Lux',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Lux.png'
            ],
            [
                'name' => 'Malphite',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Malphite.png'
            ],
            [
                'name' => 'Malzahar',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Malzahar.png'
            ],
            [
                'name' => 'Maokai',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Maokai.png'
            ],
            [
                'name' => 'Master Yi',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/MasterYi.png'
            ],
            [
                'name' => 'Miss Fortune',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/MissFortune.png'
            ],
            [
                'name' => 'Mordekaiser',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Mordekaiser.png'
            ],
            [
                'name' => 'Morgana',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Morgana.png'
            ],
            [
                'name' => 'Nami',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Nami.png'
            ],
            [
                'name' => 'Nasus',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Nasus.png'
            ],
            [
                'name' => 'Nautilus',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Nautilus.png'
            ],
            [
                'name' => 'Neeko',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Neeko.png'
            ],
            [
                'name' => 'Nidalee',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Nidalee.png'
            ],
            [
                'name' => 'Nocturne',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Nocturne.png'
            ],
            [
                'name' => 'Nunu & Willump',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/NunuWillump.png'
            ],
            [
                'name' => 'Olaf',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Olaf.png'
            ],
            [
                'name' => 'Orianna',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Orianna.png'
            ],
            [
                'name' => 'Ornn',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Ornn.png'
            ],
            [
                'name' => 'Pantheon',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Pantheon.png'
            ],
            [
                'name' => 'Poppy',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Poppy.png'
            ],
            [
                'name' => 'Pyke',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Pyke.png'
            ],
            [
                'name' => 'Qiyana',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Qiyana.png'
            ],
            [
                'name' => 'Quinn',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Quinn.png'
            ],
            [
                'name' => 'Rakan',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Rakan.png'
            ],
            [
                'name' => 'Rammus',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Rammus.png'
            ],
            [
                'name' => 'Rek\'Sai',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/RekSai.png'
            ],
            [
                'name' => 'Renekton',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Renekton.png'
            ],
            [
                'name' => 'Rengar',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Rengar.png'
            ],
            [
                'name' => 'Riven',
                'description' => 'chanpion.top',
                'image' => 'fixturePicture/Champions/Riven.png'
            ],
            [
                'name' => 'Rumble',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Rumble.png'
            ],
            [
                'name' => 'Ryze',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Ryze.png'
            ],
            [
                'name' => 'Samira',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Samira.png'
            ],
            [
                'name' => 'Sejuani',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Sejuani.png'
            ],
            [
                'name' => 'Senna',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Senna.png'
            ],
            [
                'name' => 'Seraphine',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Seraphine.png'
            ],
            [
                'name' => 'Sett',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Sett.png'
            ],
            [
                'name' => 'Shaco',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Shaco.png'
            ],
            [
                'name' => 'Shen',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Shen.png'
            ],
            [
                'name' => 'Shyvana',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Shyvana.png'
            ],
            [
                'name' => 'Singed',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Singed.png'
            ],
            [
                'name' => 'Sion',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Sion.png'
            ],
            [
                'name' => 'Sivir',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Sivir.png'
            ],
            [
                'name' => 'Skarner',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Skarner.png'
            ],
            [
                'name' => 'Sona',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Sona.png'
            ],
            [
                'name' => 'Soraka',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Soraka.png'
            ],
            [
                'name' => 'Swain',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Swain.png'
            ],
            [
                'name' => 'Sylas',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Sylas.png'
            ],
            [
                'name' => 'Syndra',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Syndra.png'
            ],
            [
                'name' => 'Tahm Kench',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/TahmKench.png'
            ],
            [
                'name' => 'Taliyah',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Taliyah.png'
            ],
            [
                'name' => 'Talon',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Talon.png'
            ],
            [
                'name' => 'Taric',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Taric.png'
            ],
            [
                'name' => 'Teemo',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Teemo.png'
            ],
            [
                'name' => 'Thresh',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Thresh.png'
            ],
            [
                'name' => 'Tristana',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Tristana.png'
            ],
            [
                'name' => 'Trundle',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Trundle.png'
            ],
            [
                'name' => 'Tryndamere',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Tryndamere.png'
            ],
            [
                'name' => 'Twisted Fate',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/TwistedFate.png'
            ],
            [
                'name' => 'Twitch',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Twitch.png'
            ],
            [
                'name' => 'Udyr',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Udyr.png'
            ],
            [
                'name' => 'Urgot',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Urgot.png'
            ],
            [
                'name' => 'Varus',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Varus.png'
            ],
            [
                'name' => 'Vayne',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Vayne.png'
            ],
            [
                'name' => 'Veigar',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Veigar.png'
            ],
            [
                'name' => 'Vel\'Koz',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/VelKoz.png'
            ],
            [
                'name' => 'Vi',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Vi.png'
            ],
            [
                'name' => 'Viktor',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Viktor.png'
            ],
            [
                'name' => 'Vladimir',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Vladimir.png'
            ],
            [
                'name' => 'Volibear',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Volibear.png'
            ],
            [
                'name' => 'Warwick',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Warwick.png'
            ],
            [
                'name' => 'Wukong',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Wukong.png'
            ],
            [
                'name' => 'Xayah',
                'description' => 'champion.adc',
                'image' => 'fixturePicture/Champions/Xayah.png'
            ],
            [
                'name' => 'Xerath',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Xerath.png'
            ],
            [
                'name' => 'Xin Zhao',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/XinZhao.png'
            ],
            [
                'name' => 'Yasuo',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Yasuo.png'
            ],
            [
                'name' => 'Yone',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Yone.png'
            ],
            [
                'name' => 'Yorick',
                'description' => 'champion.top',
                'image' => 'fixturePicture/Champions/Yorick.png'
            ],
            [
                'name' => 'Yuumi',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Yuumi.png'
            ],
            [
                'name' => 'Zac',
                'description' => 'champion.jungle',
                'image' => 'fixturePicture/Champions/Zac.png'
            ],
            [
                'name' => 'Zed',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Zed.png'
            ],
            [
                'name' => 'Ziggs',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Ziggs.png'
            ],
            [
                'name' => 'Zilean',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Zilean.png'
            ],
            [
                'name' => 'Zoe',
                'description' => 'champion.mid',
                'image' => 'fixturePicture/Champions/Zoe.png'
            ],
            [
                'name' => 'Zyra',
                'description' => 'champion.support',
                'image' => 'fixturePicture/Champions/Zyra.png'
            ],
        ];

        foreach ($champions as $champion) {
            $championEntity = new ChampionEntity();
            $championEntity->setName($champion['name']);
            $championEntity->setDescription($champion['description']);
            $championEntity->setImage($champion['image']);
            $manager->persist($championEntity);
            $this->addReference(self::CHAMPION_REFERENCE . '_' . $champion['name'], $championEntity);
        }

        $manager->flush();
    }

}
