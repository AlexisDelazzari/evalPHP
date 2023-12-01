<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeneratedChampionController extends AbstractController
{
    #[Route('/generated/champion', name: 'app_generated_champion')]
    public function index(): Response
    {
        return $this->render('generated_champion/index.html.twig', [
            'controller_name' => 'GeneratedChampionController',
        ]);
    }
}
