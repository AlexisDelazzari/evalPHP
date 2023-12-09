<?php

namespace App\Controller;

use App\Entity\PrimaryRune;
use App\Entity\SecondaryRune;
use App\Form\PrimaryRuneType;
use App\Form\SecondaryRuneType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PrimaryRuneController extends AbstractController
{
    #[Route('/primary/rune', name: 'app_primary_rune')]
    public function index(): Response
    {
        return $this->render('primary_rune/index.html.twig', [
            'controller_name' => 'PrimaryRuneController',
        ]);
    }
    //app_primary_update avec id en parametre get et en post name description image color en post

    #[Route('/primary/rune/update/template/{id}', name: 'app_primary_rune_update', methods: ['GET', 'POST'])]
    public function update(int $id, EntityManagerInterface $entityManager,Request $request): Response
    {
        $primaryRune = $entityManager->getRepository(PrimaryRune::class)->find($id);
        $form = $this->createForm(PrimaryRuneType::class, $primaryRune);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $primaryRune = $form->getData();
            $entityManager->persist($primaryRune);
            $entityManager->flush();
            $this->addFlash('success', 'Rune modifiée!');
            return $this->redirectToRoute('app_secondary_rune');
        }

        return $this->render('primary_rune/update.html.twig', [
            'form' => $form->createView(),
            'primaryRune' => $primaryRune,
        ]);
    }

    #[Route('/primary/rune/create', name: 'app_primary_rune_create', methods: ['GET', 'POST'])]
    public function create(EntityManagerInterface $entityManager,Request $request): Response
    {
        $primaryRune = new PrimaryRune();
        $form = $this->createForm(PrimaryRuneType::class, $primaryRune);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $primaryRune = $form->getData();
            $entityManager->persist($primaryRune);
            $entityManager->flush();
            $this->addFlash('success', 'Rune créée!');
            return $this->redirectToRoute('app_secondary_rune');
        }

        return $this->render('primary_rune/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/primary/rune/delete/{id}', name: 'app_primary_rune_delete', methods: ['GET', 'POST'])]
    public function delete(int $id, EntityManagerInterface $entityManager): Response
    {
        $primaryRune = $entityManager->getRepository(PrimaryRune::class)->find($id);
        $secondaryRune = $entityManager->getRepository(SecondaryRune::class)->findOneBy(['primaryRune' => $primaryRune]);

        if($secondaryRune){
            $this->addFlash('danger', 'Rune utilisée dans une page de runes secondaires!');
            return $this->redirectToRoute('app_secondary_rune');
        }

        $entityManager->remove($primaryRune);
        $entityManager->flush();
        $this->addFlash('success', 'Rune supprimée!');
        return $this->redirectToRoute('app_secondary_rune');
    }

}
