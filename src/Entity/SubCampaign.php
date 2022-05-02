<?php

namespace App\Entity;

use App\Repository\SubCampaignRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubCampaignRepository::class)
 */
class SubCampaign
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
    private $SubCampaign;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="date")
     */
    private $StartDate;

    /**
     * @ORM\Column(type="date")
     */
    private $EndDate;

    /**
     * @ORM\OneToMany(targetEntity=Headline::class, mappedBy="subcampaign")
     */
    private $headlines;

    /**
     * @ORM\OneToMany(targetEntity=Continents::class, mappedBy="subcampaign")
     */
    private $continents;

    /**
     * @ORM\ManyToOne(targetEntity=Campaign::class, inversedBy="subcampaigns")
     * @ORM\JoinColumn(nullable=false)
     */
    private $campaign;

    /**
     * @ORM\OneToMany(targetEntity=Units::class, mappedBy="Subcampaign")
     */
    private $units;

    /**
     * @ORM\OneToMany(targetEntity=UnitStatus::class, mappedBy="SubCampaign")
     */
    private $unitStatuses;

    /**
     * @ORM\OneToMany(targetEntity=UnitStatus::class, mappedBy="SubCampaign2")
     */
    private $SC1unitstatuses;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="Subcampaign")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=Units::class, inversedBy="subcampaigns")
     */
    private $TopUnit;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Battle;

  
    public function __construct()
    {
        $this->headlines = new ArrayCollection();
        $this->continents = new ArrayCollection();
        $this->units = new ArrayCollection();
        $this->unitStatuses = new ArrayCollection();
        $this->SC1unitstatuses = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubCampaign(): ?string
    {
        return $this->SubCampaign;
    }

    public function setSubCampaign(string $SubCampaign): self
    {
        $this->SubCampaign = $SubCampaign;

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

    /**
     * @return Collection|Headline[]
     */
    public function getHeadlines(): Collection
    {
        return $this->headlines;
    }

    public function addHeadline(Headline $headline): self
    {
        if (!$this->headlines->contains($headline)) {
            $this->headlines[] = $headline;
            $headline->setSubcampaign($this);
        }

        return $this;
    }

    public function removeHeadline(Headline $headline): self
    {
        if ($this->headlines->contains($headline)) {
            $this->headlines->removeElement($headline);
            // set the owning side to null (unless already changed)
            if ($headline->getSubcampaign() === $this) {
                $headline->setSubcampaign(null);
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

    public function addContinent(Continents $continents): self
    {
        if (!$this->continents->contains($continents)) {
            $this->continents[] = $continents;
            $continents->setSubcampaign($this);
        }

        return $this;
    }

    public function removeContinent(Continents $continents): self
    {
        if ($this->continents->contains($continents)) {
            $this->continents->removeElement($continents);
            // set the owning side to null (unless already changed)
            if ($continents->getSubcampaign() === $this) {
                $continents->setSubcampaign(null);
            }
        }

        return $this;
    }

    public function getCampaign(): ?campaign
    {
        return $this->campaign;
    }

    public function setCampaign(?campaign $campaign): self
    {
        $this->campaign = $campaign;

        return $this;
    }

    /**
     * @return Collection|Sessionvars[]
     */
    public function getSessionvars(): Collection
    {
        return $this->sessionvars;
    }

    public function addSessionvar(Sessionvars $sessionvar): self
    {
        if (!$this->sessionvars->contains($sessionvar)) {
            $this->sessionvars[] = $sessionvar;
            $sessionvar->setSubcampaign($this);
        }

        return $this;
    }

    public function removeSessionvar(Sessionvars $sessionvar): self
    {
        if ($this->sessionvars->contains($sessionvar)) {
            $this->sessionvars->removeElement($sessionvar);
            // set the owning side to null (unless already changed)
            if ($sessionvar->getSubcampaign() === $this) {
                $sessionvar->setSubcampaign(null);
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
            $unit->setSubcampaign2($this);
        }

        return $this;
    }

    public function removeUnit(Units $unit): self
    {
        if ($this->units->contains($unit)) {
            $this->units->removeElement($unit);
            // set the owning side to null (unless already changed)
            if ($unit->getSubcampaign2() === $this) {
                $unit->setSubcampaign2(null);
            }
        }

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
            $unitStatus->setSubCampaign($this);
        }

        return $this;
    }

    public function removeUnitStatus(UnitStatus $unitStatus): self
    {
        if ($this->unitStatuses->contains($unitStatus)) {
            $this->unitStatuses->removeElement($unitStatus);
            // set the owning side to null (unless already changed)
            if ($unitStatus->getSubCampaign() === $this) {
                $unitStatus->setSubCampaign(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UnitStatus[]
     */
    public function getSC1unitstatuses(): Collection
    {
        return $this->SC1unitstatuses;
    }

    public function addSC1unitstatus(UnitStatus $sC1unitstatus): self
    {
        if (!$this->SC1unitstatuses->contains($sC1unitstatus)) {
            $this->SC1unitstatuses[] = $sC1unitstatus;
            $sC1unitstatus->setSubCampaign2($this);
        }

        return $this;
    }

    public function removeSC1unitstatus(UnitStatus $sC1unitstatus): self
    {
        if ($this->SC1unitstatuses->contains($sC1unitstatus)) {
            $this->SC1unitstatuses->removeElement($sC1unitstatus);
            // set the owning side to null (unless already changed)
            if ($sC1unitstatus->getSubCampaign2() === $this) {
                $sC1unitstatus->setSubCampaign2(null);
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
            $user->setSubcampaign($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getSubcampaign() === $this) {
                $user->setSubcampaign(null);
            }
        }

        return $this;
    }

    public function getTopUnit(): ?Units
    {
        return $this->TopUnit;
    }

    public function setTopUnit(?Units $TopUnit): self
    {
        $this->TopUnit = $TopUnit;

        return $this;
    }

    public function getBattle(): ?bool
    {
        return $this->Battle;
    }

    public function setBattle(?bool $Battle): self
    {
        $this->Battle = $Battle;

        return $this;
    }

}
