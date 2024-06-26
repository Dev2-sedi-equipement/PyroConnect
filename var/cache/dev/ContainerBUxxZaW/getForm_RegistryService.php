<?php

namespace ContainerBUxxZaW;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getForm_RegistryService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'form.registry' shared service.
     *
     * @return \Symfony\Component\Form\FormRegistry
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormRegistryInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormRegistry.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormExtensionInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/Extension/DependencyInjection/DependencyInjectionExtension.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/ResolvedFormTypeFactoryInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/Extension/DataCollector/Proxy/ResolvedTypeFactoryDataCollectorProxy.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/ResolvedFormTypeFactory.php';

        return $container->privates['form.registry'] = new \Symfony\Component\Form\FormRegistry([new \Symfony\Component\Form\Extension\DependencyInjection\DependencyInjectionExtension(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'App\\Form\\ChangePasswordFormType' => ['privates', 'App\\Form\\ChangePasswordFormType', 'getChangePasswordFormTypeService', true],
            'App\\Form\\CommentairesType' => ['privates', 'App\\Form\\CommentairesType', 'getCommentairesTypeService', true],
            'App\\Form\\ContactServiceInformatiqueType' => ['privates', 'App\\Form\\ContactServiceInformatiqueType', 'getContactServiceInformatiqueTypeService', true],
            'App\\Form\\DossiersEditArchiveType' => ['privates', 'App\\Form\\DossiersEditArchiveType', 'getDossiersEditArchiveTypeService', true],
            'App\\Form\\DossiersEditType' => ['privates', 'App\\Form\\DossiersEditType', 'getDossiersEditTypeService', true],
            'App\\Form\\DossiersNomPersonnelTirType' => ['privates', 'App\\Form\\DossiersNomPersonnelTirType', 'getDossiersNomPersonnelTirTypeService', true],
            'App\\Form\\DossiersSearchType' => ['privates', 'App\\Form\\DossiersSearchType', 'getDossiersSearchTypeService', true],
            'App\\Form\\DossiersType' => ['privates', 'App\\Form\\DossiersType', 'getDossiersTypeService', true],
            'App\\Form\\GregwarCaptchaType' => ['privates', 'App\\Form\\GregwarCaptchaType', 'getGregwarCaptchaTypeService', true],
            'App\\Form\\Notification1Type' => ['privates', 'App\\Form\\Notification1Type', 'getNotification1TypeService', true],
            'App\\Form\\NotificationType' => ['privates', 'App\\Form\\NotificationType', 'getNotificationTypeService', true],
            'App\\Form\\NotificationsType' => ['privates', 'App\\Form\\NotificationsType', 'getNotificationsTypeService', true],
            'App\\Form\\RegistrationFormType' => ['privates', 'App\\Form\\RegistrationFormType', 'getRegistrationFormTypeService', true],
            'App\\Form\\ResetPasswordRequestFormType' => ['privates', 'App\\Form\\ResetPasswordRequestFormType', 'getResetPasswordRequestFormTypeService', true],
            'App\\Form\\RolesType' => ['privates', 'App\\Form\\RolesType', 'getRolesTypeService', true],
            'App\\Form\\Type\\UserSelectionType' => ['privates', 'App\\Form\\Type\\UserSelectionType', 'getUserSelectionTypeService', true],
            'App\\Form\\UserSelectionNameType' => ['privates', 'App\\Form\\UserSelectionNameType', 'getUserSelectionNameTypeService', true],
            'App\\Form\\UserSelectionType' => ['privates', 'App\\Form\\UserSelectionType', 'getUserSelectionType2Service', true],
            'App\\Form\\UserType' => ['privates', 'App\\Form\\UserType', 'getUserTypeService', true],
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\CrudFormType' => ['privates', 'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\CrudFormType', 'getCrudFormTypeService', true],
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\FileUploadType' => ['privates', 'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\FileUploadType', 'getFileUploadTypeService', true],
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\FiltersFormType' => ['privates', 'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\FiltersFormType', 'getFiltersFormTypeService', true],
            'Gregwar\\CaptchaBundle\\Type\\CaptchaType' => ['services', 'gregwar_captcha.type', 'getGregwarCaptcha_TypeService', true],
            'Symfony\\Bridge\\Doctrine\\Form\\Type\\EntityType' => ['privates', 'form.type.entity', 'getForm_Type_EntityService', true],
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType' => ['privates', 'form.type.choice', 'getForm_Type_ChoiceService', true],
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\ColorType' => ['privates', 'form.type.color', 'getForm_Type_ColorService', true],
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\FileType' => ['privates', 'form.type.file', 'getForm_Type_FileService', true],
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => ['privates', 'form.type.form', 'getForm_Type_FormService', true],
            'Symfony\\UX\\LiveComponent\\Form\\Type\\LiveCollectionType' => ['privates', 'form.live_collection', 'getForm_LiveCollectionService', true],
        ], [
            'App\\Form\\ChangePasswordFormType' => '?',
            'App\\Form\\CommentairesType' => '?',
            'App\\Form\\ContactServiceInformatiqueType' => '?',
            'App\\Form\\DossiersEditArchiveType' => '?',
            'App\\Form\\DossiersEditType' => '?',
            'App\\Form\\DossiersNomPersonnelTirType' => '?',
            'App\\Form\\DossiersSearchType' => '?',
            'App\\Form\\DossiersType' => '?',
            'App\\Form\\GregwarCaptchaType' => '?',
            'App\\Form\\Notification1Type' => '?',
            'App\\Form\\NotificationType' => '?',
            'App\\Form\\NotificationsType' => '?',
            'App\\Form\\RegistrationFormType' => '?',
            'App\\Form\\ResetPasswordRequestFormType' => '?',
            'App\\Form\\RolesType' => '?',
            'App\\Form\\Type\\UserSelectionType' => '?',
            'App\\Form\\UserSelectionNameType' => '?',
            'App\\Form\\UserSelectionType' => '?',
            'App\\Form\\UserType' => '?',
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\CrudFormType' => '?',
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\FileUploadType' => '?',
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\FiltersFormType' => '?',
            'Gregwar\\CaptchaBundle\\Type\\CaptchaType' => '?',
            'Symfony\\Bridge\\Doctrine\\Form\\Type\\EntityType' => '?',
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType' => '?',
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\ColorType' => '?',
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\FileType' => '?',
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => '?',
            'Symfony\\UX\\LiveComponent\\Form\\Type\\LiveCollectionType' => '?',
        ]), ['Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['form.type_extension.form.transformation_failure_handling'] ?? $container->load('getForm_TypeExtension_Form_TransformationFailureHandlingService'));
            yield 1 => ($container->privates['form.type_extension.form.http_foundation'] ?? $container->load('getForm_TypeExtension_Form_HttpFoundationService'));
            yield 2 => ($container->privates['form.type_extension.form.validator'] ?? $container->load('getForm_TypeExtension_Form_ValidatorService'));
            yield 3 => ($container->privates['form.type_extension.upload.validator'] ?? $container->load('getForm_TypeExtension_Upload_ValidatorService'));
            yield 4 => ($container->privates['form.type_extension.csrf'] ?? $container->load('getForm_TypeExtension_CsrfService'));
            yield 5 => ($container->privates['form.type_extension.form.data_collector'] ?? $container->load('getForm_TypeExtension_Form_DataCollectorService'));
            yield 6 => ($container->privates['form.type_extension.form.password_hasher'] ?? $container->load('getForm_TypeExtension_Form_PasswordHasherService'));
            yield 7 => ($container->privates['EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Extension\\EaCrudFormTypeExtension'] ?? $container->load('getEaCrudFormTypeExtensionService'));
        }, 8), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\RepeatedType' => new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['form.type_extension.repeated.validator'] ??= new \Symfony\Component\Form\Extension\Validator\Type\RepeatedTypeValidatorExtension());
        }, 1), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\SubmitType' => new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['form.type_extension.submit.validator'] ??= new \Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension());
        }, 1), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\PasswordType' => new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['form.type_extension.password.password_hasher'] ?? $container->load('getForm_TypeExtension_Password_PasswordHasherService'));
            yield 1 => ($container->privates['form.extension.toggle_password'] ?? $container->load('getForm_Extension_TogglePasswordService'));
        }, 2), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\CollectionType' => new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Extension\\CollectionTypeExtension'] ??= new \EasyCorp\Bundle\EasyAdminBundle\Form\Extension\CollectionTypeExtension());
        }, 1)], new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['form.type_guesser.validator'] ?? $container->load('getForm_TypeGuesser_ValidatorService'));
            yield 1 => ($container->privates['form.type_guesser.doctrine'] ?? $container->load('getForm_TypeGuesser_DoctrineService'));
        }, 2))], new \Symfony\Component\Form\Extension\DataCollector\Proxy\ResolvedTypeFactoryDataCollectorProxy(new \Symfony\Component\Form\ResolvedFormTypeFactory(), ($container->privates['data_collector.form'] ?? self::getDataCollector_FormService($container))));
    }
}
