<?php

namespace App\Entity;

use App\Repository\PrecipitationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrecipitationRepository::class)
 */
class Precipitation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $taux;

    /**
     * @ORM\OneToOne(targetEntity=Donnee::class, mappedBy="precipitation", cascade={"persist", "remove"})
     */
    private $donnee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaux(): ?float
    {
        return $this->taux;
    }

    public function setTaux(float $taux): self
    {
        $this->taux = $taux;

        return $this;
    }

    public function getDonnee(): ?Donnee
    {
        return $this->donnee;
    }

    public function setDonnee(?Donnee $donnee): self
    {
        // unset the owning side of the relation if necessary
        if ($donnee === null && $this->donnee !== null) {
            $this->donnee->setPrecipitation(null);
        }

        // set the owning side of the relation if necessary
        if ($donnee !== null && $donnee->getPrecipitation() !== $this) {
            $donnee->setPrecipitation($this);
        }

        $this->donnee = $donnee;

        return $this;
    }
}
