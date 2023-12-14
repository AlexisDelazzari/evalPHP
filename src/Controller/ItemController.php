<?php

namespace App\Controller;

use App\Entity\GeneratedChampion;
use App\Entity\Item;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
            $this->addFlash('danger', 'Impossible de supprimer cet item car il est utilisé dans des champions générés!');
            $this->redirectToRoute('app_item');
        }

        $entityManager->remove($item);
        $entityManager->flush();
        $this->addFlash('success', 'Item supprimé!');
        return $this->redirectToRoute('app_item');
    }
}
