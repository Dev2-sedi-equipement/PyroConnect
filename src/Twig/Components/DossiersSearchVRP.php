<?php
namespace App\Twig\Components;

use App\Repository\DossiersRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Metadata\UrlMapping;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;

#[AsLiveComponent('dossiers_searchVRP')]
final class DossiersSearchVRP
{
    use DefaultActionTrait;

    #[LiveProp(writable: true, url: new UrlMapping(as: 'q'))]

    public ?string $query = "";
    public ?string $tri = "";

    private Security $security;

    public function __construct(
        private DossiersRepository $dossiersRepository,
        Security $security
    )
    {
        $this->security = $security;
    }

    public function getDossiersSearchVRP(): array
    {
        $userId = $this->security->getUser()->getId();
        $sortOrder = $_GET['sortOrder'] ?? "desc";

        return !empty($this->query)
        ? $this->dossiersRepository->findByQueryAndUserId($this->query, $userId, $sortOrder)
        : $this->dossiersRepository->findDossiersByVrpId($userId, $sortOrder);
    }

}

