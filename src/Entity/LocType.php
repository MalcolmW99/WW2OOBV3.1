<?php

namespace App\Entity;

use App\Repository\LocTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocTypeRepository::class)
 */
class LocType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $loctype;

    /**
     * @ORM\OneToMany(targetEntity=Countries::class, mappedBy="LocType")
     */
    private $countries;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="LocType")
     */
    private $locations;

    /**
     * @ORM\OneToMany(targetEntity=Subdivisions::class, mappedBy="LocType")
     */
    private $subdivisions;

    /**
     * @ORM\OneToMany(targetEntity=Description::class, mappedBy="LocType")
     */
    private $descriptions;

    /**
     * @ORM\OneToMany(targetEntity=Divisions::class, mappedBy="LocType")
     */
    private $divisions;

    /**
     * @ORM\OneToMany(targetEntity=Theatres::class, mappedBy="loctype")
     */
    private $theatres;

    /**
     * @ORM\OneToMany(targetEntity=Subcontinents::class, mappedBy="loctype")
     */
    private $subcontinents;

    /**
     * @ORM\OneToMany(targetEntity=Continents::class, mappedBy="LocType")
     */
    private $continents;

    public function __construct()
    {
        $this->countries = new ArrayCollection();
        $this->locations = new ArrayCollection();
        $this->subdivisions = new ArrayCollection();
        $this->descriptions = new ArrayCollection();
        $this->divisions = new ArrayCollection();
        $this->theatres = new ArrayCollection();
        $this->subcontinents = new ArrayCollection();
        $this->continents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getloctype(): ?string
    {
        return $this->loctype;
    }

    public function setloctype(string $loctype): self
    {
        $this->loctype = $loctype;

        return $this;
    }

    /**
     * @return Collection|Countries[]
     */
    public function getCountries(): Collection
    {
        return $this->countries;
    }

    public function addCountry(Countries $country): self
    {
        if (!$this->countries->contains($country)) {
            $this->countries[] = $country;
            $country->setLocType($this);
        }

        return $this;
    }

    public function removeCountry(Countries $country): self
    {
        if ($this->countries->contains($country)) {
            $this->countries->removeElement($country);
            // set the owning side to null (unless already changed)
            if ($country->getLocType() === $this) {
                $country->setLocType(null);
            }
        }

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
            $location->setLocType($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): self
    {
        if ($this->locations->contains($location)) {
            $this->locations->removeElement($location);
            // set the owning side to null (unless already changed)
            if ($location->getLocType() === $this) {
                $location->setLocType(null);
            }
        }

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
            $subdivision->setLocType($this);
        }

        return $this;
    }

    public function removeSubdivision(Subdivisions $subdivision): self
    {
        if ($this->subdivisions->contains($subdivision)) {
            $this->subdivisions->removeElement($subdivision);
            // set the owning side to null (unless already changed)
            if ($subdivision->getLocType() === $this) {
                $subdivision->setLocType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Description[]
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }

    public function addDescription(Description $description): self
    {
        if (!$this->descriptions->contains($description)) {
            $this->descriptions[] = $description;
            $description->setLocType($this);
        }

        return $this;
    }

    public function removeDescription(Description $description): self
    {
        if ($this->descriptions->contains($description)) {
            $this->descriptions->removeElement($description);
            // set the owning side to null (unless already changed)
            if ($description->getLocType() === $this) {
                $description->setLocType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Divisions[]
     */
    public function getDivisions(): Collection
    {
        return $this->divisions;
    }

    public function addDivision(Divisions $division): self
    {
        if (!$this->divisions->contains($division)) {
            $this->divisions[] = $division;
            $division->setLoctype($this);
        }

        return $this;
    }

    public function removeDivision(Divisions $division): self
    {
        if ($this->divisions->contains($division)) {
            $this->divisions->removeElement($division);
            // set the owning side to null (unless already changed)
            if ($division->getLoctype() === $this) {
                $division->setLoctype(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Theatres[]
     */
    public function getTheatres(): Collection
    {
        return $this->theatres;
    }

    public function addTheatre(Theatres $theatre): self
    {
        if (!$this->theatres->contains($theatre)) {
            $this->theatres[] = $theatre;
            $theatre->setLoctype($this);
        }

        return $this;
    }

    public function removeTheatre(Theatres $theatre): self
    {
        if ($this->theatres->contains($theatre)) {
            $this->theatres->removeElement($theatre);
            // set the owning side to null (unless already changed)
            if ($theatre->getLoctype() === $this) {
                $theatre->setLoctype(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Subcontinents[]
     */
    public function getSubcontinents(): Collection
    {
        return $this->subcontinents;
    }

    public function addSubcontinent(Subcontinents $subcontinent): self
    {
        if (!$this->subcontinents->contains($subcontinent)) {
            $this->subcontinents[] = $subcontinent;
            $subcontinent->setLoctype($this);
        }

        return $this;
    }

    public function removeSubcontinent(Subcontinents $subcontinent): self
    {
        if ($this->subcontinents->contains($subcontinent)) {
            $this->subcontinents->removeElement($subcontinent);
            // set the owning side to null (unless already changed)
            if ($subcontinent->getLoctype() === $this) {
                $subcontinent->setLoctype(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Continents[]
     */
    public function getContinents(): Collection
    {
        return $this->continents;
    }

    public function addContinents(Continents $continents): self
    {
        if (!$this->continents->contains($continents)) {
            $this->continents[] = $continents;
            $continents->setLocType($this);
        }

        return $this;
    }

    public function removeContinents(Continents $continents): self
    {
        if ($this->continents->contains($continents)) {
            $this->continents->removeElement($continents);
            // set the owning side to null (unless already changed)
            if ($continents->getLocType() === $this) {
                $continents->setLocType(null);
            }
        }

        return $this;
    }
}
