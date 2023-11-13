<?php

namespace App\Entity;

use App\Repository\CoachRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoachRepository::class)]
class Coach
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $annees_experience = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnneesExperience(): ?int
    {
        return $this->annees_experience;
    }

    public function setAnneesExperience(?int $annees_experience): static
    {
        $this->annees_experience = $annees_experience;

        return $this;
    }
}
