<?php

namespace App\Entity;

use App\Repository\YearRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=YearRepository::class)
 */
class Year
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee;

    /**
     * @ORM\OneToMany(targetEntity=Donnee::class, mappedBy="annee")
     */
    private $donnees;

    public function __construct()
    {
        $this->donnees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * @return Collection|Donnee[]
     */
    public function getDonnees(): Collection
    {
        return $this->donnees;
    }

    public function addDonnee(Donnee $donnee): self
    {
        if (!$this->donnees->contains($donnee)) {
            $this->donnees[] = $donnee;
            $donnee->setAnnee($this);
        }

        return $this;
    }

    public function removeDonnee(Donnee $donnee): self
    {
        if ($this->donnees->removeElement($donnee)) {
            // set the owning side to null (unless already changed)
            if ($donnee->getAnnee() === $this) {
                $donnee->setAnnee(null);
            }
        }

        return $this;
    }
}
