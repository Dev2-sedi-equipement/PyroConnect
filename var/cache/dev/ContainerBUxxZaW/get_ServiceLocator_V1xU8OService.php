<?php

namespace ContainerBUxxZaW;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_V1xU8OService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.v1x_U8O' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.v1x_U8O'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'dossier' => ['privates', '.errored..service_locator.v1x_U8O.App\\Entity\\Dossiers', NULL, 'Cannot autowire service ".service_locator.v1x_U8O": it needs an instance of "App\\Entity\\Dossiers" but this type has been excluded in "config/services.yaml".'],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'notificationRepository' => ['privates', 'App\\Repository\\NotificationRepository', 'getNotificationRepositoryService', true],
            'security' => ['privates', 'security.helper', 'getSecurity_HelperService', false],
            'userRepository' => ['privates', 'App\\Repository\\UserRepository', 'getUserRepositoryService', true],
        ], [
            'dossier' => 'App\\Entity\\Dossiers',
            'entityManager' => '?',
            'notificationRepository' => 'App\\Repository\\NotificationRepository',
            'security' => '?',
            'userRepository' => 'App\\Repository\\UserRepository',
        ]);
    }
}
