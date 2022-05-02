<?php

namespace App\Entity;

use App\Repository\HeadlineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HeadlineRepository::class)
 */
class Headline
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
    private $date;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Headline;

    /**
     * @ORM\OneToMany(targetEntity=Detail::class, mappedBy="headline")
     */
    private $details;

    /**
     * @ORM\ManyToOne(targetEntity=SubCampaign::class, inversedBy="headlines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subcampaign;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->headline;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeadline(): ?string
    {
        return $this->Headline;
    }

    public function setHeadline(string $Headline): self
    {
        $this->Headline = $Headline;

        return $this;
    }

    /**
     * @return Collection|Detail[]
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(Detail $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setHeadline($this);
        }

        return $this;
    }

    public function removeDetail(Detail $detail): self
    {
        if ($this->details->contains($detail)) {
            $this->details->removeElement($detail);
            // set the owning side to null (unless already changed)
            if ($detail->getHeadline() === $this) {
                $detail->setHeadline(null);
            }
        }

        return $this;
    }

    public function getSubcampaign(): ?SubCampaign
    {
        return $this->subcampaign;
    }

    public function setSubcampaign(?SubCampaign $subcampaign): self
    {
        $this->subcampaign = $subcampaign;

        return $this;
    }
}
