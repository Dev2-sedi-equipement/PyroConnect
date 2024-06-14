<?php

namespace ContainerBUxxZaW;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_EHkmoAHService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.eHkmoAH' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.eHkmoAH'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'cache' => ['services', 'cache.app', 'getCache_AppService', false],
            'clientRepository' => ['privates', 'App\\Repository\\ClientsRepository', 'getClientsRepositoryService', true],
        ], [
            'cache' => '?',
            'clientRepository' => 'App\\Repository\\ClientsRepository',
        ]);
    }
}
