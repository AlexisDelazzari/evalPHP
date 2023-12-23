<?php

namespace App\Controller;

use App\Entity\Champion;
use App\Entity\GeneratedChampion;
use App\Entity\Item;
use App\Entity\PrimaryRune;
use App\Entity\SecondaryRune;
use App\Entity\Summoner;
use App\Entity\User;
use App\Enum\GeneratedChampionStatus;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(EntityManagerInterface $entityManager): Response
    {
         $secondaryRunes = $entityManager->getRepository(SecondaryRune::class)->countSecondaryRunes();
         $primaryRunes = $entityManager->getRepository(PrimaryRune::class)->countPrimaryRunes();
         $champions = $entityManager->getRepository(Champion::class)->countChampions();
         $generatedChampions = $entityManager->getRepository(GeneratedChampion::class)->countGeneratedChampions();
         $users = $entityManager->getRepository(User::class)->countUsers();
         $nbUsersAdmin = $entityManager->getRepository(User::class)->countUsersByRole('1');
         $nbUsersUser = $entityManager->getRepository(User::class)->countUsersByRole('0');
         $averageChampionsPerUser = $entityManager->getRepository(GeneratedChampion::class)->averageChampionsGeneratedPerUser();
         $generatedChampionsValided = $entityManager->getRepository(GeneratedChampion::class)->countGeneratedChampionsValided(GeneratedChampionStatus::VALIDATED);
         $generatedChampionsRefused = $entityManager->getRepository(GeneratedChampion::class)->countGeneratedChampionsValided(GeneratedChampionStatus::NOT_VALIDATED);
         $summoners = $entityManager->getRepository(Summoner::class)->countSummoners();
         $items = $entityManager->getRepository(Item::class)->countItems();
         $legendaryItems = $entityManager->getRepository(Item::class)->countLegendaryItems();
         $mythicItems = $entityManager->getRepository(Item::class)->countMythicItems();
         $botteItems = $entityManager->getRepository(Item::class)->countBotteItems();

        if ($generatedChampionsValided == 0) {
            $moyenne = 0;
        } else {
            $moyenne = round($generatedChampionsValided / $generatedChampions * 100, 2);
        }


        return $this->render('admin/index.html.twig', [
            'secondaryRunes' => $secondaryRunes,
            'primaryRunes' => $primaryRunes,
            'champions' => $champions,
            'generatedChampions' => $generatedChampions,
            'validatedChampions' => $generatedChampionsValided,
            'refusedChampions' => $generatedChampionsRefused,
            'averageChampions' => $moyenne,
            'users' => $users,
            'nbUsersAdmin' => $nbUsersAdmin,
            'nbUsersUser' => $nbUsersUser,
            'averageChampionsPerUser' => $averageChampionsPerUser,
            'summoner' => $summoners,
            'items' => $items,
            'legendaryItems' => $legendaryItems,
            'mythicItems' => $mythicItems,
            'botteItems' => $botteItems,
        ]);
    }
}
