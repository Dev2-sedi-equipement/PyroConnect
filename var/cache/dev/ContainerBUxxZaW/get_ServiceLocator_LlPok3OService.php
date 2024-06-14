<?php

namespace ContainerBUxxZaW;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_LlPok3OService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.LlPok3O' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.LlPok3O'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'dossiersRepository' => ['privates', 'App\\Repository\\DossiersRepository', 'getDossiersRepositoryService', false],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'notificationRepository' => ['privates', 'App\\Repository\\NotificationRepository', 'getNotificationRepositoryService', true],
            'security' => ['privates', 'security.helper', 'getSecurity_HelperService', false],
        ], [
            'dossiersRepository' => 'App\\Repository\\DossiersRepository',
            'entityManager' => '?',
            'notificationRepository' => 'App\\Repository\\NotificationRepository',
            'security' => '?',
        ]);
    }
}