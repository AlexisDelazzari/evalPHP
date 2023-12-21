<?php

namespace App\Controller;

use App\Entity\Champion;
use App\Entity\GeneratedChampion;
use App\Form\ChampionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChampionController extends AbstractController
{
    #[Route('/champion', name: 'app_champion')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $champions = $entityManager->getRepository(Champion::class)->findAll();
        return $this->render('champion/index.html.twig', [
            'champions' => $champions
        ]);
    }

    #[Route('/champion/delete/{id}', name: 'app_champion_delete', methods: ['GET', 'POST'])]
    public function delete(int $id, EntityManagerInterface $entityManager,Request $request): Response
    {
        $champion = $entityManager->getRepository(Champion::class)->find($id);
        $generatedChampions = $entityManager->getRepository(GeneratedChampion::class)->countGeneratedChampionsByChampion($id);
        if($generatedChampions > 0){
            $this->addFlash('error', 'Impossible de supprimer ce champion car il est utilisé dans des champions générés!');
            return $this->redirectToRoute('app_champion');
        }

        $entityManager->remove($champion);
        $entityManager->flush();
        $this->addFlash('success', 'Champion supprimé!');
        return $this->redirectToRoute('app_champion');
    }

    #[Route('/champion/add', name: 'app_champion_add', methods: ['GET', 'POST'])]
    public function add(EntityManagerInterface $entityManager, Request $request): Response
    {
        $champion = new Champion();
        $form = $this->createForm(ChampionType::class, $champion);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($champion);
            $entityManager->flush();
            $this->addFlash('success', 'Champion ajouté!');
            return $this->redirectToRoute('app_champion');
        }
        return $this->render('champion/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
