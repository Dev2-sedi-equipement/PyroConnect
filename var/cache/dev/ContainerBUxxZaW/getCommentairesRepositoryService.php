<?php

namespace ContainerBUxxZaW;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCommentairesRepositoryService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Repository\CommentairesRepository' shared autowired service.
     *
     * @return \App\Repository\CommentairesRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Repository/CommentairesRepository.php';

        return $container->privates['App\\Repository\\CommentairesRepository'] = new \App\Repository\CommentairesRepository(($container->services['doctrine'] ?? self::getDoctrineService($container)));
    }
}