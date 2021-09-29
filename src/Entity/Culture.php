<?php

namespace App\Entity;

use App\Repository\CultureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CultureRepository::class)
 */
class Culture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=PieceJointe::class, mappedBy="culture")
     */
    private $pieceJointes;

    /**
     * @ORM\ManyToMany(targetEntity=Region::class, inversedBy="cultures")
     */
    private $regions;

    /**
     * @ORM\OneToMany(targetEntity=Calendrier::class, mappedBy="culture")
     */
    private $calendrier;

    /**
     * @ORM\OneToOne(targetEntity=Plantation::class, mappedBy="culture", cascade={"persist", "remove"})
     */
    private $plantation;

    /**
     * @ORM\OneToOne(targetEntity=Floraison::class, mappedBy="culture", cascade={"persist", "remove"})
     */
    private $floraison;

    /**
     * @ORM\OneToOne(targetEntity=Recolte::class, mappedBy="culture", cascade={"persist", "remove"})
     */
    private $recolte;

    /**
     * @ORM\ManyToOne(targetEntity=Concerner::class, inversedBy="culture")
     */

    public function __construct()
    {
        $this->pieceJointes = new ArrayCollection();
        $this->regions = new ArrayCollection();
        $this->calendrier = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|PieceJointe[]
     */
    public function getPieceJointes(): Collection
    {
        return $this->pieceJointes;
    }

    public function addPieceJointe(PieceJointe $pieceJointe): self
    {
        if (!$this->pieceJointes->contains($pieceJointe)) {
            $this->pieceJointes[] = $pieceJointe;
            $pieceJointe->setCulture($this);
        }

        return $this;
    }

    public function removePieceJointe(PieceJointe $pieceJointe): self
    {
        if ($this->pieceJointes->removeElement($pieceJointe)) {
            // set the owning side to null (unless already changed)
            if ($pieceJointe->getCulture() === $this) {
                $pieceJointe->setCulture(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Region[]
     */
    public function getRegions(): Collection
    {
        return $this->regions;
    }

    public function addRegion(Region $region): self
    {
        if (!$this->regions->contains($region)) {
            $this->regions[] = $region;
        }

        return $this;
    }

    public function removeRegion(Region $region): self
    {
        $this->regions->removeElement($region);

        return $this;
    }

    /**
     * @return Collection|Calendrier[]
     */
    public function getCalendrier(): Collection
    {
        return $this->calendrier;
    }

    public function addCalendrier(Calendrier $calendrier): self
    {
        if (!$this->calendrier->contains($calendrier)) {
            $this->calendrier[] = $calendrier;
            $calendrier->setCulture($this);
        }

        return $this;
    }

    public function removeCalendrier(Calendrier $calendrier): self
    {
        if ($this->calendrier->removeElement($calendrier)) {
            // set the owning side to null (unless already changed)
            if ($calendrier->getCulture() === $this) {
                $calendrier->setCulture(null);
            }
        }

        return $this;
    }

    public function getPlantation(): ?Plantation
    {
        return $this->plantation;
    }

    public function setPlantation(Plantation $plantation): self
    {
        // set the owning side of the relation if necessary
        if ($plantation->getCulture() !== $this) {
            $plantation->setCulture($this);
        }

        $this->plantation = $plantation;

        return $this;
    }

    public function getFloraison(): ?Floraison
    {
        return $this->floraison;
    }

    public function setFloraison(Floraison $floraison): self
    {
        // set the owning side of the relation if necessary
        if ($floraison->getCulture() !== $this) {
            $floraison->setCulture($this);
        }

        $this->floraison = $floraison;

        return $this;
    }

    public function getRecolte(): ?Recolte
    {
        return $this->recolte;
    }

    public function setRecolte(Recolte $recolte): self
    {
        // set the owning side of the relation if necessary
        if ($recolte->getCulture() !== $this) {
            $recolte->setCulture($this);
        }

        $this->recolte = $recolte;

        return $this;
    }

}
