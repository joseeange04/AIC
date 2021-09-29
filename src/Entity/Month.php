<?php

namespace App\Entity;

use App\Repository\MonthRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MonthRepository::class)
 */
class Month
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $mois;

    /**
     * @ORM\OneToMany(targetEntity=Donnee::class, mappedBy="mois")
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

    public function getMois(): ?string
    {
        return $this->mois;
    }

    public function setMois(string $mois): self
    {
        $this->mois = $mois;

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
            $donnee->setMois($this);
        }

        return $this;
    }

    public function removeDonnee(Donnee $donnee): self
    {
        if ($this->donnees->removeElement($donnee)) {
            // set the owning side to null (unless already changed)
            if ($donnee->getMois() === $this) {
                $donnee->setMois(null);
            }
        }

        return $this;
    }
}
