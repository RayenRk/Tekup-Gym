<?php

namespace App\Entity;

use App\Repository\ImcRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImcRepository::class)]
class Imc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $Weight = null;

    #[ORM\Column]
    private ?float $height = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeight(): ?float
    {
        return $this->Weight;
    }

    public function setWeight(float $Weight): static
    {
        $this->Weight = $Weight;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(float $height): static
    {
        $this->height = $height;

        return $this;
    }
}
