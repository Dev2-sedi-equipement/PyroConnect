<?php
namespace App\Command;

use DateInterval;
use DateTimeZone;
use App\Entity\RemoteAddress;
use App\Repository\DossiersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\EventDispatcher\Event;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

#[AsCommand(
    name: 'CheckInactiveFile',
    description: 'Check for inactive dossiers and unlock them if necessary',
)]
class CheckInactiveFileCommand extends Command
{
    private $entityManager;
    private $dossierRepository;
    private $router;
    private $dispatcher;
    private $cache;

    public function __construct(EntityManagerInterface $entityManager, DossiersRepository $dossierRepository, RouterInterface $router,EventDispatcherInterface $dispatcher)
    {
        $this->entityManager = $entityManager;
        $this->dossierRepository = $dossierRepository;
        $this->router = $router;
        $this->dispatcher = $dispatcher;
        $this->cache = new FilesystemAdapter();

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
    
        // Instanciation de la classe RemoteAddress
        $remoteAddress = new RemoteAddress();
    
        // Récupérer tous les dossiers verrouillés
        $dossiers = $this->dossierRepository->findLockedDossiers();
    
        if (empty($dossiers)) {
            // Aucun dossier verrouillé trouvé
            $io->success('No dossier locked : Command : success');
            return Command::SUCCESS;
        }
    
        foreach ($dossiers as $dossier) {
            // Vérifier si l'utilisateur est toujours actif sur la page
            $isActive = $this->checkUserPresence($dossier->getId());
        
            if (!$isActive) {
                // Déverrouiller le dossier
                $dossier->unlock();
                
                // Supprimer l'entrée du cache correspondante
                $this->cache->getItem('presence_' . $dossier->getId());
                $this->cache->deleteItem('presence_' . $dossier->getId());
                
                $this->entityManager->flush();
            
                $io->success('Dossier unlocked: ' . $dossier->getId());
            } else {
                $currentDate = (new \DateTimeImmutable('now', new DateTimeZone('Europe/Paris')))->format('Y-m-d H:i:s');
                $dateToUnlock = $dossier->getDateLocked()->modify('+5 secondes')->format('Y-m-d H:i:s');
                if ($currentDate >= $dateToUnlock) {
                    // Planifiez un événement pour déverrouiller le dossier après 10 secondes
                    $this->dispatcher->addListener('unlock_dossier', function (Event $event) use ($dossier, $io) {
                        $dossier->unlock();
                        $dossier->setDateLocked(null);
                        $this->entityManager->flush();
                        $io->success('Dossier unlocked : ' . $dossier->getId());
                    });
                } else {
                    $io->info('Le dossier n\'est pas encore unlock : ' . $dossier->getId());
                }
            }
            
            
        }
        
        // Dispatch de l'événement en dehors de la boucle
        $this->dispatcher->dispatch(new Event(),'unlock_dossier');
        return Command::SUCCESS; // Arrêter la boucle si un utilisateur est présent

        
    
    }
    

    private function checkUserPresence($dossierId)
    {
        // Utiliser le cache pour vérifier la présence de l'utilisateur
        $cacheItem = $this->cache->getItem('presence_' . $dossierId);

        return $cacheItem->isHit() && $cacheItem->get();
    }
}
