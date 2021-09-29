<?php

namespace App\Entity;

use App\Repository\PlantationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlantationRepository::class)
 */
class Plantation
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
    private $mois;

    /**
     * @ORM\OneToOne(targetEntity=Culture::class, inversedBy="plantation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $culture;

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

    public function getCulture(): ?Culture
    {
        return $this->culture;
    }

    public function setCulture(Culture $culture): self
    {
        $this->culture = $culture;

        return $this;
    }
}
