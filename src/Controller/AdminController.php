<?php

namespace App\Controller;

use App\Entity\Champion;
use App\Entity\GeneratedChampion;
use App\Entity\PrimaryRune;
use App\Entity\SecondaryRune;
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

         $generatedChampionsValided = $entityManager->getRepository(GeneratedChampion::class)->countGeneratedChampionsValided(GeneratedChampionStatus::VALIDATED);
         $generatedChampionsRefused = $entityManager->getRepository(GeneratedChampion::class)->countGeneratedChampionsValided(GeneratedChampionStatus::NOT_VALIDATED);

        if ($generatedChampionsValided == 0) {
            $moyenne = 0;
        } else {
            $moyenne = $generatedChampionsValided / $generatedChampions * 100;
        }


        return $this->render('admin/index.html.twig', [
            'secondaryRunes' => $secondaryRunes,
            'primaryRunes' => $primaryRunes,
            'champions' => $champions,
            'generatedChampions' => $generatedChampions,
            'validatedChampions' => $generatedChampionsValided,
            'refusedChampions' => $generatedChampionsRefused,
            'averageChampions' => $moyenne,
        ]);



        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
