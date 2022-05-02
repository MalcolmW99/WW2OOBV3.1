<?php

namespace App\Entity;

use App\Repository\DescriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DescriptionRepository::class)
 */
class Description
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Location;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\OneToOne(targetEntity=Subdivisions::class, mappedBy="description", cascade={"persist", "remove"})
     */
    private $subdivisions;

    /**
     * @ORM\ManyToOne(targetEntity=LocType::class, inversedBy="descriptions")
     */
    private $LocType;

    /**
     * @ORM\OneToMany(targetEntity=Divisions::class, mappedBy="description")
     */
    private $divisions;

    /**
     * @ORM\OneToMany(targetEntity=Subcontinents::class, mappedBy="description")
     */
    private $subcontinents;

    public function __construct()
    {
        $this->divisions = new ArrayCollection();
        $this->subcontinents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocation(): ?string
    {
        return $this->Location;
    }

    public function setLocation(?string $Location): self
    {
        $this->Location = $Location;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getSubdivisions(): ?Subdivisions
    {
        return $this->subdivisions;
    }

    public function setSubdivisions(?Subdivisions $subdivisions): self
    {
        $this->subdivisions = $subdivisions;

        // set (or unset) the owning side of the relation if necessary
        $newDescription = null === $subdivisions ? null : $this;
        if ($subdivisions->getDescription() !== $newDescription) {
            $subdivisions->setDescription($newDescription);
        }

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
            $division->setDescription($this);
        }

        return $this;
    }

    public function removeDivision(Divisions $division): self
    {
        if ($this->divisions->contains($division)) {
            $this->divisions->removeElement($division);
            // set the owning side to null (unless already changed)
            if ($division->getDescription() === $this) {
                $division->setDescription(null);
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
            $subcontinent->setDescription($this);
        }

        return $this;
    }

    public function removeSubcontinent(Subcontinents $subcontinent): self
    {
        if ($this->subcontinents->contains($subcontinent)) {
            $this->subcontinents->removeElement($subcontinent);
            // set the owning side to null (unless already changed)
            if ($subcontinent->getDescription() === $this) {
                $subcontinent->setDescription(null);
            }
        }

        return $this;
    }
}
