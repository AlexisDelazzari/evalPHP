<?php

namespace App\Entity;

use App\Repository\PrimaryRuneRepository;
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

    #[ORM\OneToOne(inversedBy: 'primaryRune')]
    private Image $image;

    #[ORM\OneToMany(mappedBy: 'primaryRune',targetEntity: SecondaryRune::class)]
    private array $secondaryRunes;

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

    public function getImage(): Image
    {
        return $this->image;
    }

    public function setImage(Image $image): PrimaryRune
    {
        $this->image = $image;
        return $this;
    }

    public function getSecondaryRunes(): array
    {
        return $this->secondaryRunes;
    }

    public function setSecondaryRunes(array $secondaryRunes): PrimaryRune
    {
        $this->secondaryRunes = $secondaryRunes;
        return $this;
    }
}
