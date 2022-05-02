<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatusRepository::class)
 */
class Status
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
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=UnitStatus::class, mappedBy="status")
     */
    private $unitStatuses;

    public function __construct()
    {
        $this->unitStatuses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|UnitStatus[]
     */
    public function getUnitStatuses(): Collection
    {
        return $this->unitStatuses;
    }

    public function addUnitStatus(UnitStatus $unitStatus): self
    {
        if (!$this->unitStatuses->contains($unitStatus)) {
            $this->unitStatuses[] = $unitStatus;
            $unitStatus->setStatus($this);
        }

        return $this;
    }

    public function removeUnitStatus(UnitStatus $unitStatus): self
    {
        if ($this->unitStatuses->contains($unitStatus)) {
            $this->unitStatuses->removeElement($unitStatus);
            // set the owning side to null (unless already changed)
            if ($unitStatus->getStatus() === $this) {
                $unitStatus->setStatus(null);
            }
        }

        return $this;
    }
}
