<?php

namespace App\Entity;

use App\Repository\TemperatureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TemperatureRepository::class)
 */
class Temperature
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
    private $valeur;

    /**
     * @ORM\OneToOne(targetEntity=Donnee::class, mappedBy="temperature", cascade={"persist", "remove"})
     */
    private $donnee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur(): ?float
    {
        return $this->valeur;
    }

    public function setValeur(float $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getDonnee(): ?Donnee
    {
        return $this->donnee;
    }

    public function setDonnee(Donnee $donnee): self
    {
        // set the owning side of the relation if necessary
        if ($donnee->getTemperature() !== $this) {
            $donnee->setTemperature($this);
        }

        $this->donnee = $donnee;

        return $this;
    }
}
