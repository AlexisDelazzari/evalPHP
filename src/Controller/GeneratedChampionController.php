<?php

namespace App\Controller;

use App\Entity\GeneratedChampion;
use App\Entity\Item;
use App\Entity\RandomName;
use App\Entity\User;
use App\Form\GeneratedChampionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Enum\GeneratedChampionStatus;

class GeneratedChampionController extends AbstractController
{
    #[Route('/generated/champion', name: 'app_generated_champion')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $generatedChampions = $entityManager->getRepository(GeneratedChampion::class)->findAll();
        return $this->render('generated_champion/index.html.twig', [
            'generatedChampions' => $generatedChampions,
        ]);
    }

    #[Route('/generated/champion/user/{id}', name: 'app_generated_champion_user')]
    public function showChampionByUser(EntityManagerInterface $entityManager, int $id): Response
    {
        $generatedChampions = $entityManager->getRepository(GeneratedChampion::class)->findBy(['user' => $id], ['id' => 'DESC']);
        return $this->render('generated_champion/index.html.twig', [
            'generatedChampions' => $generatedChampions,
        ]);
    }

    #[Route('/generated/champion/add', name: 'app_generated_champion_add')]
    public function add(EntityManagerInterface $entityManager, Request $request): Response
    {
        $generatedChampion = new GeneratedChampion();
        $items = $entityManager->getRepository(Item::class)->findAll();

        $form = $this->createForm(GeneratedChampionType::class, $generatedChampion);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dd($generatedChampion);
            $randomName = 'Champion ' . rand(0, 100000);
            $randomNameEntity = new RandomName();
            $randomNameEntity->setName($randomName);
            $entityManager->persist($randomNameEntity);
            $entityManager->flush();
            $generatedChampion->setRandomName($randomNameEntity);
            $entityManager->persist($generatedChampion);
            $entityManager->flush();
            $this->addFlash('success', 'Generated champion created');
            return $this->redirectToRoute('app_generated_champion');
        }
        return $this->render('generated_champion/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
