<?php

namespace App\Entity;

use App\Repository\PublicationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PublicationRepository::class)
 */
class Publication
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $contenu;

    /**
     * @ORM\OneToOne(targetEntity=Solution::class, mappedBy="publication", cascade={"persist", "remove"})
     */
    private $solution;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getSolution(): ?Solution
    {
        return $this->solution;
    }

    public function setSolution(?Solution $solution): self
    {
        // unset the owning side of the relation if necessary
        if ($solution === null && $this->solution !== null) {
            $this->solution->setPublication(null);
        }

        // set the owning side of the relation if necessary
        if ($solution !== null && $solution->getPublication() !== $this) {
            $solution->setPublication($this);
        }

        $this->solution = $solution;

        return $this;
    }
}
