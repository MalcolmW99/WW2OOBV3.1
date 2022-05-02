<?php

namespace App\Entity;

use App\Repository\DetailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DetailRepository::class)
 */
class Detail
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $Detail;

    /**
     * @ORM\ManyToOne(targetEntity=headline::class, inversedBy="details")
     * @ORM\JoinColumn(nullable=false)
     */
    private $headline;

    public function __toString(): string
    {
        return (string) $this->getDetail();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDetail(): ?string
    {
        return $this->Detail;
    }

    public function setDetail(string $Detail): self
    {
        $this->Detail = $Detail;

        return $this;
    }

    public function getHeadline(): ?headline
    {
        return $this->headline;
    }

    public function setHeadline(?headline $headline): self
    {
        $this->headline = $headline;

        return $this;
    }
}
