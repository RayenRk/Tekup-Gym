<?php

namespace App\Entity;

use App\Repository\CoachRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoachRepository::class)]
#[ORM\Table(name: "Coach")]
class Coach extends User
{
    #[ORM\Column(nullable: true)]
    private ?int $annee_experience = null;


    #[ORM\ManyToOne(inversedBy: 'coaches')]
    private ?Categorie $categorie = null;

    #[ORM\OneToMany(mappedBy: 'coach', targetEntity: User::class)]
    private Collection $usercoh;

    public function __construct()
    {
        $this->messageries = new ArrayCollection();
        $this->usercoh = new ArrayCollection();
    }

    public function getAnneeExperience(): ?int
    {
        return $this->annee_experience;
    }

    public function setAnneeExperience(?int $annee_experience): static
    {
        $this->annee_experience = $annee_experience;

        return $this;
    }

    /**
     * @return Collection<int, Messagerie>
     */
    public function getMessageries(): Collection
    {
        return $this->messageries;
    }


    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsercoh(): Collection
    {
        return $this->usercoh;
    }

    public function addUsercoh(User $usercoh): static
    {
        if (!$this->usercoh->contains($usercoh)) {
            $this->usercoh->add($usercoh);
            $usercoh->setCoach($this);
        }

        return $this;
    }

    public function removeUsercoh(User $usercoh): static
    {
        if ($this->usercoh->removeElement($usercoh)) {
            // set the owning side to null (unless already changed)
            if ($usercoh->getCoach() === $this) {
                $usercoh->setCoach(null);
            }
        }

        return $this;
    }


}