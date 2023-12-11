<?php

namespace App\Entity;

use App\Repository\MessagerieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessagerieRepository::class)]
class Messagerie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id", type: "integer")]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contenu = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateMessage = null;

    #[ORM\ManyToOne(inversedBy: 'chatcoach')]
    private ?User $coach = null;
    #[ORM\ManyToOne(inversedBy: 'chatuser')]
    private ?User $user = null;
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }


    public function setContenu(?string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function setDateMessage(?\DateTimeInterface $dateMessage): void
    {
        $this->dateMessage = $dateMessage;
    }

    public function setCoach(?user $coach): void
    {
        $this->coach= $coach;
    }

    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function getDateMessage(): ?\DateTimeInterface
    {
        return $this->dateMessage;
    }

    public function getCoach(): ?user
    {
        return $this->user;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }
}

