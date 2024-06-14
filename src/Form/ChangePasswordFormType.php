<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class ChangePasswordFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'options' => [
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'class' => 'w-80',
                    ],
                ],
                'first_options' => [
                    'label' => false,
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Le mot de passe ne peut pas être vide.',
                        ]),
                        new Length([
                            'min' => 12,
                            'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères.',
                            'max' => 4096, // Max length allowed by Symfony for security reasons
                        ]),
                        new Regex([
                            'pattern' => '/[A-Z]/',
                            'message' => 'Votre mot de passe doit contenir au moins une lettre majuscule.',
                        ]),
                        new Regex([
                            'pattern' => '/[a-z]/',
                            'message' => 'Votre mot de passe doit contenir au moins une lettre minuscule.',
                        ]),
                        new Regex([
                            'pattern' => '/\d/',
                            'message' => 'Votre mot de passe doit contenir au moins un chiffre.',
                        ]),
                        new Regex([
                            'pattern' => '/[@$!%*?&]/',
                            'message' => 'Votre mot de passe doit contenir au moins un caractère spécial.',
                        ]),
                    ],
                    'attr' => [
                        'placeholder' => 'Nouveau mot de passe',
                    ],      
                ],
                'second_options' => [
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Répétez le mot de passe',
                    ],   
                ],
                'invalid_message' => 'Les champs de mot de passe doivent correspondre.',
                // Instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
