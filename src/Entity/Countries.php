<?php

namespace App\Entity;

use App\Repository\CountriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountriesRepository::class)
 */
class Countries
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
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity=LocType::class, inversedBy="countries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $LocType;

    /**
     * @ORM\OneToMany(targetEntity=Divisions::class, mappedBy="Country")
     */
    private $divisions;

    /**
     * @ORM\OneToOne(targetEntity=Description::class, cascade={"persist", "remove"})
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Theatres::class, inversedBy="countries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $theatre;

    /**
     * @ORM\OneToMany(targetEntity=ForceType::class, mappedBy="Country")
     */
    private $forceTypes;

    /**
     * @ORM\OneToMany(targetEntity=Forces::class, mappedBy="Country")
     */
    private $forces;

    /**
     * @ORM\OneToMany(targetEntity=UnitType::class, mappedBy="Country")
     */
    private $unitTypes;

    /**
     * @ORM\OneToMany(targetEntity=Units::class, mappedBy="Country")
     */
    private $units;

    /**
     * @ORM\OneToMany(targetEntity=CO::class, mappedBy="country")
     */
    private $COs;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="Country")
     */
    private $users;

    public function __construct()
    {
        $this->divisions = new ArrayCollection();
        $this->forceTypes = new ArrayCollection();
        $this->forces = new ArrayCollection();
        $this->unitTypes = new ArrayCollection();
        $this->units = new ArrayCollection();
        $this->COs = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

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
            $division->setCountry($this);
        }

        return $this;
    }

    public function removeDivision(Divisions $division): self
    {
        if ($this->divisions->contains($division)) {
            $this->divisions->removeElement($division);
            // set the owning side to null (unless already changed)
            if ($division->getCountry() === $this) {
                $division->setCountry(null);
            }
        }

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

    public function getTheatre(): ?theatres
    {
        return $this->theatre;
    }

    public function setTheatre(?theatres $theatre): self
    {
        $this->theatre = $theatre;

        return $this;
    }

    /**
     * @return Collection|ForceType[]
     */
    public function getForceTypes(): Collection
    {
        return $this->forceTypes;
    }

    public function addForceType(ForceType $forceType): self
    {
        if (!$this->forceTypes->contains($forceType)) {
            $this->forceTypes[] = $forceType;
            $forceType->setCountry($this);
        }

        return $this;
    }

    public function removeForceType(ForceType $forceType): self
    {
        if ($this->forceTypes->contains($forceType)) {
            $this->forceTypes->removeElement($forceType);
            // set the owning side to null (unless already changed)
            if ($forceType->getCountry() === $this) {
                $forceType->setCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Forces[]
     */
    public function getForces(): Collection
    {
        return $this->forces;
    }

    public function addForce(Forces $force): self
    {
        if (!$this->forces->contains($force)) {
            $this->forces[] = $force;
            $force->setCountry($this);
        }

        return $this;
    }

    public function removeForce(Forces $force): self
    {
        if ($this->forces->contains($force)) {
            $this->forces->removeElement($force);
            // set the owning side to null (unless already changed)
            if ($force->getCountry() === $this) {
                $force->setCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UnitType[]
     */
    public function getUnitTypes(): Collection
    {
        return $this->unitTypes;
    }

    public function addUnitType(UnitType $unitType): self
    {
        if (!$this->unitTypes->contains($unitType)) {
            $this->unitTypes[] = $unitType;
            $unitType->setCountry($this);
        }

        return $this;
    }

    public function removeUnitType(UnitType $unitType): self
    {
        if ($this->unitTypes->contains($unitType)) {
            $this->unitTypes->removeElement($unitType);
            // set the owning side to null (unless already changed)
            if ($unitType->getCountry() === $this) {
                $unitType->setCountry(null);
            }
        }

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
            $unit->setCountry($this);
        }

        return $this;
    }

    public function removeUnit(Units $unit): self
    {
        if ($this->units->contains($unit)) {
            $this->units->removeElement($unit);
            // set the owning side to null (unless already changed)
            if ($unit->getCountry() === $this) {
                $unit->setCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CO[]
     */
    public function getCOs(): Collection
    {
        return $this->COs;
    }

    public function addCO(CO $cO): self
    {
        if (!$this->COs->contains($cO)) {
            $this->COs[] = $cO;
            $cO->setCountry($this);
        }

        return $this;
    }

    public function removeCO(CO $cO): self
    {
        if ($this->COs->contains($cO)) {
            $this->COs->removeElement($cO);
            // set the owning side to null (unless already changed)
            if ($cO->getCountry() === $this) {
                $cO->setCountry(null);
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
            $user->setCountry($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getCountry() === $this) {
                $user->setCountry(null);
            }
        }

        return $this;
    }
}
