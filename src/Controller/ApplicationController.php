<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApplicationController extends AbstractController
{
    #[Route('/application', name: 'app_application')]
    public function index(): Response
    {
        //on recup l'utilisateur connecté
        $user = $this->getUser();
        //on check si l'utilisateur est connecté
        if(!$user){
            $this->addFlash('warning', 'Vous devez être connecté pour accéder à cette page!');
            return $this->redirectToRoute('app_login');
        }
        //on check dans la table user si l'utilisateur est confirmé
        if(!$user->getIsConfirmed()){
            $this->addFlash('error', 'Un email de confirmation vous a été envoyé! Veuillez confirmer votre inscription en saisissant le code reçu par mail. Merci!');
            return $this->redirectToRoute('app_checkCodeInscription');
        }


        return $this->render('application/index.html.twig', [
            'controller_name' => 'ApplicationController',
        ]);
    }
}
