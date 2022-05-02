<?php

namespace App\Entity;

use App\Repository\ContinentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContinentsRepository::class)
 */
class Continents
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $continent;

    /**
     * @ORM\ManyToOne(targetEntity=Description::class)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=LocType::class, inversedBy="continents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $loctype;

    /**
     * @ORM\ManyToOne(targetEntity=SubCampaign::class, inversedBy="continents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subcampaign;

    /**
     * @ORM\OneToMany(targetEntity=Subcontinents::class, mappedBy="continent")
     */
    private $subcontinents;

    public function __construct()
    {
        $this->subcontinents = new ArrayCollection();
    }

     public function getId(): ?int
    {
        return $this->id;
    }

    public function getContinent(): ?string
    {
        return $this->continent;
    }

    public function setContinent(string $continent): self
    {
        $this->continent = $continent;

        return $this;
    }

    public function getDescription(): ?Description
    {
        return $this->description;
    }

    public function setDescription(?Description $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getloctype(): ?LocType
    {
        return $this->loctype;
    }

    public function setloctype(?LocType $loctype): self
    {
        $this->LocType = $loctype;

        return $this;
    }

    public function getsubcampaign(): ?SubCampaign
    {
        return $this->subcampaign;
    }

    public function setsubcampaign(?SubCampaign $subcampaign): self
    {
        $this->subcampaign = $subcampaign;

        return $this;
    }

    /**
     * @return Collection|Subcontinents[]
     */
    public function getSubcontinents(): Collection
    {
        return $this->subcontinents;
    }

    public function addSubcontinent(Subcontinents $subcontinent): self
    {
        if (!$this->subcontinents->contains($subcontinent)) {
            $this->subcontinents[] = $subcontinent;
            $subcontinent->setContinent($this);
        }

        return $this;
    }

    public function removeSubcontinent(Subcontinents $subcontinent): self
    {
        if ($this->subcontinents->contains($subcontinent)) {
            $this->subcontinents->removeElement($subcontinent);
            // set the owning side to null (unless already changed)
            if ($subcontinent->getContinent() === $this) {
                $subcontinent->setContinent(null);
            }
        }

        return $this;
    }


}
