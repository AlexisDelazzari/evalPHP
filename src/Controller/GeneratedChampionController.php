<?php

namespace App\Controller;

use App\Entity\GeneratedChampion;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeneratedChampionController extends AbstractController
{
    #[Route('/generated/champion', name: 'app_generated_champion')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $generatedChampions = $entityManager->getRepository(GeneratedChampion::class)->findAll();
        return $this->render('generated_champion/index.html.twig', [
            'generatedChampions' => $generatedChampions,
        ]);
    }

    #[Route('/generated/champion/user/{id}', name: 'app_generated_champion_user')]
    public function showChampionByUser(EntityManagerInterface $entityManager, int $id): Response
    {
        $generatedChampions = $entityManager->getRepository(GeneratedChampion::class)->findBy(['user' => $id], ['id' => 'DESC']);
        return $this->render('generated_champion/index.html.twig', [
            'generatedChampions' => $generatedChampions,
        ]);
    }
}
