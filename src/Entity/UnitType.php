<?php

namespace App\Entity;

use App\Repository\UnitTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UnitTypeRepository::class)
 */
class UnitType
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
    private $unitType;

    /**
     * @ORM\ManyToOne(targetEntity=ForceType::class, inversedBy="unitTypes")
     */
    private $ForceType;

    /**
     * @ORM\ManyToOne(targetEntity=Countries::class, inversedBy="unitTypes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Comments;

    /**
     * @ORM\OneToMany(targetEntity=Units::class, mappedBy="UnitType")
     */
    private $units;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $Level;

    public function __construct()
    {
        $this->units = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnitType(): ?string
    {
        return $this->unitType;
    }

    public function setUnitType(string $unitType): self
    {
        $this->unitType = $unitType;

        return $this;
    }

    public function getForceType(): ?ForceType
    {
        return $this->ForceType;
    }

    public function setForceType(?ForceType $ForceType): self
    {
        $this->ForceType = $ForceType;

        return $this;
    }

    public function getCountry(): ?countries
    {
        return $this->Country;
    }

    public function setCountry(?countries $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->Comments;
    }

    public function setComments(?string $Comments): self
    {
        $this->Comments = $Comments;

        return $this;
    }

    /**
     * @return Collection|Units[]
     */
    public function getUnits(): Collection
    {
        return $this->units;
    }

    public function addUnit(Units $unit): self
    {
        if (!$this->units->contains($unit)) {
            $this->units[] = $unit;
            $unit->setUnitType($this);
        }

        return $this;
    }

    public function removeUnit(Units $unit): self
    {
        if ($this->units->contains($unit)) {
            $this->units->removeElement($unit);
            // set the owning side to null (unless already changed)
            if ($unit->getUnitType() === $this) {
                $unit->setUnitType(null);
            }
        }

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->Level;
    }

    public function setLevel(?int $Level): self
    {
        $this->Level = $Level;

        return $this;
    }
}
