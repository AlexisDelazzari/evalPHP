<?php

namespace App\Controller;


use App\Entity\GeneratedChampion;
use App\Form\SecondaryRuneType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\SecondaryRune;
use App\Entity\PrimaryRune;

class SecondaryRuneController extends AbstractController
{
    #[Route('/secondary/rune', name: 'app_secondary_rune')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $secondaryRunes = $entityManager->getRepository(SecondaryRune::class)->findAllWithPrimaryRune();
        $primaryRunes = $entityManager->getRepository(PrimaryRune::class)->findAll();

        return $this->render('secondary_rune/index.html.twig', [
            'secondaryRunes' => $secondaryRunes,
            'primaryRunes' => $primaryRunes
        ]);

    }

    #[Route('/secondary/rune/create/{id}', name: 'app_secondary_rune_create', methods: ['GET', 'POST'])]
    public function createWithPrimaryRune(int $id, EntityManagerInterface $entityManager,Request $request): Response
    {
        $primaryRune = $entityManager->getRepository(PrimaryRune::class)->find($id);
        $secondaryRune = new SecondaryRune();
        $secondaryRune->setPrimaryRune($primaryRune);

        $form = $this->createForm(SecondaryRuneType::class, $secondaryRune);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $secondaryRune = $form->getData();

            $secondaryRune->setPrimaryRune($primaryRune);
            $entityManager->persist($secondaryRune);
            $entityManager->flush();
            $this->addFlash('success', 'Rune créée!');
            return $this->redirectToRoute('app_secondary_rune');
        }

        return $this->render('secondary_rune/create.html.twig', [
            'form' => $form->createView(),
            'primaryRune' => $primaryRune,
        ]);
    }


    #[Route('/secondary/rune/delete/{id}', name: 'app_secondary_rune_delete')]
    public function delete(int $id, EntityManagerInterface $entityManager): Response
    {
        $generatedChampions = $entityManager->getRepository(GeneratedChampion::class)->findGeneratedChampionWithSecondaryRune($id);
        if ($generatedChampions) {
            $this->addFlash('error', 'Impossible de supprimer cette rune, elle est utilisée par un champion généré');
            return $this->redirectToRoute('app_secondary_rune');
        }

        $secondaryRune = $entityManager->getRepository(SecondaryRune::class)->find($id);
        $entityManager->remove($secondaryRune);
        $entityManager->flush();
        $this->addFlash('success', 'Rune supprimée!');
        return $this->redirectToRoute('app_secondary_rune');
    }
}
