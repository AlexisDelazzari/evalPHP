<?php

namespace App\Entity;

use App\Repository\ChampionRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChampionRepository::class)]
class Champion
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
    private string $image;

    #[ORM\OneToMany(mappedBy: 'champion',targetEntity: GeneratedChampion::class)]
    private Collection $generatedChampions;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Champion
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Champion
    {
        $this->description = $description;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): Champion
    {
        $this->image = $image;
        return $this;
    }

    public function getGeneratedChampions(): Collection
    {
        return $this->generatedChampions;
    }

    public function setGeneratedChampions(Collection $generatedChampions): Champion
    {
        $this->generatedChampions = $generatedChampions;
        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
