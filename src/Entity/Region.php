<?php

namespace App\Entity;

use App\Repository\RegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegionRepository::class)
 */
class Region
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $population;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="region", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=Donnee::class, inversedBy="region", cascade={"persist", "remove"})
     */
    private $donnee;

    /**
     * @ORM\ManyToMany(targetEntity=Culture::class, mappedBy="regions")
     */
    private $cultures;

    public function __construct()
    {
        $this->cultures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPopulation(): ?int
    {
        return $this->population;
    }

    public function setPopulation(?int $population): self
    {
        $this->population = $population;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        // set the owning side of the relation if necessary
        if ($user->getRegion() !== $this) {
            $user->setRegion($this);
        }

        $this->user = $user;

        return $this;
    }

    public function getDonnee(): ?Donnee
    {
        return $this->donnee;
    }

    public function setDonnee(?Donnee $donnee): self
    {
        $this->donnee = $donnee;

        return $this;
    }

    /**
     * @return Collection|Culture[]
     */
    public function getCultures(): Collection
    {
        return $this->cultures;
    }

    public function addCulture(Culture $culture): self
    {
        if (!$this->cultures->contains($culture)) {
            $this->cultures[] = $culture;
            $culture->addRegion($this);
        }

        return $this;
    }

    public function removeCulture(Culture $culture): self
    {
        if ($this->cultures->removeElement($culture)) {
            $culture->removeRegion($this);
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->nom; 
    }

}
