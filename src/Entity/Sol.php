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
     * @ORM\ManyToOne(targetEntity=Donnee::class, inversedBy="sol")
     */
    private $donnee;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $argile;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $limon;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $sable;

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

    public function getDonnee(): ?Donnee
    {
        return $this->donnee;
    }

    public function setDonnee(?Donnee $donnee): self
    {
        $this->donnee = $donnee;

        return $this;
    }

    public function getArgile(): ?float
    {
        return $this->argile;
    }

    public function setArgile(?float $argile): self
    {
        $this->argile = $argile;

        return $this;
    }

    public function getLimon(): ?float
    {
        return $this->limon;
    }

    public function setLimon(?float $limon): self
    {
        $this->limon = $limon;

        return $this;
    }

    public function getSable(): ?float
    {
        return $this->sable;
    }

    public function setSable(?float $sable): self
    {
        $this->sable = $sable;

        return $this;
    }

}
