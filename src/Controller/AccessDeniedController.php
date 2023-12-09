<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccessDeniedController extends AbstractController
{
    #[Route('/accessDenied', name: 'app_accessDenied')]
    public function index(): Response
    {
        return $this->render('accessDenied/index.html.twig', [
            'controller_name' => 'AccessDeniedController',
        ]);
    }
}