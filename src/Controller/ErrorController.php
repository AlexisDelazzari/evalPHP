<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ErrorController extends AbstractController
{
    public function routeNotFound(): Response
    {
        return $this->render('error/route_not_found.html.twig');
    }
}