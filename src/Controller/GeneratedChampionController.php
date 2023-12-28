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
        $items = [
            'bottes' => $entityManager->getRepository(Item::class)->findBy(['isBotte' => true]),
            'mythiques' => $entityManager->getRepository(Item::class)->findBy(['isMythic' => true]),
            'legendaires' => $entityManager->getRepository(Item::class)->findBy(['isMythic' => false, 'isBotte' => false]),
        ];
        $form = $this->createForm(GeneratedChampionType::class, $generatedChampion, [
            'items' => $items,
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $randomName = 'Champion ' . rand(0, 100000);
            $randomNameEntity = new RandomName();
            $randomNameEntity->setName($randomName);
            $entityManager->persist($randomNameEntity);
            $entityManager->flush();

            $generatedChampion->setStatus($form->get('status')->getData());
            $generatedChampion->setUser($form->get('user')->getData());
            $generatedChampion->setChampion($form->get('champion')->getData());
            $generatedChampion->setSummoner1($form->get('summoner1')->getData());
            $generatedChampion->setSummoner2($form->get('summoner2')->getData());
            $generatedChampion->setSecondaryRune1($form->get('secondaryRune1')->getData());
            $generatedChampion->setSecondaryRune2($form->get('secondaryRune2')->getData());
            $generatedChampion->setItems($form->get('items')->getData());
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
