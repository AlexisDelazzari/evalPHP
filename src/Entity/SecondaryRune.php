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
    private string $description;

    #[ORM\OneToOne]
    private Image $image;

    #[ORM\ManyToOne]
    private PrimaryRune $primaryRune;

    public function getId(): ?int
    {
        return $this->id;
    }
}
