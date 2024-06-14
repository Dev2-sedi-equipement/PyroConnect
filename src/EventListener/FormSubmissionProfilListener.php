<?php

namespace App\EventListener;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Event\PostUpdateEventArgs;
use Symfony\Contracts\Cache\CacheInterface;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;

#[AsEntityListener(event: 'preUpdate', method: 'preUpdate', entity: User::class)]
class FormSubmissionProfilListener
{
    private $cache;
    private $userRepository;

    public function __construct(CacheInterface $cache, UserRepository $userRepository)
    {
        $this->cache = $cache;
        $this->userRepository = $userRepository;
    }

    public function preUpdate(User $user, PreUpdateEventArgs $event): void
    {
        // Supprimer le cache seulement si les champs de l'utilisateur ont été modifiés
        if ($event->hasChangedField('password')) {
          
            // Mettre à jour les données de l'utilisateur dans le cache
            $this->cache->get('user_data', function ($item) use ($user) {
                // Définir l'expiration du cache à 10 minutes
                $item->expiresAfter(200);
             
                // Récupérer les données de l'utilisateur à partir de l'entité User
                return $user;
            });
        }
    }
}
