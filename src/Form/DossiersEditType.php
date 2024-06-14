<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Statut;
use App\Entity\Dossiers;
use App\Entity\Departement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class DossiersEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('montant', MoneyType::class, [
            'attr' => ['class' => ' ', 'placeholder' => "Montant de la commande"],
            'label' => false,
            'required' => true,
       

        
        ])
        ->add('nbPersonnel', NumberType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => "Nombre personnel de tir"],
            'label' => false,
            'required' => true,

        
        ])
        ->add('nomPersonnel', TextType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => "Nom personnel de tir"],
            'label' => false,
            'required' => false,
         
        ])
        ->add('typeFeu', ChoiceType::class, [
            'attr' => [
                'class' => 'form-control'
            ],
            'label' => false,
            'choices' => [
                'Type de feu' => null, // Option par défaut désactivée
                'F3' => "F3",
                'F4' => "F4",
            ],
            'required' => true,
            'choice_attr' => [
                'Type de feu' => ['disabled' => 'disabled'],
            ],
        ])
 
        ->add('dateTir', DateType::class, [
            'attr' => ['class' => ' form-control flatpickr-input', 'placeholder' => 'Sélectionner une date de tir'],
            'label' => false,
         
            'widget' => 'single_text',
            'html5' => false,  
            'constraints'=> [
                new NotBlank(['message' => 'La date de tir ne peut être vide.']),
            ],


        ])
        

        
        ->add('transmis', ChoiceType::class, [
            'choices' => [
                'Dossier Transmis' => null, // Première option invisible
                'Oui' => true,
                'Non' => false,
            ],
     
            'attr' => ['class' => 'options-SF'],
            'choice_attr' => [
                'Dossier Transmis' => ['disabled' => true], // Ajoutez l'attribut "disabled" à la première option
            ],
        ])
        
        
        ->add('declarationPrefecture', ChoiceType::class, [
            'choices'  => [
                "Déclaration Préfecture" => null,
                'Oui' => true,
                'Non' => false,
            ],

            'attr' => ['class' => 'options-SF'],

            'choice_attr' => [
                'Déclaration Préfecture' => ['disabled' => true], // Ajoutez l'attribut "disabled" à la première option
            ],
        ])

        ->add('contratArtificier', ChoiceType::class, [
            'choices'  => [
                "Contrat Artificier" => null,
                'Oui' => true,
                'Non' => false,
            ],
          
            'attr' => ['class' => 'options-SF'],

            'choice_attr' => [
                'Contrat Artificier' => ['disabled' => true], // Ajoutez l'attribut "disabled" à la première option
            ],
        ])

        ->add('clientId', TextType::class, [
            'label' => false,
            'required' => true,
        ])

        ->add('dpt', EntityType::class, [
            'class' => Departement::class,
            'label' => false,
            'constraints'=> [
                new NotBlank(['message' => 'La departement ne peut être vide']),
            ],
            'placeholder' => 'Choix du département', // Ajoutez cette ligne pour la première option vide
            
        ])
        ->add('dossier_commentaire', CommentairesType::class, [
            'label' => false,
            'mapped' => false, // This field is not mapped to the entity
            'attr' => ['class' => 'd-flex'],

        ]);
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Dossiers::class,
        ]);
    }
}
