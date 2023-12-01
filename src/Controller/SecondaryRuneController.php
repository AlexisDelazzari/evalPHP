<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecondaryRuneController extends AbstractController
{
    #[Route('/secondary/rune', name: 'app_secondary_rune')]
    public function index(): Response
    {
        return $this->render('secondary_rune/index.html.twig', [
            'controller_name' => 'SecondaryRuneController',
        ]);
    }
}
