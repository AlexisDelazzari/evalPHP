<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private string $texte;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'commentaires')]
    private User $user;

    #[ORM\ManyToOne(targetEntity: GeneratedChampion::class, inversedBy: 'commentaires')]
    private GeneratedChampion $generatedChampion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexte(): string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): Commentaire
    {
        $this->texte = $texte;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): Commentaire
    {
        $this->user = $user;
        return $this;
    }

    public function getGeneratedChampion(): GeneratedChampion
    {
        return $this->generatedChampion;
    }

    public function setGeneratedChampion(GeneratedChampion $generatedChampion): Commentaire
    {
        $this->generatedChampion = $generatedChampion;
        return $this;
    }
}
