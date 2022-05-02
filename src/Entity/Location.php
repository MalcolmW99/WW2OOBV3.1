<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $LocOrder;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Latitude;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Longitude;

    /**
     * @ORM\OneToOne(targetEntity=Description::class, cascade={"persist", "remove"})
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity=LocType::class, inversedBy="locations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $LocType;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Map;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Symbol;

    /**
     * @ORM\ManyToOne(targetEntity=Subdivisions::class, inversedBy="locations")
     */
    private $subdivisions;

    /**
     * @ORM\OneToMany(targetEntity=UnitStatus::class, mappedBy="Location")
     */
    private $unitStatuses;

    public function __construct()
    {
        $this->unitStatuses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getLocOrder(): ?string
    {
        return $this->LocOrder;
    }

    public function setLocOrder(?string $LocOrder): self
    {
        $this->LocOrder = $LocOrder;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->Latitude;
    }

    public function setLatitude(?string $Latitude): self
    {
        $this->Latitude = $Latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->Longitude;
    }

    public function setLongitude(?string $Longitude): self
    {
        $this->Longitude = $Longitude;

        return $this;
    }

    public function getDescription(): ?Description
    {
        return $this->Description;
    }

    public function setDescription(?Description $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getLocType(): ?Loctype
    {
        return $this->LocType;
    }

    public function setLocType(?Loctype $LocType): self
    {
        $this->LocType = $LocType;

        return $this;
    }

    public function getMap(): ?int
    {
        return $this->Map;
    }

    public function setMap(?int $Map): self
    {
        $this->Map = $Map;

        return $this;
    }

    public function getSymbol(): ?int
    {
        return $this->Symbol;
    }

    public function setSymbol(?int $Symbol): self
    {
        $this->Symbol = $Symbol;

        return $this;
    }

    public function getSubdivisions(): ?subdivisions
    {
        return $this->subdivisions;
    }

    public function setSubdivisions(?subdivisions $subdivisions): self
    {
        $this->subdivisions = $subdivisions;

        return $this;
    }

    /**
     * @return Collection|UnitStatus[]
     */
    public function getUnitStatuses(): Collection
    {
        return $this->unitStatuses;
    }

    public function addUnitStatus(UnitStatus $unitStatus): self
    {
        if (!$this->unitStatuses->contains($unitStatus)) {
            $this->unitStatuses[] = $unitStatus;
            $unitStatus->setLocation($this);
        }

        return $this;
    }

    public function removeUnitStatus(UnitStatus $unitStatus): self
    {
        if ($this->unitStatuses->contains($unitStatus)) {
            $this->unitStatuses->removeElement($unitStatus);
            // set the owning side to null (unless already changed)
            if ($unitStatus->getLocation() === $this) {
                $unitStatus->setLocation(null);
            }
        }

        return $this;
    }

}
