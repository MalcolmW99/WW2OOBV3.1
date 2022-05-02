<?php

namespace App\Entity;

use App\Repository\ForceTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ForceTypeRepository::class)
 */
class ForceType
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
    private $ForceType;

    /**
     * @ORM\OneToMany(targetEntity=Fronts::class, mappedBy="ForceType")
     */
    private $fronts;

    /**
     * @ORM\OneToMany(targetEntity=Forces::class, mappedBy="ForceType")
     */
    private $forces;

    /**
     * @ORM\OneToMany(targetEntity=UnitType::class, mappedBy="ForceType")
     */
    private $unitTypes;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="ForceType")
     */
    private $users;


    public function __construct()
    {
        $this->fronts = new ArrayCollection();
        $this->forces = new ArrayCollection();
        $this->unitTypes = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getForceType(): ?string
    {
        return $this->ForceType;
    }

    public function setForceType(string $ForceType): self
    {
        $this->ForceType = $ForceType;

        return $this;
    }

    /**
     * @return Collection|Fronts[]
     */
    public function getFronts(): Collection
    {
        return $this->fronts;
    }

    public function addFront(Fronts $front): self
    {
        if (!$this->fronts->contains($front)) {
            $this->fronts[] = $front;
            $front->setForceType($this);
        }

        return $this;
    }

    public function removeFront(Fronts $front): self
    {
        if ($this->fronts->contains($front)) {
            $this->fronts->removeElement($front);
            // set the owning side to null (unless already changed)
            if ($front->getForceType() === $this) {
                $front->setForceType(null);
            }
        }

        return $this;
    }

    public function getForcename(): ?string
    {
        return $this->forcename;
    }

    public function setForcename(string $forcename): self
    {
        $this->forcename = $forcename;

        return $this;
    }

    public function getReportIndex(): ?string
    {
        return $this->ReportIndex;
    }

    public function setReportIndex(string $ReportIndex): self
    {
        $this->ReportIndex = $ReportIndex;

        return $this;
    }

    public function getCountry(): ?Countries
    {
        return $this->country;
    }

    public function setCountry(?Countries $country): self
    {
        $this->country = $country;

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
            $force->setForceType($this);
        }

        return $this;
    }

    public function removeForce(Forces $force): self
    {
        if ($this->forces->contains($force)) {
            $this->forces->removeElement($force);
            // set the owning side to null (unless already changed)
            if ($force->getForceType() === $this) {
                $force->setForceType(null);
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
            $unitType->setForceType($this);
        }

        return $this;
    }

    public function removeUnitType(UnitType $unitType): self
    {
        if ($this->unitTypes->contains($unitType)) {
            $this->unitTypes->removeElement($unitType);
            // set the owning side to null (unless already changed)
            if ($unitType->getForceType() === $this) {
                $unitType->setForceType(null);
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
            $user->setForceType($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getForceType() === $this) {
                $user->setForceType(null);
            }
        }

        return $this;
    }
}
