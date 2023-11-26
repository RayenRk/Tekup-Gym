<?php

namespace App\Entity;

use App\Repository\AdherantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdherantRepository::class)]
class Adherant extends User
{

    #[ORM\OneToMany(mappedBy: 'adherant', targetEntity: Abonnement::class)]
    private Collection $abonnement;

    #[ORM\OneToMany(mappedBy: 'adherant', targetEntity: Messagerie::class)]
    private Collection $messageries;

    #[ORM\OneToMany(mappedBy: 'adherant', targetEntity: User::class)]
    private Collection $useradh;

    public function __construct()
    {
        $this->abonnement = new ArrayCollection();
        $this->messageries = new ArrayCollection();
        $this->useradh = new ArrayCollection();
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
            $abonnement->setAdherant($this);
        }

        return $this;
    }

    public function removeAbonnement(Abonnement $abonnement): static
    {
        if ($this->abonnement->removeElement($abonnement)) {
            // set the owning side to null (unless already changed)
            if ($abonnement->getAdherant() === $this) {
                $abonnement->setAdherant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Messagerie>
     */
    public function getMessageries(): Collection
    {
        return $this->messageries;
    }

    public function addMessagery(Messagerie $messagery): static
    {
        if (!$this->messageries->contains($messagery)) {
            $this->messageries->add($messagery);
            $messagery->setAdherant($this);
        }

        return $this;
    }

    public function removeMessagery(Messagerie $messagery): static
    {
        if ($this->messageries->removeElement($messagery)) {
            // set the owning side to null (unless already changed)
            if ($messagery->getAdherant() === $this) {
                $messagery->setAdherant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUseradh(): Collection
    {
        return $this->useradh;
    }

    public function addUseradh(User $useradh): static
    {
        if (!$this->useradh->contains($useradh)) {
            $this->useradh->add($useradh);
            $useradh->setAdherant($this);
        }

        return $this;
    }

    public function removeUseradh(User $useradh): static
    {
        if ($this->useradh->removeElement($useradh)) {
            // set the owning side to null (unless already changed)
            if ($useradh->getAdherant() === $this) {
                $useradh->setAdherant(null);
            }
        }

        return $this;
    }
}
