<?php
namespace App\Twig\Components;

use App\Repository\UserRepository;
use App\Repository\DossiersRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Metadata\UrlMapping;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsLiveComponent('dossiers_search')]
final class DossiersSearch
{
    use DefaultActionTrait;

    #[LiveProp(writable: true, url: new UrlMapping(as: 'q'))]

    public ?string $query = "";
    public ?string $keyword = null; // Initialize $keyword to null
    public ?array $dossiers = null;
    public ?object $user = null;

    private Security $security;

    public function __construct(
        private DossiersRepository $dossiersRepository,
        Security $security
    )
    {
        $this->security = $security;
    }

    public function getDossiersSearch(): array
    {
        // Récupérer l'utilisateur actuel
        $user = $this->security->getUser();
    
        // Récupérer les dossiers
        $dossiers = (!empty($this->query))
            ? $this->dossiersRepository->findByQuery($this->query)
            : $this->dossiersRepository->findDossiersWithFireWorksRecents();
    
    
        return $dossiers;
    }

    public function findAllTraiteDossiers(string $sortOrder): array
    {
        $statut = "Traité";
        return $this->dossiersRepository->findAllTraiteDossiers($sortOrder, $statut);
    }
    
}
