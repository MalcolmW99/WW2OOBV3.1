<?php

namespace App\Entity;

use App\Repository\UnitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OrderBy;

/**
 * @ORM\Entity(repositoryClass=UnitsRepository::class)
 */
class Units
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
    private $unit;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $UnitNo;

    /**
     * @ORM\ManyToOne(targetEntity=UnitType::class, inversedBy="units")
     * @ORM\JoinColumn(nullable=false)
     * @OrderBy({"Level"="ASC"})
     */
    private $UnitType;

    /**
     * @ORM\ManyToOne(targetEntity=Forces::class, inversedBy="units")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Forces;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $StartDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $EndDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity=Countries::class, inversedBy="units")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Country;

    /**
     * @ORM\OneToMany(targetEntity=UnitStatus::class, mappedBy="unit")
     * @ORM\OrderBy({"StartDate"= "ASC"})
     */
    private $unitStatuses;

    /**
     * @ORM\OneToMany(targetEntity=UnitStatus::class, mappedBy="UnitChanged")
     */
    private $changedUnitStatuses;

    /**
     * @ORM\OneToMany(targetEntity=UnitStatus::class, mappedBy="HigherUnit")
     */
    private $higherUnitStatuses;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="Unit")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=SubCampaign::class, mappedBy="TopUnit")
     */
    private $subcampaigns;

    /**
     * @ORM\OneToMany(targetEntity=UnitEqup::class, mappedBy="unit")
     */
    private $unitEqups;

    public function __construct()
    {
        $this->unitStatuses = new ArrayCollection();
        $this->changedUnitStatuses = new ArrayCollection();
        $this->higherUnitStatuses = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->subcampaigns = new ArrayCollection();
        $this->unitEqups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getUnitNo(): ?string
    {
        return $this->UnitNo;
    }

    public function setUnitNo(?string $UnitNo): self
    {
        $this->UnitNo = $UnitNo;

        return $this;
    }

    public function getUnitType(): ?UnitType
    {
        return $this->UnitType;
    }

    public function setUnitType(?UnitType $UnitType): self
    {
        $this->UnitType = $UnitType;

        return $this;
    }

    public function getForces(): ?Forces
    {
        return $this->Forces;
    }

    public function setForces(?Forces $Forces): self
    {
        $this->Forces = $Forces;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->StartDate;
    }

    public function setStartDate(\DateTimeInterface $StartDate): self
    {
        $this->StartDate = $StartDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->EndDate;
    }

    public function setEndDate(\DateTimeInterface $EndDate): self
    {
        $this->EndDate = $EndDate;

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

    public function getCountry(): ?countries
    {
        return $this->Country;
    }

    public function setCountry(?countries $Country): self
    {
        $this->Country = $Country;

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
            $unitStatus->setUnit($this);
        }

        return $this;
    }

    public function removeUnitStatus(UnitStatus $unitStatus): self
    {
        if ($this->unitStatuses->contains($unitStatus)) {
            $this->unitStatuses->removeElement($unitStatus);
            // set the owning side to null (unless already changed)
            if ($unitStatus->getUnit() === $this) {
                $unitStatus->setUnit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UnitStatus[]
     */
    public function getChangedUnitStatuses(): Collection
    {
        return $this->changedUnitStatuses;
    }

    public function addChangedUnitStatus(UnitStatus $changedUnitStatus): self
    {
        if (!$this->changedUnitStatuses->contains($changedUnitStatus)) {
            $this->changedUnitStatuses[] = $changedUnitStatus;
            $changedUnitStatus->setUnitChanged($this);
        }

        return $this;
    }

    public function removeChangedUnitStatus(UnitStatus $changedUnitStatus): self
    {
        if ($this->changedUnitStatuses->contains($changedUnitStatus)) {
            $this->changedUnitStatuses->removeElement($changedUnitStatus);
            // set the owning side to null (unless already changed)
            if ($changedUnitStatus->getUnitChanged() === $this) {
                $changedUnitStatus->setUnitChanged(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UnitStatus[]
     */
    public function getHigherUnitStatuses(): Collection
    {
        return $this->higherUnitStatuses;
    }

    public function addHigherUnitStatus(UnitStatus $higherUnitStatus): self
    {
        if (!$this->higherUnitStatuses->contains($higherUnitStatus)) {
            $this->higherUnitStatuses[] = $higherUnitStatus;
            $higherUnitStatus->setHigherUnit($this);
        }

        return $this;
    }

    public function removeHigherUnitStatus(UnitStatus $higherUnitStatus): self
    {
        if ($this->higherUnitStatuses->contains($higherUnitStatus)) {
            $this->higherUnitStatuses->removeElement($higherUnitStatus);
            // set the owning side to null (unless already changed)
            if ($higherUnitStatus->getHigherUnit() === $this) {
                $higherUnitStatus->setHigherUnit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setUnit($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getUnit() === $this) {
                $user->setUnit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Subcampaign[]
     */
    public function getSubcampaigns(): Collection
    {
        return $this->subcampaigns;
    }

    public function addSubcampaign(Subcampaign $subcampaign): self
    {
        if (!$this->subcampaigns->contains($subcampaign)) {
            $this->subcampaigns[] = $subcampaign;
            $subcampaign->setTopUnit($this);
        }

        return $this;
    }

    public function removeSubcampaign(Subcampaign $subcampaign): self
    {
        if ($this->subcampaigns->contains($subcampaign)) {
            $this->subcampaigns->removeElement($subcampaign);
            // set the owning side to null (unless already changed)
            if ($subcampaign->getTopUnit() === $this) {
                $subcampaign->setTopUnit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UnitEqup[]
     */
    public function getUnitEqups(): Collection
    {
        return $this->unitEqups;
    }

    public function addUnitEqup(UnitEqup $unitEqup): self
    {
        if (!$this->unitEqups->contains($unitEqup)) {
            $this->unitEqups[] = $unitEqup;
            $unitEqup->setUnit($this);
        }

        return $this;
    }

    public function removeUnitEqup(UnitEqup $unitEqup): self
    {
        if ($this->unitEqups->contains($unitEqup)) {
            $this->unitEqups->removeElement($unitEqup);
            // set the owning side to null (unless already changed)
            if ($unitEqup->getUnit() === $this) {
                $unitEqup->setUnit(null);
            }
        }

        return $this;
    }
}
