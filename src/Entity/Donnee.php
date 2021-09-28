<?php

namespace App\Entity;

use App\Repository\DonneeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DonneeRepository::class)
 */
class Donnee
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $type;

    /**
     * @ORM\OneToOne(targetEntity=Region::class, mappedBy="donnee", cascade={"persist", "remove"})
     */
    private $region;

    /**
     * @ORM\OneToMany(targetEntity=PieceJointe::class, mappedBy="donnee")
     */
    private $pieceJointes;

    /**
     * @ORM\OneToOne(targetEntity=Temperature::class, inversedBy="donnee", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $temperature;

    /**
     * @ORM\OneToOne(targetEntity=Sol::class, inversedBy="donnee", cascade={"persist", "remove"})
     */
    private $sol;

    /**
     * @ORM\OneToOne(targetEntity=Precipitation::class, inversedBy="donnee", cascade={"persist", "remove"})
     */
    private $precipitation;

    public function __construct()
    {
        $this->pieceJointes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        // unset the owning side of the relation if necessary
        if ($region === null && $this->region !== null) {
            $this->region->setDonnee(null);
        }

        // set the owning side of the relation if necessary
        if ($region !== null && $region->getDonnee() !== $this) {
            $region->setDonnee($this);
        }

        $this->region = $region;

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
            $pieceJointe->setDonnee($this);
        }

        return $this;
    }

    public function removePieceJointe(PieceJointe $pieceJointe): self
    {
        if ($this->pieceJointes->removeElement($pieceJointe)) {
            // set the owning side to null (unless already changed)
            if ($pieceJointe->getDonnee() === $this) {
                $pieceJointe->setDonnee(null);
            }
        }

        return $this;
    }

    public function getTemperature(): ?Temperature
    {
        return $this->temperature;
    }

    public function setTemperature(Temperature $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getSol(): ?Sol
    {
        return $this->sol;
    }

    public function setSol(?Sol $sol): self
    {
        $this->sol = $sol;

        return $this;
    }

    public function getPrecipitation(): ?Precipitation
    {
        return $this->precipitation;
    }

    public function setPrecipitation(?Precipitation $precipitation): self
    {
        $this->precipitation = $precipitation;

        return $this;
    }
}
