<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private string $name;

    #[ORM\Column]
    private string $description;

    #[ORM\Column]
    private int $price;

    #[ORM\Column]
    private string $image;

    #[ORM\Column]
    private bool $isBotte;

    #[ORM\Column]
    private bool $isMythic;

    #[ORM\ManyToMany(targetEntity: GeneratedChampion::class, mappedBy: 'items')]
    private Collection $generatedChampions;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Item
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Item
    {
        $this->description = $description;
        return $this;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): Item
    {
        $this->price = $price;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): Item
    {
        $this->image = $image;
        return $this;
    }

    public function getIsBotte(): bool
    {
        return $this->isBotte;
    }

    public function setIsBotte(bool $isBotte): Item
    {
        $this->isBotte = $isBotte;
        return $this;
    }

    public function getIsMythic(): bool
    {
        return $this->isMythic;
    }

    public function setIsMythic(bool $isMythic): Item
    {
        $this->isMythic = $isMythic;
        return $this;
    }

    public function getGeneratedChampions(): Collection
    {
        return $this->generatedChampions;
    }

    public function setGeneratedChampions(Collection $generatedChampions): Item
    {
        $this->generatedChampions = $generatedChampions;
        return $this;
    }

}
