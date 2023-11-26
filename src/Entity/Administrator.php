<?php

namespace App\Entity;

use App\Repository\AdministratorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdministratorRepository::class)]
class Administrator extends User
{
    #[ORM\OneToMany(mappedBy: 'administrator', targetEntity: User::class)]
    private Collection $useradm;

    public function __construct()
    {
        $this->useradm = new ArrayCollection();
    }

    /**
     * @return Collection<int, User>
     */
    public function getUseradm(): Collection
    {
        return $this->useradm;
    }

    public function addUseradm(User $useradm): static
    {
        if (!$this->useradm->contains($useradm)) {
            $this->useradm->add($useradm);
            $useradm->setAdministrator($this);
        }

        return $this;
    }

    public function removeUseradm(User $useradm): static
    {
        if ($this->useradm->removeElement($useradm)) {
            // set the owning side to null (unless already changed)
            if ($useradm->getAdministrator() === $this) {
                $useradm->setAdministrator(null);
            }
        }

        return $this;
    }
}
