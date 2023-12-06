<?php

namespace App\Entity;

use App\Repository\RandomNameRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RandomNameRepository::class)]
class RandomName
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private string $name;

    //relation retour de generatedChampion
    #[ORM\OneToOne(mappedBy: 'randomName',targetEntity: GeneratedChampion::class)]
    private GeneratedChampion $generatedChampion;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): RandomName
    {
        $this->name = $name;
        return $this;
    }

    public function getGeneratedChampion(): GeneratedChampion
    {
        return $this->generatedChampion;
    }

    public function setGeneratedChampion(GeneratedChampion $generatedChampion): RandomName
    {
        $this->generatedChampion = $generatedChampion;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
