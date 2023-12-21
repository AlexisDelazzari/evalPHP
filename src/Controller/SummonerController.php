<?php

namespace App\Controller;

use App\Entity\Champion;
use App\Entity\GeneratedChampion;
use App\Entity\Summoner;
use App\Form\ChampionType;
use App\Form\SummonerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SummonerController extends AbstractController
{
    #[Route('/summoner', name: 'app_summoner')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $summoners = $entityManager->getRepository(Summoner::class)->findAll();
        return $this->render('summoner/index.html.twig', [
            'summoners' => $summoners,
        ]);
    }
    #[Route('/summoner/delete/{id}', name: 'app_summoner_delete')]
    public function delete(EntityManagerInterface $entityManager, int $id): Response
    {
        $summoner = $entityManager->getRepository(Summoner::class)->find($id);
        $generatedChampions = $entityManager->getRepository(GeneratedChampion::class)->findGeneratedChampionWithSummoner($id);
        if ($generatedChampions) {
            $this->addFlash('error', "Impossible de supprimer le sort d'invocateur car il est utilisé par un champion.");
            return $this->redirectToRoute('app_summoner');
        }
        $entityManager->remove($summoner);
        $entityManager->flush();
        $this->addFlash('success', "Le sort d'invocateur a été supprimé avec succès.");
        return $this->redirectToRoute('app_summoner');
    }

    #[Route('/summoner/add', name: 'app_summoner_add', methods: ['GET', 'POST'])]
    public function add(EntityManagerInterface $entityManager, Request $request): Response
    {
        $summoner = new Summoner();
        $form = $this->createForm(SummonerType::class, $summoner);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($summoner);
            $entityManager->flush();
            $this->addFlash('success', 'Summoner ajouté!');
            return $this->redirectToRoute('app_summoner');
        }
        return $this->render('summoner/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}
