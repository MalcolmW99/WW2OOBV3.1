<?php

namespace App\Entity;

use App\Repository\SessionvarsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SessionvarsRepository::class)
 */
class Sessionvars
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $CurrentDate;

    /**
     * @ORM\ManyToOne(targetEntity=Units::class, inversedBy="sessionvars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unit;

    /**
     * @ORM\ManyToOne(targetEntity=Countries::class, inversedBy="sessionvars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity=SubCampaign::class, inversedBy="sessionvars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subcampaign;

    /**
     * @ORM\ManyToOne(targetEntity=ForceType::class, inversedBy="sessionvars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ForceType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrentDate(): ?\DateTimeInterface
    {
        return $this->CurrentDate;
    }

    public function setCurrentDate(\DateTimeInterface $CurrentDate): self
    {
        $this->CurrentDate = $CurrentDate;

        return $this;
    }

    public function getUnit(): ?Units
    {
        return $this->unit;
    }

    public function setUnit(?Units $unit): self
    {
        $this->unit = $unit;

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

    public function getSubcampaign(): ?Subcampaign
    {
        return $this->subcampaign;
    }

    public function setSubcampaign(?Subcampaign $subcampaign): self
    {
        $this->subcampaign = $subcampaign;

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
