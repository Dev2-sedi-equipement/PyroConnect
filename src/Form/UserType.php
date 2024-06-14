<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Adresse email',
                'attr' => ['readonly' => true, 'class' => ' bg-secondary bg-gradient'],
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => ['placeholder'=>'Mot de passe' ],

                'constraints' => [
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Le mot de passe doit contenir au moins {{ limit }} caractères.',
                        // Vous pouvez également définir max pour un maximum de caractères
                    ]),
                ],
            ])
            ->add('isVerified', CheckboxType::class, [
                'label' => 'Le compte est vérifié',
                'mapped' => false,
                'attr' => ['readonly' => true, 'class' => ' bg-secondary bg-gradient'],

            ])
            ->add('createdAt', DateTimeType::class, [
                'label' => false,
                'attr' => ['readonly' => true, 'class' => ' d-none'],
                'mapped' => false,
            ])
            ->add('name', TextType::class, [
                'label' => 'Prénom',
                'attr' => ['readonly' => true, 'class' => ' bg-secondary bg-gradient'],

            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom de famille',
                'attr' => ['readonly' => true, 'class' => ' bg-secondary bg-gradient'],

            ])
            ->add('codeVrp', TextType::class, [
                'label' => 'Code VRP',
                'attr' => ['readonly' => true, 'class' => ' bg-secondary bg-gradient'],
            ])
            ->add('roles', null, [
                'label' => false,
                'mapped' => false,

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
