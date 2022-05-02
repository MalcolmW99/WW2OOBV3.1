<?php

namespace App\Entity;

use App\Repository\EquipmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipmentRepository::class)
 */
class Equipment
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
    private $Name;

    /**
     * @ORM\OneToMany(targetEntity=UnitEqup::class, mappedBy="Equipment")
     */
    private $unitEqups;

    public function __construct()
    {
        $this->unitEqups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection|UnitEqup[]
     */
    public function getUnitEqups(): Collection
    {
        return $this->unitEqups;
    }

    public function addUnitEqup(UnitEqup $unitEqup): self
    {
        if (!$this->unitEqups->contains($unitEqup)) {
            $this->unitEqups[] = $unitEqup;
            $unitEqup->setEquipment($this);
        }

        return $this;
    }

    public function removeUnitEqup(UnitEqup $unitEqup): self
    {
        if ($this->unitEqups->contains($unitEqup)) {
            $this->unitEqups->removeElement($unitEqup);
            // set the owning side to null (unless already changed)
            if ($unitEqup->getEquipment() === $this) {
                $unitEqup->setEquipment(null);
            }
        }

        return $this;
    }
}
