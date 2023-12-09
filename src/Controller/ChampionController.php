<?php

namespace App\Controller;

use App\Entity\Champion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChampionController extends AbstractController
{
    #[Route('/champion', name: 'app_champion')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $champion = $entityManager->getRepository(Champion::class)->findAll();
        return $this->render('champion/index.html.twig', [
            'controller_name' => 'ChampionController',
            'champion' => $champion
        ]);
    }
}
