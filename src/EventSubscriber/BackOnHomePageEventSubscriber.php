<?php

namespace App\EventSubscriber;

use App\Repository\DossiersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class BackOnHomePageEventSubscriber implements EventSubscriberInterface
{
    private $dossiersRepository;
    private $entityManager;
    private $security;

    public function __construct(DossiersRepository $dossiersRepository, EntityManagerInterface $entityManager, Security $security)
    {
        $this->dossiersRepository = $dossiersRepository;
        $this->entityManager = $entityManager;
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
        ];
    }


    public function onKernelRequest(RequestEvent $event)
    {
        // Récupérer l'utilisateur authentifié 
        $user = $this->security->getUser();
    
        $request = $event->getRequest();
    
        // Récupérer le chemin de l'URL actuelle
        $currentPath = $request->getPathInfo();
    
        // Vérifier si la requête est de type POST pour la création d'un nouveau dossier
        if ($currentPath === '/' || $currentPath === '/vrp') {
        
            // Vérifier si l'utilisateur est authentifié
            if ($user) {
                // Déverrouiller tous les dossiers verrouillés par cet utilisateur
                $dossiers = $this->dossiersRepository->findBy(['lockedBy' => $user]);
                foreach ($dossiers as $dossier) {
                $dossier->setDateLocked(null);
                $dossier->unlock();
                    $this->entityManager->persist($dossier);
                }
                // Enregistrer les modifications
                $this->entityManager->flush();
            }
        }
    }
    
}
