<?php

namespace App\Entity;

use App\Repository\CommentairesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentairesRepository::class)]
class Commentaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $message = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $dateCommentaire = null;

    #[ORM\ManyToOne(inversedBy: 'user_commentaire')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'dossier_commentaire')]
    private ?Dossiers $dossiers = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getDateCommentaire(): ?\DateTimeImmutable
    {
        return $this->dateCommentaire;
    }

    public function setDateCommentaire(\DateTimeImmutable $dateCommentaire): static
    {
        $this->dateCommentaire = $dateCommentaire;

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

    public function getDossiers(): ?Dossiers
    {
        return $this->dossiers;
    }

    public function setDossiers(?Dossiers $dossiers): static
    {
        $this->dossiers = $dossiers;

        return $this;
    }
}
