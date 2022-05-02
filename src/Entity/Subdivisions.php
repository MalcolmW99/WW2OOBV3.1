<?php

namespace App\Entity;

use App\Repository\SubdivisionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubdivisionsRepository::class)
 */
class Subdivisions
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
    private $subdivision;

    /**
     * @ORM\OneToOne(targetEntity=Description::class, inversedBy="subdivisions", cascade={"persist", "remove"})
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=LocType::class, inversedBy="subdivisions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $LocType;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="subdivisions")
     */
    private $locations;

    /**
     * @ORM\ManyToOne(targetEntity=Divisions::class, inversedBy="subdivisions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $division;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubdivision(): ?string
    {
        return $this->subdivision;
    }

    public function setSubdivision(string $subdivision): self
    {
        $this->subdivision = $subdivision;

        return $this;
    }

    public function getDescription(): ?Description
    {
        return $this->description;
    }

    public function setDescription(?Description $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLocType(): ?LocType
    {
        return $this->LocType;
    }

    public function setLocType(?LocType $LocType): self
    {
        $this->LocType = $LocType;

        return $this;
    }

    /**
     * @return Collection|Location[]
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): self
    {
        if (!$this->locations->contains($location)) {
            $this->locations[] = $location;
            $location->setSubdivisions($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): self
    {
        if ($this->locations->contains($location)) {
            $this->locations->removeElement($location);
            // set the owning side to null (unless already changed)
            if ($location->getSubdivisions() === $this) {
                $location->setSubdivisions(null);
            }
        }

        return $this;
    }

    public function getDivision(): ?divisions
    {
        return $this->division;
    }

    public function setDivision(?divisions $division): self
    {
        $this->division = $division;

        return $this;
    }
}
