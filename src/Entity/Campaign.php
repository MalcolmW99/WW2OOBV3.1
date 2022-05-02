<?php

namespace App\Entity;

use App\Repository\CampaignRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CampaignRepository::class)
 */
class Campaign
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
    private $Campaign;

    /**
     * @ORM\Column(type="date_immutable")
     */
    private $StartDate;

    /**
     * @ORM\Column(type="date_immutable")
     */
    private $EndDate;

    /**
     * @ORM\ManyToOne(targetEntity=Theatres::class, inversedBy="campaigns")
     */
    private $theatre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $SortOrder;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\OneToMany(targetEntity=SubCampaign::class, mappedBy="campaign")
     */
    private $subcampaigns;

    /**
     * @ORM\ManyToOne(targetEntity=Fronts::class, inversedBy="campaigns")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Front;

    public function __construct()
    {
        $this->subcampaigns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCampaign(): ?string
    {
        return $this->Campaign;
    }

    public function setCampaign(string $Campaign): self
    {
        $this->Campaign = $Campaign;

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

    public function getTheatre(): ?Theatres
    {
        return $this->theatre;
    }

    public function setTheatre(?Theatres $theatre): self
    {
        $this->theatre = $theatre;

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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

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
            $subcampaign->setCampaign($this);
        }

        return $this;
    }

    public function removeSubcampaign(Subcampaign $subcampaign): self
    {
        if ($this->subcampaigns->contains($subcampaign)) {
            $this->subcampaigns->removeElement($subcampaign);
            // set the owning side to null (unless already changed)
            if ($subcampaign->getCampaign() === $this) {
                $subcampaign->setCampaign(null);
            }
        }

        return $this;
    }

    public function getFront(): ?Fronts
    {
        return $this->Front;
    }

    public function setFront(?Fronts $Front): self
    {
        $this->Front = $Front;

        return $this;
    }

}
