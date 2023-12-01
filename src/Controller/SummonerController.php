<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SummonerController extends AbstractController
{
    #[Route('/summoner', name: 'app_summoner')]
    public function index(): Response
    {
        return $this->render('summoner/index.html.twig', [
            'controller_name' => 'SummonerController',
        ]);
    }
}
