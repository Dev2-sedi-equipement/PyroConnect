<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\PasswordStrength;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;


#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
#[ORM\HasLifecycleCallbacks]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;


    #[ORM\Column]    
    #[Assert\Length(
        min: 12,
        minMessage: "Votre mot de passe doit contenir au moins {{ limit }} caractères."
    )]
    #[Assert\NotBlank(message: "Le mot de passe ne peut pas être vide.")]
    #[Assert\Regex(
        pattern: "/[A-Z]/",
        message: "Votre mot de passe doit contenir au moins une lettre majuscule."
    )]
    #[Assert\Regex(
        pattern: "/[a-z]/",
        message: "Votre mot de passe doit contenir au moins une lettre minuscule."
    )]
    #[Assert\Regex(
        pattern: "/\d/",
        message: "Votre mot de passe doit contenir au moins un chiffre."
    )]
    #[Assert\Regex(
        pattern: "/[@$!%*?&]/",
        message: "Votre mot de passe doit contenir au moins un caractère spécial."
    )]
    private ?string $password = null;
    
    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;
    
    #[ORM\Column(type: 'date_immutable')]
    private ?\DateTimeImmutable $createdAt = null;
    

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastname = null;
  

    #[ORM\Column(nullable: true)]
    #[Assert\Callback(["App\Validator\UserValidator", "validateCodeVrpIfRoleSFOrAdmin"], groups: ["Default"])]
    #[Assert\Callback(["App\Validator\UserValidator", "validateCodeVrpNotNullIfRoleVRP"], groups: ["Default"])]
    #[Assert\Type(type: 'string', message: 'Le code VRP doit être un entier.')]
    private ?string $codeVrp = null;
    
    /**
     * @see UserInterface
     */

     #[ORM\Column(type: 'json')]
     #[Assert\Count(
        max: 2,
        maxMessage: 'Vous devez sélectionner uniquement qu\'un seul rôle.'
    )]
     private array $roles = [];

     #[ORM\OneToMany(mappedBy: 'user', targetEntity: Commentaires::class,cascade: ['remove'])]
     private Collection $user_commentaire;

     #[ORM\Column(nullable: true)]
     private ?\DateTimeImmutable $modified_at = null;

     #[ORM\OneToMany(mappedBy: 'user', targetEntity: Dossiers::class, cascade: ['remove'])]
     private Collection $dossiers;
     

     #[ORM\OneToMany(mappedBy: 'user', targetEntity: ResetPasswordRequest::class, cascade: ['remove'])]
    private Collection $resetPasswordRequests;


     public function __construct()
     {
         $this->user_commentaire = new ArrayCollection();
         $this->dossiers = new ArrayCollection();
         $this->resetPasswordRequests = new ArrayCollection();


     }

    public function __toString()
    {
        return $this->getName(); // Remplacez 'getName()' par la méthode qui retourne la propriété souhaitée
    }

    public function getRoles(): array
    {
        return array_unique($this->roles);
    }
    
     
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
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
        return (string) $this->email;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname = null):self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCodeVrp(): ?string
    {
        return $this->codeVrp;
    }

    public function setCodeVrp(?string $codeVrp): static
    {
        $this->codeVrp = $codeVrp;

        return $this;
    }

    /**
     * @return Collection<int, Commentaires>
     */
    public function getUserCommentaire(): Collection
    {
        return $this->user_commentaire;
    }

    public function addUserCommentaire(Commentaires $userCommentaire): static
    {
        if (!$this->user_commentaire->contains($userCommentaire)) {
            $this->user_commentaire->add($userCommentaire);
            $userCommentaire->setUser($this);
        }

        return $this;
    }

    public function removeUserCommentaire(Commentaires $userCommentaire): static
    {
        if ($this->user_commentaire->removeElement($userCommentaire)) {
            // set the owning side to null (unless already changed)
            if ($userCommentaire->getUser() === $this) {
                $userCommentaire->setUser(null);
            }
        }

        return $this;
    }

    public function getmodifiedAt(): ?\DateTimeImmutable
    {
        return $this->modified_at;
    }

    public function setmodifiedAt(?\DateTimeImmutable $modified_at): static
    {
        $this->modified_at = $modified_at;

        return $this;
    }

    /**
     * @return Collection<int, Dossiers>
     */
    public function getDossiers(): Collection
    {
        return $this->dossiers;
    }

    public function addDossier(Dossiers $dossiers): static
    {
        if (!$this->dossiers->contains($dossiers)) {
            $this->dossiers->add($dossiers);
            $dossiers->setUser($this);
        }

        return $this;
    }

    public function removeDossiers(Dossiers $dossiers): static
    {
        if ($this->dossiers->removeElement($dossiers)) {
            // set the owning side to null (unless already changed)
            if ($dossiers->getUser() === $this) {
                $dossiers->setUser(null);
            }
        }

        return $this;
    }

  // Getter and setter for resetPasswordRequests
  public function getResetPasswordRequests(): Collection
  {
      return $this->resetPasswordRequests;
  }

  public function addResetPasswordRequest(ResetPasswordRequest $resetPasswordRequest): self
  {
      if (!$this->resetPasswordRequests->contains($resetPasswordRequest)) {
          $this->resetPasswordRequests[] = $resetPasswordRequest;
          $resetPasswordRequest->setUser($this);
      }

      return $this;
  }

  public function removeResetPasswordRequest(ResetPasswordRequest $resetPasswordRequest): self
  {
      if ($this->resetPasswordRequests->removeElement($resetPasswordRequest)) {
          // set the owning side to null (unless already changed)
          if ($resetPasswordRequest->getUser() === $this) {
              $resetPasswordRequest->setUser(null);
          }
      }

      return $this;
  }


}

