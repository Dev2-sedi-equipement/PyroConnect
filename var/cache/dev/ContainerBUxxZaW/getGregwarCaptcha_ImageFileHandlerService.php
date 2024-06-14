<?php

namespace ContainerBUxxZaW;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGregwarCaptcha_ImageFileHandlerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'gregwar_captcha.image_file_handler' shared service.
     *
     * @return \Gregwar\CaptchaBundle\Generator\ImageFileHandler
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/gregwar/captcha-bundle/Generator/ImageFileHandler.php';

        return $container->services['gregwar_captcha.image_file_handler'] = new \Gregwar\CaptchaBundle\Generator\ImageFileHandler('captcha', (\dirname(__DIR__, 4).'/public'), 100, 60);
    }
}