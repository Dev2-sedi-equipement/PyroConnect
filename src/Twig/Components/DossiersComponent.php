<?php

namespace App\Twig\Components;

use App\Entity\Dossiers;
use App\Repository\DossiersRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;

#[AsLiveComponent('dossier')]
class DossiersComponent
{
    use DefaultActionTrait;
    public int $id;
    public function __construct(private DossiersRepository $dossiersRepository)
    {
    }

    public function getDossier(): Dossiers
    {   
        // example method that returns an array of Products
        return $this->dossiersRepository->find($this->id);
    }
}