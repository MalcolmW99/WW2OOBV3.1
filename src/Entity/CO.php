<?php

namespace App\Entity;

use App\Repository\CORepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CORepository::class)
 */
class CO
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
    private $Name;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $Initials;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Fullname;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DoB;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DoD;

    /**
     * @ORM\ManyToOne(targetEntity=Countries::class, inversedBy="COs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity=UnitStatus::class, mappedBy="CO")
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

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getInitials(): ?string
    {
        return $this->Initials;
    }

    public function setInitials(?string $Initials): self
    {
        $this->Initials = $Initials;

        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->Fullname;
    }

    public function setFullname(string $Fullname): self
    {
        $this->Fullname = $Fullname;

        return $this;
    }

    public function getDoB(): ?\DateTimeInterface
    {
        return $this->DoB;
    }

    public function setDoB(?\DateTimeInterface $DoB): self
    {
        $this->DoB = $DoB;

        return $this;
    }

    public function getDoD(): ?\DateTimeInterface
    {
        return $this->DoD;
    }

    public function setDoD(?\DateTimeInterface $DoD): self
    {
        $this->DoD = $DoD;

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
            $unitStatus->setCO($this);
        }

        return $this;
    }

    public function removeUnitStatus(UnitStatus $unitStatus): self
    {
        if ($this->unitStatuses->contains($unitStatus)) {
            $this->unitStatuses->removeElement($unitStatus);
            // set the owning side to null (unless already changed)
            if ($unitStatus->getCO() === $this) {
                $unitStatus->setCO(null);
            }
        }

        return $this;
    }
}
