<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
       
        $builder
            ->add('email', EmailType::class, [
                'attr' => ['class' => 'emailInput input', 'placeholder'=>'Email' ],
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => "Le champ email ne peut pas être laissé vide.",
                    ]),
                    new Email([
                        'message' => 'Entrez une adresse email valide.',
                    ])
                ],
            ])
            // ->add('password', RepeatedType::class, [
            //     'type' => PasswordType::class, 
            //     'label' => false ,
            //     'invalid_message' => 'Les mots de passe doivent correspondre.',
            //     'options' => ['attr' => ['class' => '']],
            //     'required' => true,
            //     'first_options'  => ['label' => false,'attr' => ['class' => 'emailInput input', 'placeholder'=>'Mot de passe', 'label' => false ]],
            //     'second_options' => ['label' => false, 'attr' => ['class' => 'emailInput input', 'placeholder'=>'Répétez le mot de passe', 'label' => false ]],
            // ])
            ->add('password', PasswordType::class, [

                'attr' => ['class' => 'emailInput input', 'placeholder'=>'Mot de passe', 'label' => false ],
                'required' => true,
            ])

            ->add('name', TextType::class, [
                'attr' => ['class' => 'emailInput input', 'placeholder'=>'Prénom' ]
               ,
                'label' => false ,
                'required' => true,
                
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez votre nom',
                    ]),
                ],
            ])
            ->add('lastname', TextType::class, [
                'attr' => ['class' => 'emailInput input', 'placeholder'=>'Nom de famille' ],
                'label' => false ,
                'required' => false,
            ])

            ->add('codeVrp', TextType::class, [
                'attr' => ['class' => 'emailInput input', 'placeholder'=>'Code VRP' ],
                'label' => false ,
                'required' => false,
            
            ])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'VRP' => 'VRP',
                    'Service Feux' => 'SF',
                    'Admin' => 'ROLE_ADMIN',
                ],
                'multiple' => false,
                'attr' => [
                    'class' => 'form-select form-select-lg mb-3', // Ajoutez les classes nécessaires ici
                    'aria-label' => 'Large select example', // Ajoutez les autres attributs nécessaires ici
                ],
            ]
        );
            
        //roles field data transformer
        $builder->get('roles')
        ->addModelTransformer(new CallbackTransformer(
            function ($rolesArray) {
                // transform the array to a string
                return count($rolesArray)? $rolesArray[0]: null;
            },
            function ($rolesString) {
                // transform the string back to an array
                return [$rolesString];
            }
        ));
            
            
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_protection' => true,
    
        ]);
    }
}
