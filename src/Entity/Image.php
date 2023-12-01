<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Le nom de l\'image ne peut pas être vide')]
    private string $name;

    #[ORM\Column]
    private string $description;

    #[ORM\OneToOne(mappedBy: 'image')]
    private Champion $champion;

    #[ORM\OneToOne(mappedBy: 'image')]
    private Summoner $summoner;

    #[ORM\OneToOne(mappedBy: 'image')]
    private SecondaryRune $secondaryRune;

    #[ORM\OneToOne(mappedBy: 'image')]
    private PrimaryRune $primaryRune;




    public function getId(): ?int
    {
        return $this->id;
    }
}
