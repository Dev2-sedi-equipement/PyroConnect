<?php
namespace App\Twig\Components;

use App\Entity\Dossiers;
use App\Repository\DossiersRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Metadata\UrlMapping;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;

#[AsLiveComponent('dossierVRP')]
class DossierVRP
{
    use DefaultActionTrait;

    #[LiveProp(writable: true, url: new UrlMapping(as: 'q'))]
    public int $id;
    private Security $security;


    public function __construct(
        private DossiersRepository $dossiersRepository,
        Security $security
    )
    {
        $this->security = $security;
    }

    public function getDossierVRP(): ?Dossiers // Modifier la signature de retour pour autoriser null
    {
        $userId = $this->security->getUser()->getId();
 

        return !empty($this->id)
        ? $this->dossiersRepository->find($this->id)
        : $this->dossiersRepository->findDossiersByVrpId($userId);
    }
}
