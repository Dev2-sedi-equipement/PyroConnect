<?php

namespace App\Entity;

use App\Entity\Dossiers;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ClientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: ClientsRepository::class)]
class Clients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;
     
    #[ORM\Column]
    private ?string $codeClient = null;
    
    #[ORM\Column]
    private ?int $codeInsee = null;


    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column]
    private ?int $codeDpt = null;

    #[ORM\Column(length: 255)]
    private ?string $codeVrp = null;

    #[ORM\Column]
    private ?int $idUser = null;
    



    public function getId()
    {
        return $this->id;
    }



    /**
     * Get the value of codeClient
     */ 
    public function getCodeClient(): ?string
    {
        return $this->codeClient;
    }

    /**
     * Set the value of codeClient
     *
     * @return  self
     */ 
    public function setCodeClient(string $codeClient): static
    {
        $this->codeClient = $codeClient;

        return $this;
    }
    
    public function getCodeInsee(): ?int
    {
        return $this->codeInsee;
    }

    public function setCodeInsee(int $codeInsee): static
    {
        $this->codeInsee = $codeInsee;

        return $this;
    }


    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodeDpt(): ?int
    {
        return $this->codeDpt;
    }

    public function setCodeDpt(?int $codeDpt): static
    {
        $this->codeDpt = $codeDpt;

        return $this;
    }

    public function getCodeVrp(): ?string
    {
        return $this->codeVrp;
    }

    public function setCodeVrp(string $codeVrp): static
    {
        $this->codeVrp = $codeVrp;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }




}
