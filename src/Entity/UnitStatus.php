<?php

namespace App\Entity;

use App\Repository\UnitStatusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UnitStatusRepository::class)
 */
class UnitStatus
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="bigint")
     */
    private $SeqNo;

    /**
     * @ORM\ManyToOne(targetEntity=Units::class, inversedBy="unitStatuses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unit;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class, inversedBy="unitStatuses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    /**
     * @ORM\Column(type="date")
     */
    private $StartDate;

    /**
     * @ORM\Column(type="date")
     */
    private $EndDate;

    /**
     * @ORM\ManyToOne(targetEntity=Units::class, inversedBy="changedUnitStatuses")
     */
    private $UnitChanged;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Comment;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="unitStatuses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Location;

    /**
     * @ORM\ManyToOne(targetEntity=Units::class, inversedBy="higherUnitStatuses")
     */
    private $HigherUnit;

    /**
     * @ORM\ManyToOne(targetEntity=SubCampaign::class, inversedBy="unitStatuses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $SubCampaign;

    /**
     * @ORM\ManyToOne(targetEntity=SubCampaign::class, inversedBy="SC1unitstatuses")
     */
    private $SubCampaign2;

    /**
     * @ORM\ManyToOne(targetEntity=CO::class, inversedBy="unitStatuses")
     */
    private $CO;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeqNo(): ?string
    {
        return $this->SeqNo;
    }

    public function setSeqNo(string $SeqNo): self
    {
        $this->SeqNo = $SeqNo;

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

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

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

    public function getUnitChanged(): ?Units
    {
        return $this->UnitChanged;
    }

    public function setUnitChanged(?Units $UnitChanged): self
    {
        $this->UnitChanged = $UnitChanged;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->Comment;
    }

    public function setComment(?string $Comment): self
    {
        $this->Comment = $Comment;

        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->Location;
    }

    public function setLocation(?Location $Location): self
    {
        $this->Location = $Location;

        return $this;
    }

    public function getHigherUnit(): ?Units
    {
        return $this->HigherUnit;
    }

    public function setHigherUnit(?Units $HigherUnit): self
    {
        $this->HigherUnit = $HigherUnit;

        return $this;
    }

    public function getSubCampaign(): ?SubCampaign
    {
        return $this->SubCampaign;
    }

    public function setSubCampaign(?SubCampaign $SubCampaign): self
    {
        $this->SubCampaign = $SubCampaign;

        return $this;
    }

    public function getSubCampaign2(): ?SubCampaign
    {
        return $this->SubCampaign2;
    }

    public function setSubCampaign2(?SubCampaign $SubCampaign2): self
    {
        $this->SubCampaign2 = $SubCampaign2;

        return $this;
    }

    public function getCO(): ?CO
    {
        return $this->CO;
    }

    public function setCO(?CO $CO): self
    {
        $this->CO = $CO;

        return $this;
    }
}
