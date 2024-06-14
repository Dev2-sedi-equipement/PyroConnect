<?php

namespace ContainerBUxxZaW;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_GU4yq_CService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.gU4yq.C' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.gU4yq.C'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'dossiersRepository' => ['privates', 'App\\Repository\\DossiersRepository', 'getDossiersRepositoryService', false],
            'serializer' => ['privates', 'debug.serializer', 'getDebug_SerializerService', false],
        ], [
            'dossiersRepository' => 'App\\Repository\\DossiersRepository',
            'serializer' => '?',
        ]);
    }
}