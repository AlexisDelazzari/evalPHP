<?php

namespace App\Controller;

use App\Entity\Champion;
use App\Entity\GeneratedChampion;
use App\Entity\Item;
use App\Entity\RandomName;
use App\Entity\SecondaryRune;
use App\Entity\Summoner;
use App\Enum\GeneratedChampionStatus;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;

class AppController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {

        $champions = $entityManager->getRepository(Champion::class)->findAll();
        $summoners = $entityManager->getRepository(Summoner::class)->findAll();
        $secondaryRunes = $entityManager->getRepository(SecondaryRune::class)->findAll();
        $legendaryItems = $entityManager->getRepository(Item::class)->findBy(['isBotte' => false, 'isMythic' => false]);
        $botteItems = $entityManager->getRepository(Item::class)->findBy(['isBotte' => true]);
        $mythicItems = $entityManager->getRepository(Item::class)->findBy(['isMythic' => true]);
        $generatedChampions = $entityManager->getRepository(GeneratedChampion::class)->findBy(['user' => $this->getUser()], ['id' => 'DESC']);
        return $this->render('app/index.html.twig', [
            'champions' => $champions,
            'summoners1' => $summoners,
            'summoners2' => $summoners,
            'runes1' => $secondaryRunes,
            'runes2' => $secondaryRunes,
            'items1' => $legendaryItems,
            'items2' => $legendaryItems,
            'items3' => $legendaryItems,
            'items4' => $legendaryItems,
            'botteItems' => $botteItems,
            'mythicItems' => $mythicItems,
            'generatedChampions' => $generatedChampions,
            'selectedChampion' => $request->query->get('id'),
        ]);
    }

    //roue pour save le champion généré
    #[Route('/save', name: 'app_save')]
    public function save(EntityManagerInterface $entityManager, Request $request): Response
    {
        $randomName = 'Champion ' . rand(0, 100000);
        $randomNameEntity = new RandomName();
        $randomNameEntity->setName($randomName);
        $entityManager->persist($randomNameEntity);
        $entityManager->flush();

        $generatedChampion = new GeneratedChampion();
        $status = $request->query->get('status');
        $generatedChampion->setUser($this->getUser());
        $generatedChampion->setChampion($entityManager->getRepository(Champion::class)->findOneBy(['name' => $request->query->get('champion')]));
        $generatedChampion->setSummoner1($entityManager->getRepository(Summoner::class)->findOneBy(['name' => $request->query->get('summoner1')]));
        $generatedChampion->setSummoner2($entityManager->getRepository(Summoner::class)->findOneBy(['name' => $request->query->get('summoner2')]));
        $generatedChampion->setSecondaryRune1($entityManager->getRepository(SecondaryRune::class)->findOneBy(['name' => $request->query->get('rune1')]));
        $generatedChampion->setSecondaryRune2($entityManager->getRepository(SecondaryRune::class)->findOneBy(['name' => $request->query->get('rune2')]));
        $items = [
            $entityManager->getRepository(Item::class)->findOneBy(['name' => $request->query->get('item1')]),
            $entityManager->getRepository(Item::class)->findOneBy(['name' => $request->query->get('item2')]),
            $entityManager->getRepository(Item::class)->findOneBy(['name' => $request->query->get('item3')]),
            $entityManager->getRepository(Item::class)->findOneBy(['name' => $request->query->get('item4')]),
            $entityManager->getRepository(Item::class)->findOneBy(['name' => $request->query->get('mythicItem')]),
            $entityManager->getRepository(Item::class)->findOneBy(['name' => $request->query->get('bottesItem')]),
        ];
        //on convertie en collection pour pouvoir utiliser la méthode add
        $generatedChampion->setItems( new \Doctrine\Common\Collections\ArrayCollection($items));
        $generatedChampion->setRandomName($randomNameEntity);
        $generatedChampion->setStatus($status == 'validated' ? GeneratedChampionStatus::VALIDATED : GeneratedChampionStatus::NOT_VALIDATED);
        $entityManager->persist($generatedChampion);
        $entityManager->flush();
        return $this->redirectToRoute('app_home');
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(Security $security): Response
    {
        $response = $security->logout();
        $response = $security->logout(false);
        return $response;
    }
}
