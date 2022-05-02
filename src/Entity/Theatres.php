<?php

namespace App\Entity;

use App\Repository\TheatresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TheatresRepository::class)
 */
class Theatres
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $theatre;

    /**
     * @ORM\OneToOne(targetEntity=Description::class, cascade={"persist", "remove"})
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=LocType::class, inversedBy="theatres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $loctype;

    /**
     * @ORM\OneToMany(targetEntity=Countries::class, mappedBy="theatre")
     */
    private $countries;

    /**
     * @ORM\ManyToOne(targetEntity=Subcontinents::class, inversedBy="theatres")
     */
    private $subcontinent;

    /**
     * @ORM\OneToMany(targetEntity=Campaign::class, mappedBy="theatre")
     */
    private $campaigns;

    public function __construct()
    {
        $this->countries = new ArrayCollection();
        $this->campaigns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheatre(): ?string
    {
        return $this->theatre;
    }

    public function setTheatre(string $theatre): self
    {
        $this->theatre = $theatre;

        return $this;
    }

    public function getDescription(): ?description
    {
        return $this->description;
    }

    public function setDescription(?description $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLoctype(): ?LocType
    {
        return $this->loctype;
    }

    public function setLoctype(?LocType $loctype): self
    {
        $this->loctype = $loctype;

        return $this;
    }

    /**
     * @return Collection|Countries[]
     */
    public function getCountries(): Collection
    {
        return $this->countries;
    }

    public function addCountry(Countries $country): self
    {
        if (!$this->countries->contains($country)) {
            $this->countries[] = $country;
            $country->setTheatre($this);
        }

        return $this;
    }

    public function removeCountry(Countries $country): self
    {
        if ($this->countries->contains($country)) {
            $this->countries->removeElement($country);
            // set the owning side to null (unless already changed)
            if ($country->getTheatre() === $this) {
                $country->setTheatre(null);
            }
        }

        return $this;
    }

    public function getSubcontinent(): ?subcontinents
    {
        return $this->subcontinent;
    }

    public function setSubcontinent(?subcontinents $subcontinent): self
    {
        $this->subcontinent = $subcontinent;

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
            $campaign->setTheatre($this);
        }

        return $this;
    }

    public function removeCampaign(Campaign $campaign): self
    {
        if ($this->campaigns->contains($campaign)) {
            $this->campaigns->removeElement($campaign);
            // set the owning side to null (unless already changed)
            if ($campaign->getTheatre() === $this) {
                $campaign->setTheatre(null);
            }
        }

        return $this;
    }
}
