<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\DepartementRepository;

#[ORM\Entity(repositoryClass: DepartementRepository::class)]
class Departement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomDpt = null;

 
    /**
     * @var Collection<int, Dossiers>
     */
    #[ORM\OneToMany(targetEntity: Dossiers::class, mappedBy: 'dpt')]
    private Collection $dossiers;

    public function __construct()
    {
        $this->dossiers = new ArrayCollection();
    }
    public function __toString(): string
    {
        return $this->nomDpt ?? '';
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDpt(): ?string
    {
        return $this->nomDpt;
    }

    public function setNomDpt(string $nomDpt): static
    {
        $this->nomDpt = $nomDpt;

        return $this;
    }




    /**
     * @return Collection<int, Dossiers>
     */
    public function getDossiers(): Collection
    {
        return $this->dossiers;
    }

    public function addDossier(Dossiers $dossier): static
    {
        if (!$this->dossiers->contains($dossier)) {
            $this->dossiers->add($dossier);
            $dossier->setDpt($this);
        }

        return $this;
    }

    public function removeDossier(Dossiers $dossier): static
    {
        if ($this->dossiers->removeElement($dossier)) {
            // set the owning side to null (unless already changed)
            if ($dossier->getDpt() === $this) {
                $dossier->setDpt(null);
            }
        }

        return $this;
    }
}
