<?php

namespace App\Entity;

use App\Repository\PrimaryRuneRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrimaryRuneRepository::class)]
class PrimaryRune
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

    #[ORM\Column]
    private string $color;

    #[ORM\OneToMany(mappedBy: 'primaryRune',targetEntity: SecondaryRune::class)]
    private Collection $secondaryRunes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): PrimaryRune
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): PrimaryRune
    {
        $this->description = $description;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): PrimaryRune
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return Collection|SecondaryRune[]
     */
    public function getSecondaryRunes(): Collection
    {
        return $this->secondaryRunes;
    }

    public function addSecondaryRune(SecondaryRune $secondaryRune): PrimaryRune
    {
        $this->secondaryRunes[] = $secondaryRune;
        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): PrimaryRune
    {
        $this->color = $color;
        return $this;
    }
}
