<?php

namespace App\Entity;

use App\Repository\SummonerRepository;
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

    #[ORM\OneToOne(inversedBy: 'summoner')]
    private Image $image;

    public function getId(): ?int
    {
        return $this->id;
    }
}
