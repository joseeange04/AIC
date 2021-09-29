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
     * @ORM\OneToMany(targetEntity=Temperature::class, mappedBy="donnee")
     */
    private $temperature;

    /**
     * @ORM\OneToMany(targetEntity=Precipitation::class, mappedBy="donnee")
     */
    private $precipitation;

    /**
     * @ORM\OneToMany(targetEntity=Sol::class, mappedBy="donnee")
     */
    private $sol;

    /**
     * @ORM\ManyToOne(targetEntity=Month::class, inversedBy="donnees")
     */
    private $mois;

    /**
     * @ORM\ManyToOne(targetEntity=Year::class, inversedBy="donnees")
     */
    private $annee;


    public function __construct()
    {
        $this->pieceJointes = new ArrayCollection();
        $this->temperature = new ArrayCollection();
        $this->precipitation = new ArrayCollection();
        $this->sol = new ArrayCollection();
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

    public function addTemperature(Temperature $temperature): self
    {
        if (!$this->temperature->contains($temperature)) {
            $this->temperature[] = $temperature;
            $temperature->setDonnee($this);
        }

        return $this;
    }

    public function removeTemperature(Temperature $temperature): self
    {
        if ($this->temperature->removeElement($temperature)) {
            // set the owning side to null (unless already changed)
            if ($temperature->getDonnee() === $this) {
                $temperature->setDonnee(null);
            }
        }

        return $this;
    }

    public function addPrecipitation(Precipitation $precipitation): self
    {
        if (!$this->precipitation->contains($precipitation)) {
            $this->precipitation[] = $precipitation;
            $precipitation->setDonnee($this);
        }

        return $this;
    }

    public function removePrecipitation(Precipitation $precipitation): self
    {
        if ($this->precipitation->removeElement($precipitation)) {
            // set the owning side to null (unless already changed)
            if ($precipitation->getDonnee() === $this) {
                $precipitation->setDonnee(null);
            }
        }

        return $this;
    }

    public function addSol(Sol $sol): self
    {
        if (!$this->sol->contains($sol)) {
            $this->sol[] = $sol;
            $sol->setDonnee($this);
        }

        return $this;
    }

    public function removeSol(Sol $sol): self
    {
        if ($this->sol->removeElement($sol)) {
            // set the owning side to null (unless already changed)
            if ($sol->getDonnee() === $this) {
                $sol->setDonnee(null);
            }
        }

        return $this;
    }

    public function getMois(): ?Month
    {
        return $this->mois;
    }

    public function setMois(?Month $mois): self
    {
        $this->mois = $mois;

        return $this;
    }

    public function getAnnee(): ?Year
    {
        return $this->annee;
    }

    public function setAnnee(?Year $annee): self
    {
        $this->annee = $annee;

        return $this;
    }
}
