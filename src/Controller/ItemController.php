<?php

namespace App\Controller;

use App\Entity\GeneratedChampion;
use App\Entity\Item;
use App\Form\ItemType;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends AbstractController
{
    #[Route('/item', name: 'app_item')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $items = $entityManager->getRepository(Item::class)->findAll();

        return $this->render('item/index.html.twig', [
            'items' => $items,
        ]);
    }

    #[Route('/item/delete/{id}', name: 'app_item_delete')]
    public function delete(EntityManagerInterface $entityManager, int $id): Response
    {
        $item = $entityManager->getRepository(Item::class)->find($id);
        $generatedChampionsItems = $entityManager->getRepository(GeneratedChampion::class)->findGeneratedChampionWithItem($id);

        if ($generatedChampionsItems) {
            $this->addFlash('error', 'Impossible de supprimer cet item car il est utilisé dans des champions générés!');
            return $this->redirectToRoute('app_item');
        }

        $entityManager->remove($item);
        $entityManager->flush();
        $this->addFlash('success', 'Item supprimé!');
        return $this->redirectToRoute('app_item');
    }

    #[Route('/item/add', name: 'app_item_add')]
    public function add(EntityManagerInterface $entityManager, Request $request): Response
    {
        $item = new Item();
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($item);
            $entityManager->flush();
            $this->addFlash('success', 'Item ajouté!');
            return $this->redirectToRoute('app_item');
        }

        return $this->render('item/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
