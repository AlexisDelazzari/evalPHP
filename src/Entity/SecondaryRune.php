<?php

namespace App\Entity;

use App\Repository\SecondaryRuneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SecondaryRuneRepository::class)]
class SecondaryRune
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private string $name;

    #[ORM\Column]
    private string $image;

    #[ORM\ManyToOne(targetEntity: PrimaryRune::class, inversedBy: 'secondaryRunes')]
    private PrimaryRune $primaryRune;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): SecondaryRune
    {
        $this->name = $name;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): SecondaryRune
    {
        $this->image = $image;
        return $this;
    }

    public function getPrimaryRune(): PrimaryRune
    {
        return $this->primaryRune;
    }

    public function setPrimaryRune(PrimaryRune $primaryRune): SecondaryRune
    {
        $this->primaryRune = $primaryRune;
        return $this;
    }
}
