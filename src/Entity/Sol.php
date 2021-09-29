<?php

namespace App\Entity;

use App\Repository\SolRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SolRepository::class)
 */
class Sol
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $constituants;

    /**
     * @ORM\Column(type="float")
     */
    private $pourcentage;

    /**
     * @ORM\ManyToOne(targetEntity=Donnee::class, inversedBy="sol")
     */
    private $donnee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConstituants(): ?string
    {
        return $this->constituants;
    }

    public function setConstituants(string $constituants): self
    {
        $this->constituants = $constituants;

        return $this;
    }

    public function getPourcentage(): ?float
    {
        return $this->pourcentage;
    }

    public function setPourcentage(float $pourcentage): self
    {
        $this->pourcentage = $pourcentage;

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

}
