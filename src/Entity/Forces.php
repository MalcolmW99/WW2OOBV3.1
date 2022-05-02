<?php

namespace App\Entity;

use App\Repository\ForcesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ForcesRepository::class)
 */
class Forces
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=27)
     */
    private $ForceName;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $ReportIndex;

    /**
     * @ORM\ManyToOne(targetEntity=Countries::class, inversedBy="forces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Country;

    /**
     * @ORM\ManyToOne(targetEntity=ForceType::class, inversedBy="forces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ForceType;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $SortOrder;

    /**
     * @ORM\OneToMany(targetEntity=Units::class, mappedBy="Forces")
     */
    private $units;

    public function __construct()
    {
        $this->units = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getForceName(): ?string
    {
        return $this->ForceName;
    }

    public function setForceName(string $ForceName): self
    {
        $this->ForceName = $ForceName;

        return $this;
    }

    public function getReportIndex(): ?string
    {
        return $this->ReportIndex;
    }

    public function setReportIndex(?string $ReportIndex): self
    {
        $this->ReportIndex = $ReportIndex;

        return $this;
    }

    public function getCountry(): ?Countries
    {
        return $this->Country;
    }

    public function setCountry(?Countries $Country): self
    {
        $this->Country = $Country;

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

    public function getSortOrder(): ?int
    {
        return $this->SortOrder;
    }

    public function setSortOrder(?int $SortOrder): self
    {
        $this->SortOrder = $SortOrder;

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
            $unit->setForces($this);
        }

        return $this;
    }

    public function removeUnit(Units $unit): self
    {
        if ($this->units->contains($unit)) {
            $this->units->removeElement($unit);
            // set the owning side to null (unless already changed)
            if ($unit->getForces() === $this) {
                $unit->setForces(null);
            }
        }

        return $this;
    }
}
