<?php

namespace App\Entity;

use App\Repository\SubcontinentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubcontinentsRepository::class)
 */
class Subcontinents
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
    private $subcontinent;

    /**
     * @ORM\ManyToOne(targetEntity=Description::class, inversedBy="subcontinents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=LocType::class, inversedBy="subcontinents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $loctype;

    /**
     * @ORM\OneToMany(targetEntity=Theatres::class, mappedBy="subcontinent")
     */
    private $theatres;

    /**
     * @ORM\ManyToOne(targetEntity=Continents::class, inversedBy="subcontinents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $continent;

    /**
     * @ORM\OneToMany(targetEntity=Fronts::class, mappedBy="SubContinent")
     */
    private $fronts;

    public function __construct()
    {
        $this->theatres = new ArrayCollection();
        $this->fronts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubcontinent(): ?string
    {
        return $this->subcontinent;
    }

    public function setSubcontinent(string $subcontinent): self
    {
        $this->subcontinent = $subcontinent;

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
     * @return Collection|Theatres[]
     */
    public function getTheatres(): Collection
    {
        return $this->theatres;
    }

    public function addTheatre(Theatres $theatre): self
    {
        if (!$this->theatres->contains($theatre)) {
            $this->theatres[] = $theatre;
            $theatre->setSubcontinent($this);
        }

        return $this;
    }

    public function removeTheatre(Theatres $theatre): self
    {
        if ($this->theatres->contains($theatre)) {
            $this->theatres->removeElement($theatre);
            // set the owning side to null (unless already changed)
            if ($theatre->getSubcontinent() === $this) {
                $theatre->setSubcontinent(null);
            }
        }

        return $this;
    }

    public function getContinent(): ?Continents
    {
        return $this->continent;
    }

    public function setContinent(?Continents $continent): self
    {
        $this->continent = $continent;

        return $this;
    }

    /**
     * @return Collection|Fronts[]
     */
    public function getFronts(): Collection
    {
        return $this->fronts;
    }

    public function addFront(Fronts $front): self
    {
        if (!$this->fronts->contains($front)) {
            $this->fronts[] = $front;
            $front->setSubContinent($this);
        }

        return $this;
    }

    public function removeFront(Fronts $front): self
    {
        if ($this->fronts->contains($front)) {
            $this->fronts->removeElement($front);
            // set the owning side to null (unless already changed)
            if ($front->getSubContinent() === $this) {
                $front->setSubContinent(null);
            }
        }

        return $this;
    }
}
