<?php

namespace App\Entity;

use DateTimeImmutable;
use App\Entity\Clients;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\DossiersRepository;
use Symfony\UX\Turbo\Attribute\Broadcast;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;


#[ORM\Entity(repositoryClass: DossiersRepository::class)]
class Dossiers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column]

    private ?int $montant = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbPersonnel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomPersonnel = null;

    #[ORM\Column(length: 15)]
  
    private ?string $typeFeu = null;

    #[ORM\Column]
    private ?DateTimeImmutable $dateCreation = null;

    #[ORM\Column]
    private ?DateTimeImmutable  $dateTir = null;
    

    #[ORM\Column(nullable: true)]
    private ?DateTimeImmutable $dateModificationSF = null;

    #[ORM\Column(nullable: true)]
    private ?DateTimeImmutable $dateModificationVRP = null;

    #[ORM\Column(nullable: true)]
    private ?bool $lectureSF = null;

    #[ORM\Column(nullable: true)]
    private ?bool $lectureVRP = null;

    #[ORM\OneToMany(mappedBy: 'dossiers', targetEntity: Commentaires::class, cascade: ['persist', 'remove'])]
    private Collection $dossier_commentaire;

    #[ORM\Column]
    private ?int $createurDossier = null;


    #[ORM\ManyToOne(targetEntity: Statut::class, inversedBy: 'dossiers')]
    private ?Statut $statut = null;

    #[ORM\Column(nullable: true)]
    private ?int $assignVrp = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'dossiers')]
    private ?User $user = null;


    #[ORM\Column(length: 60)]
    private ?string $nomVrp = null;

    #[ORM\ManyToOne]
    private ?User $lockedBy = null;

    #[ORM\Column(nullable: true)]
    private ?bool $transmis = null;

    #[ORM\Column(nullable: true)]
    private ?bool $declarationPrefecture = null;

    #[ORM\Column(nullable: true)]
    private ?bool $contratArtificier = null;

    #[ORM\ManyToOne(inversedBy: 'dossiers')]
    
    private ?Departement $dpt = null;  

    #[ORM\Column(nullable: false)]
    private ?string $clientId = null;  



    private ?string $userId = null;  
      
    private ?string $data_name = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $dateLocked = null;

    public function __construct()
    {
        $this->dossier_commentaire = new ArrayCollection();
        $this->dateCreation = new DateTimeImmutable(); // La valeur par défaut est définie ici
        
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string  $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(?int $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getNbPersonnel(): ?int
    {
        return $this->nbPersonnel;
    }

    public function setNbPersonnel(int $nbPersonnel): static
    {
        $this->nbPersonnel = $nbPersonnel;

        return $this;
    }

    public function getNomPersonnel(): ?string
    {
        return $this->nomPersonnel;
    }

    public function setNomPersonnel(?string $nomPersonnel): static
    {
        $this->nomPersonnel = $nomPersonnel;

        return $this;
    }

    public function getTypeFeu(): ?string
    {
        return $this->typeFeu;
    }

    public function setTypeFeu(string $typeFeu): static
    {
        $this->typeFeu = $typeFeu;

        return $this;
    }

    public function getDateCreation(): DateTimeImmutable
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeImmutable $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateTir(): DateTimeImmutable 
    {
        return $this->dateTir;
    }

    public function setDateTir(DateTimeImmutable  $dateTir): static
    {
        $this->dateTir = $dateTir;

        return $this;
    }

    public function getDateModificationSF(): DateTimeImmutable
    {
        return $this->dateModificationSF;
    }

    public function setDateModificationSF(?DateTimeImmutable $dateModificationSF): static
    {
        $this->dateModificationSF = $dateModificationSF;
    
        return $this;
    }
    

    public function getDateModificationVRP(): DateTimeImmutable
    {
        return $this->dateModificationVRP;
    }

    public function setDateModificationVRP(?DateTimeImmutable $dateModificationVRP): static
    {
        $this->dateModificationVRP = $dateModificationVRP;

        return $this;
    }

    public function isLectureSF(): ?bool
    {
        return $this->lectureSF;
    }

    public function setLectureSF(?bool $lectureSF): static
    {
        $this->lectureSF = $lectureSF;

        return $this;
    }

    public function isLectureVRP(): ?bool
    {
        return $this->lectureVRP;
    }

    public function setLectureVRP(?bool $lectureVRP): static
    {
        $this->lectureVRP = $lectureVRP;

        return $this;
    }

    /**
     * @return Collection<int, Commentaires>
     */
    public function getDossierCommentaire(): Collection
    {
        return $this->dossier_commentaire;
    }

    public function addDossierCommentaire(Commentaires $dossierCommentaire): static
    {
        if (!$this->dossier_commentaire->contains($dossierCommentaire)) {
            $this->dossier_commentaire->add($dossierCommentaire);
            $dossierCommentaire->setDossiers($this);
        }

        return $this;
    }

    public function removeDossierCommentaire(Commentaires $dossierCommentaire): static
    {
        if ($this->dossier_commentaire->removeElement($dossierCommentaire)) {
            // set the owning side to null (unless already changed)
            if ($dossierCommentaire->getDossiers() === $this) {
                $dossierCommentaire->setDossiers(null);
            }
        }

        return $this;
    }

    public function getCreateurDossier(): ?int
    {
        return $this->createurDossier;
    }

    public function setCreateurDossier(int $createurDossier): static
    {
        $this->createurDossier = $createurDossier;

        return $this;
    }

    public function getStatut(): ?Statut
    {
        return $this->statut;
    }

    public function setStatut(?Statut $statut): static
    {
        $this->statut = $statut;
    
        return $this;
    }
    

    public function getAssignVrp(): ?int
    {
        return $this->assignVrp;
    }
    

    public function setAssignVrp(?int $assignVrp): static
    {
        $this->assignVrp = $assignVrp;

        return $this;
    }


    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of nomVrp
     *
     * @return ?string
     */
    public function getNomVrp(): ?string
    {
        return $this->nomVrp;
    }

    /**
     * Set the value of nomVrp
     *
     * @param ?string $nomVrp
     *
     * @return self
     */
    public function setNomVrp(?string $nomVrp): self
    {
        $this->nomVrp = $nomVrp;

        return $this;
    }

    public function getLockedBy(): ?User
    {
        return $this->lockedBy;
    }

    public function setLockedBy(?User $lockedBy): static
    {
        $this->lockedBy = $lockedBy;

        return $this;
    }



    public function unlock(): void
    {
        $this->lockedBy = null;
    }

    public function isLocked(): bool
    {
        return $this->lockedBy !== null;
    }

    public function isTransmis(): ?bool
    {
        return $this->transmis;
    }

    public function setTransmis(?bool $transmis): static
    {
        $this->transmis = $transmis;

        return $this;
    }

    public function isDeclarationPrefecture(): ?bool
    {
        return $this->declarationPrefecture;
    }

    public function setDeclarationPrefecture(?bool $declarationPrefecture): static
    {
        $this->declarationPrefecture = $declarationPrefecture;

        return $this;
    }

    public function isContratArtificier(): ?bool
    {
        return $this->contratArtificier;
    }

    public function setContratArtificier(?bool $contratArtificier): static
    {
        $this->contratArtificier = $contratArtificier;

        return $this;
    }

    public function getDpt(): ?Departement
    {
        return $this->dpt;
    }

    public function setDpt(?Departement $dpt): static
    {
        $this->dpt = $dpt;

        return $this;
    }

    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    public function setClientId(?string $clientId): static
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function setUserId(?string $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getDataName(): ?string
    {
        return $this->data_name;
    }
    public function setDataName(?string $data_name): static
    {
        $this->data_name = $data_name;

        return $this;
    }

    public function getDateLocked(): ?\DateTimeImmutable
    {
        return $this->dateLocked;
    }

    public function setDateLocked(?\DateTimeImmutable $dateLocked): static
    {
        $this->dateLocked = $dateLocked;

        return $this;
    }


}
