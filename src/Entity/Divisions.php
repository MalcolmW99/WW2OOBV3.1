<?php

namespace App\Entity;

use App\Repository\DivisionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DivisionsRepository::class)
 */
class Divisions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $division;

    /**
     * @ORM\ManyToOne(targetEntity=Description::class, inversedBy="divisions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Countries::class, inversedBy="divisions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity=LocType::class, inversedBy="divisions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $loctype;

    /**
     * @ORM\OneToMany(targetEntity=Subdivisions::class, mappedBy="division")
     */
    private $subdivisions;

    public function __construct()
    {
        $this->subdivisions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDivision(): ?string
    {
        return $this->division;
    }

    public function setDivision(string $division): self
    {
        $this->division = $division;

        return $this;
    }

    public function getDescription(): ?description
    {
        return $this->description;
    }

    public function setDescription(?description $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCountry(): ?countries
    {
        return $this->country;
    }

    public function setCountry(?countries $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getLoctype(): ?LocType
    {
        return $this->loctype;
    }

    public function setLoctype(?LocType $loctype): self
    {
        $this->loctype = $loctype;

        return $this;
    }

    /**
     * @return Collection|Subdivisions[]
     */
    public function getSubdivisions(): Collection
    {
        return $this->subdivisions;
    }

    public function addSubdivision(Subdivisions $subdivision): self
    {
        if (!$this->subdivisions->contains($subdivision)) {
            $this->subdivisions[] = $subdivision;
            $subdivision->setDivision($this);
        }

        return $this;
    }

    public function removeSubdivision(Subdivisions $subdivision): self
    {
        if ($this->subdivisions->contains($subdivision)) {
            $this->subdivisions->removeElement($subdivision);
            // set the owning side to null (unless already changed)
            if ($subdivision->getDivision() === $this) {
                $subdivision->setDivision(null);
            }
        }

        return $this;
    }
}
