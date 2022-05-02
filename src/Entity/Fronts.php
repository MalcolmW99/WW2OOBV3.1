<?php

namespace App\Entity;

use App\Repository\FrontsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FrontsRepository::class)
 * 
 */
class Fronts
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
    private $Front;

    /**
     * @ORM\Column(type="date_immutable")
     */
    private $StartDate;

    /**
     * @ORM\Column(type="date_immutable")
     */
    private $EndDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\OneToMany(targetEntity=Campaign::class, mappedBy="Front")
     */
    private $campaigns;

    /**
     * @ORM\ManyToOne(targetEntity=Subcontinents::class, inversedBy="fronts")
     */
    private $SubContinent;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $SortOrder;

    /**
     * @ORM\ManyToOne(targetEntity=ForceType::class, inversedBy="fronts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ForceType;

    public function __construct()
    {
        $this->campaigns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFront(): ?string
    {
        return $this->Front;
    }

    public function setFront(string $Front): self
    {
        $this->Front = $Front;

        return $this;
    }

    public function getStartDate(): ?\DateTimeImmutable
    {
        return $this->StartDate;
    }

    public function setStartDate(\DateTimeImmutable $StartDate): self
    {
        $this->StartDate = $StartDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->EndDate;
    }

    public function setEndDate(\DateTimeImmutable $EndDate): self
    {
        $this->EndDate = $EndDate;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection|Campaign[]
     */
    public function getCampaigns(): Collection
    {
        return $this->campaigns;
    }

    public function addCampaign(Campaign $campaign): self
    {
        if (!$this->campaigns->contains($campaign)) {
            $this->campaigns[] = $campaign;
            $campaign->setFront($this);
        }

        return $this;
    }

    public function removeCampaign(Campaign $campaign): self
    {
        if ($this->campaigns->contains($campaign)) {
            $this->campaigns->removeElement($campaign);
            // set the owning side to null (unless already changed)
            if ($campaign->getFront() === $this) {
                $campaign->setFront(null);
            }
        }

        return $this;
    }

    public function getSubContinent(): ?Subcontinents
    {
        return $this->SubContinent;
    }

    public function setSubContinent(?Subcontinents $SubContinent): self
    {
        $this->SubContinent = $SubContinent;

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

    public function getForceType(): ?ForceType
    {
        return $this->ForceType;
    }

    public function setForceType(?ForceType $ForceType): self
    {
        $this->ForceType = $ForceType;

        return $this;
    }

}
