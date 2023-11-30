<?php

namespace App\Entity;

use App\Repository\UserRepository;
use App\Repository\UserSECURITYRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserSECURITYRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]

class User implements UserInterface, PasswordAuthenticatedUserInterface
{


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: false)]
    protected ?string $nom = null;

    #[ORM\Column(length: 100, nullable: true)]
    protected ?string $prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    protected ?\DateTimeInterface $date_naissance = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    protected ?string $cin = null;

    #[ORM\Column(length: 100, nullable: true)]
    protected ?string $email = null;

    #[ORM\Column(length: 100, nullable: true)]
    protected ?string $password = null;
    
     #[ORM\Column(type:"json")]

    private array $roles = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(?\DateTimeInterface $date_naissance): void
    {
        $this->date_naissance = $date_naissance;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(?string $cin): void
    {
        $this->cin = $cin;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @param int|null $id
     * @param string|null $nom
     * @param string|null $prenom
     * @param \DateTimeInterface|null $date_naissance
     * @param string|null $cin
     * @param string|null $email
     * @param string|null $password
     * @param array $roles
     */
    public function __construct()
    {

    }


    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    // You may need to implement other required methods like `getSalt` and `equals`.




    public function getAdherant(): ?Adherant
    {
        return $this->adherant;
    }

    public function setAdherant(?Adherant $adherant): static
    {
        $this->adherant = $adherant;

        return $this;
    }

    public function getCoach(): ?Coach
    {
        return $this->coach;
    }

    public function setCoach(?Coach $coach): static
    {
        $this->coach = $coach;

        return $this;
    }

    public function getAdministrator(): ?Administrator
    {
        return $this->administrator;
    }

    public function setAdministrator(?Administrator $administrator): static
    {
        $this->administrator = $administrator;

        return $this;
    }
}
