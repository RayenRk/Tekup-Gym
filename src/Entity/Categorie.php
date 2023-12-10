<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $nom_categorie = null;

    //#[ORM\ManyToMany(targetEntity: Abonnement::class, inversedBy: 'categories')]
    //private Collection $abonnement;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Coach::class)]
    private Collection $coaches;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Abonnement::class)]
    private Collection $abonn;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Abonnement::class)]
    private Collection $abonnements;

    public function __construct()
    {
        $this->abonnement = new ArrayCollection();
        $this->coaches = new ArrayCollection();
        $this->abonn = new ArrayCollection();
        $this->abonnements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorie(): ?string
    {
        return $this->nom_categorie;
    }

    public function setNomCategorie(?string $nom_categorie): static
    {
        $this->nom_categorie = $nom_categorie;

        return $this;
    }

    /**
     * @return Collection<int, Abonnement>
     */
    public function getAbonnement(): Collection
    {
        return $this->abonnement;
    }

    public function addAbonnement(Abonnement $abonnement): static
    {
        if (!$this->abonnement->contains($abonnement)) {
            $this->abonnement->add($abonnement);
        }

        return $this;
    }

    public function removeAbonnement(Abonnement $abonnement): static
    {
        $this->abonnement->removeElement($abonnement);

        return $this;
    }

    /**
     * @return Collection<int, Coach>
     */
    public function getCoaches(): Collection
    {
        return $this->coaches;
    }

    public function addCoach(Coach $coach): static
    {
        if (!$this->coaches->contains($coach)) {
            $this->coaches->add($coach);
            $coach->setCategorie($this);
        }

        return $this;
    }

    public function removeCoach(Coach $coach): static
    {
        if ($this->coaches->removeElement($coach)) {
            // set the owning side to null (unless already changed)
            if ($coach->getCategorie() === $this) {
                $coach->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Abonnement>
     */
    public function getAbonn(): Collection
    {
        return $this->abonn;
    }

    public function addAbonn(Abonnement $abonn): static
    {
        if (!$this->abonn->contains($abonn)) {
            $this->abonn->add($abonn);
            $abonn->setCategorie($this);
        }

        return $this;
    }

    public function removeAbonn(Abonnement $abonn): static
    {
        if ($this->abonn->removeElement($abonn)) {
            // set the owning side to null (unless already changed)
            if ($abonn->getCategorie() === $this) {
                $abonn->setCategorie(null);
            }
        }

        return $this;
    }

    public function __toString():string
    {
        return $this->getNomCategorie();
    }

    /**
     * @return Collection<int, Abonnement>
     */
    public function getAbonnements(): Collection
    {
        return $this->abonnements;
    }
}
