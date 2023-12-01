<?php

namespace App\Entity;

use App\Repository\GeneratedChampionRepository;
use Doctrine\Common\Annotations\Annotation\Enum;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Collection;

#[ORM\Entity(repositoryClass: GeneratedChampionRepository::class)]
class GeneratedChampion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private Enum $status;

    #[ORM\ManyToOne(inversedBy: 'generatedChampions')]
    private Champion $champion;

    #[ORM\ManyToOne(inversedBy: 'generatedChampions')]
    private Summoner $summoner1;

    #[ORM\ManyToOne(inversedBy: 'generatedChampions')]
    private Summoner $summoner2;

    #[ORM\ManyToOne(inversedBy: 'generatedChampions')]
    private SecondaryRune $secondaryRune1;

    #[ORM\ManyToOne(inversedBy: 'generatedChampions')]
    private SecondaryRune $secondaryRune2;

    #[ORM\ManyToMany(inversedBy: 'generatedChampions',targetEntity: Item::class)]
    #[ORM\JoinTable(name: 'generated_champion_item')]
    private array $items;

    #[ORM\OneToOne(inversedBy: 'generatedChampion')]
    private User $user;

    #[ORM\OneToMany(mappedBy: 'generatedChampion',targetEntity: Commentaire::class)]
    private array $commentaires;


    public function getStatus(): Enum
    {
        return $this->status;
    }

    public function setStatus(Enum $status): GeneratedChampion
    {
        $this->status = $status;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChampion(): Champion
    {
        return $this->champion;
    }

    public function setChampion(Champion $champion): GeneratedChampion
    {
        $this->champion = $champion;
        return $this;
    }

    public function getSummoner1(): Summoner
    {
        return $this->summoner1;
    }

    public function setSummoner1(Summoner $summoner1): GeneratedChampion
    {
        $this->summoner1 = $summoner1;
        return $this;
    }

    public function getSummoner2(): Summoner
    {
        return $this->summoner2;
    }

    public function setSummoner2(Summoner $summoner2): GeneratedChampion
    {
        $this->summoner2 = $summoner2;
        return $this;
    }

    public function getSecondaryRune1(): SecondaryRune
    {
        return $this->secondaryRune1;
    }

    public function setSecondaryRune1(SecondaryRune $secondaryRune1): GeneratedChampion
    {
        $this->secondaryRune1 = $secondaryRune1;
        return $this;
    }

    public function getSecondaryRune2(): SecondaryRune
    {
        return $this->secondaryRune2;
    }

    public function setSecondaryRune2(SecondaryRune $secondaryRune2): GeneratedChampion
    {
        $this->secondaryRune2 = $secondaryRune2;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): GeneratedChampion
    {
        $this->user = $user;
        return $this;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): GeneratedChampion
    {
        $this->items = $items;
        return $this;
    }

    public function getCommentaires(): array
    {
        return $this->commentaires;
    }

    public function setCommentaires(array $commentaires): GeneratedChampion
    {
        $this->commentaires = $commentaires;
        return $this;
    }
}
