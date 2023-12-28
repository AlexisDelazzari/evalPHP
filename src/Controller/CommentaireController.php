<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\GeneratedChampion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentaireController extends AbstractController
{
    #[Route('/commentaire', name: 'app_commentaire')]
    public function index(): Response
    {
        return $this->render('commentaire/index.html.twig', [
            'controller_name' => 'CommentaireController',
        ]);
    }

    #[Route('/commentaire/add', name: 'app_commentaire_add')]
    public function add(EntityManagerInterface $entityManager, Request $request): Response
    {

        if(!$this->getUser()){
            $this->addFlash('error', 'Vous devez être connecté pour accéder à cette page!');
            return $this->redirectToRoute('app_login');
        }
        if (!$request->query->get('text')) {
            $this->addFlash('error', 'Vous devez saisir un commentaire!');
            return $this->redirectToRoute('app_home', ['id' => $request->query->get('id')]);
        }
        if (!$request->query->get('id')) {
            $this->addFlash('error', 'Vous devez sélectionner un champion!');
            return $this->redirectToRoute('app_home', ['id' => $request->query->get('id')]);
        }
        if (!$entityManager->getRepository(GeneratedChampion::class)->find($request->query->get('id'))) {
            $this->addFlash('error', 'Vous devez sélectionner un champion!');
            return $this->redirectToRoute('app_home', ['id' => $request->query->get('id')]);
        }

        $commentaire = new Commentaire();
        $commentaire->setUser($this->getUser());
        $commentaire->setTexte($request->query->get('text'));
        $commentaire->setGeneratedChampion($entityManager->getRepository(GeneratedChampion::class)->find($request->query->get('id')));
        $entityManager->persist($commentaire);
        $entityManager->flush();
        return $this->redirectToRoute('app_home', ['id' => $request->query->get('id')]);
    }
}
