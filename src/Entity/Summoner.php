<?php

namespace App\Entity;

use App\Repository\SummonerRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SummonerRepository::class)]
class Summoner
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

    #[ORM\OneTOMany(mappedBy: 'summoner1', targetEntity: GeneratedChampion::class)]
    private GeneratedChampion $generatedChampion1;

    #[ORM\OneTOMany(mappedBy: 'summoner2', targetEntity: GeneratedChampion::class)]
    private GeneratedChampion $generatedChampion2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): Summoner
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Summoner
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Summoner
    {
        $this->description = $description;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): Summoner
    {
        $this->image = $image;
        return $this;
    }

    public function getGeneratedChampion1(): GeneratedChampion
    {
        return $this->generatedChampion1;
    }

    public function getGeneratedChampion2(): GeneratedChampion
    {
        return $this->generatedChampion2;
    }

    public function setGeneratedChampion1(GeneratedChampion $generatedChampion1): Summoner
    {
        $this->generatedChampion1 = $generatedChampion1;
        return $this;
    }

    public function setGeneratedChampion2(GeneratedChampion $generatedChampion2): Summoner
    {
        $this->generatedChampion2 = $generatedChampion2;
        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
