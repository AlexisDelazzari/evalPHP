<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrimaryRuneController extends AbstractController
{
    #[Route('/primary/rune', name: 'app_primary_rune')]
    public function index(): Response
    {
        return $this->render('primary_rune/index.html.twig', [
            'controller_name' => 'PrimaryRuneController',
        ]);
    }
}
