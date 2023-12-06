<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private string $username;

    #[ORM\Column]
    private string $password;

    #[ORM\Column]
    private string $email;

    #[ORM\Column]
    private String $isAdmin;

    #[ORM\OneToMany(mappedBy: 'user',targetEntity: GeneratedChampion::class)]
    private array $generatedChampions;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getIsAdmin(): String
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(String $isAdmin): User
    {
        $this->isAdmin = $isAdmin;
        return $this;
    }

    public function getGeneratedChampions(): array
    {
        return $this->generatedChampions;
    }

    public function setGeneratedChampions(array $generatedChampions): User
    {
        $this->generatedChampions = $generatedChampions;
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = ['ROLE_USER'];
        if ($this->isAdmin == '1') {
            $roles[] = 'ROLE_ADMIN';
        }
        return $roles;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return $this->username;
    }
}
