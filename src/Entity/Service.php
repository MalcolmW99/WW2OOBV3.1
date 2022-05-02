<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $unit;

    /**
     * @ORM\Column(type="date")
     */
    private $DateSelected;

    /**
     * @ORM\Column(type="integer")
     */
    private $country;

    /**
     * @ORM\Column(type="integer")
     */
    private $Subcampaign;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $scstartdate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $scenddate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUnit(): ?int
    {
        return $this->unit;
    }

    public function setUnit(int $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getDateSelected(): ?\DateTimeInterface
    {
        return $this->DateSelected;
    }

    public function setDateSelected(\DateTimeInterface $DateSelected): self
    {
        $this->DateSelected = $DateSelected;

        return $this;
    }

    public function getCountry(): ?int
    {
        return $this->country;
    }

    public function setCountry(int $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getSubcampaign(): ?int
    {
        return $this->Subcampaign;
    }

    public function setSubcampaign(int $Subcampaign): self
    {
        $this->Subcampaign = $Subcampaign;

        return $this;
    }

    public function getScstartdate(): ?\DateTimeInterface
    {
        return $this->scstartdate;
    }

    public function setScstartdate(?\DateTimeInterface $scstartdate): self
    {
        $this->scstartdate = $scstartdate;

        return $this;
    }

    public function getScenddate(): ?\DateTimeInterface
    {
        return $this->scenddate;
    }

    public function setScenddate(?\DateTimeInterface $scenddate): self
    {
        $this->scenddate = $scenddate;

        return $this;
    }
}
