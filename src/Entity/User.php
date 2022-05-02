<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("user:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups("user:read")
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("user:read")
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    private $plainPassword;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

        /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $SelectedDate;

    /**
     * @ORM\ManyToOne(targetEntity=Units::class, inversedBy="users")
     */
    private $Unit;

    /**
     * @ORM\ManyToOne(targetEntity=Countries::class, inversedBy="users")
     */
    private $Country;

    /**
     * @ORM\ManyToOne(targetEntity=SubCampaign::class, inversedBy="users")
     */
    private $Subcampaign;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $SCStartDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $SCEndDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string)$this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string)$this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * This method can be removed in Symfony 6.0 - is not needed for apps that do not check user passwords.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

   public function getDisplayName(): string
    {
        return $this->getFirstName() ?: $this->getEmail();
    }

    public function getIsVerified(): ?bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getSelectedDate(): ?\DateTimeInterface
    {
        return $this->SelectedDate;
    }

    public function setSelectedDate(?\DateTimeInterface $SelectedDate): self
    {
        $this->SelectedDate = $SelectedDate;

        return $this;
    }

    public function getUnit(): ?Units
    {
        return $this->Unit;
    }

    public function setUnit(?Units $Unit): self
    {
        $this->Unit = $Unit;

        return $this;
    }

    public function getCountry(): ?Countries
    {
        return $this->Country;
    }

    public function setCountry(?Countries $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    public function getSubcampaign(): ?Subcampaign
    {
        return $this->Subcampaign;
    }

    public function setSubcampaign(?SubCampaign $Subcampaign): self
    {
        $this->Subcampaign = $Subcampaign;

        return $this;
    }

    public function getSCStartDate(): ?\DateTimeInterface
    {
        return $this->SCStartDate;
    }

    public function setSCStartDate(?\DateTimeInterface $SCStartDate): self
    {
        $this->SCStartDate = $SCStartDate;

        return $this;
    }

    public function getSCEndDate(): ?\DateTimeInterface
    {
        return $this->SCEndDate;
    }

    public function setSCEndDate(?\DateTimeInterface $SCEndDate): self
    {
        $this->SCEndDate = $SCEndDate;

        return $this;
    }
}
