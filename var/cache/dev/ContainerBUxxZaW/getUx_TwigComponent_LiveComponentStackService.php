<?php

namespace ContainerBUxxZaW;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUx_TwigComponent_LiveComponentStackService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'ux.twig_component.live_component_stack' shared service.
     *
     * @return \Symfony\UX\LiveComponent\Util\LiveComponentStack
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/ux-twig-component/src/ComponentStack.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/ux-live-component/src/Util/LiveComponentStack.php';

        return $container->privates['ux.twig_component.live_component_stack'] = new \Symfony\UX\LiveComponent\Util\LiveComponentStack(($container->privates['ux.twig_component.component_stack'] ??= new \Symfony\UX\TwigComponent\ComponentStack()));
    }
}
