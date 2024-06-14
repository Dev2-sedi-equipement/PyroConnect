<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Clients;
use App\Entity\Dossiers;
use App\Entity\Departement;
use App\Form\CommentairesType;
use App\Form\UserSelectionType;
use App\Repository\ClientsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class DossiersEditArchiveType extends AbstractType
{
    private $entityManager;
    private $clientRepository;
    private Security $security;
    
    public function __construct(EntityManagerInterface $entityManager,ClientsRepository $clientRepository,Security $security)
    {
        $this->entityManager = $entityManager;
        $this->clientRepository = $clientRepository;
        $this->security = $security;
    
    
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {   
       
        $builder
        ->add('nomPersonnel', TextType::class,[
            'required' => false,
            'label' => false,
            "mapped" =>true,
            'attr' => ['class' => ' ', 'placeholder' => "Nom Personnel"],
        ])

        ->add('nom', TextType::class, [
            'label' => false,
            'attr' => ['class' => 'd-none invisible', 'style' => "height:0px!important;"],
            'required' => false,
            'mapped' => false,
         
        ])


        // ->add('client', EntityType::class, [
        //     'class' => Clients::class,
        //     'label' => false,
        //     'constraints'=> [
        //         new NotBlank(['message' => 'La ville ne peut être vide']),
        //     ],
        // ])
        
        ->add('dpt', EntityType::class, [
            'class' => Departement::class,
            'label' => false,
            'placeholder' => 'Choix du département', // Ajoutez cette ligne pour la première option vide
            
        ])
        
        
        ->add('montant', IntegerType::class, [
            'attr' => ['class' => ' ', 'placeholder' => "Montant de la commande"],
            'label' => false,
            'required' => true,
            'constraints' => [new Positive()],
            'attr' => [
                'min' => 1
            ]
        
        ])
        ->add('nbPersonnel', NumberType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => "Nombre personnel de tir"],
            'label' => false,
            'required' => true,
            'data' => 0, // Définir la valeur par défaut à 0
        
        ])
        ->add('typeFeu', ChoiceType::class, [
            'attr' => ['class' => 'form-control'],
            'label' => false,
            'choices' => [
                'Type de feu' => null, // Option par défaut désactivée
                'F3' => "F3",
                'F4' => "F4",
            ],
            'choice_attr' => [
                'Type de feu' => ['disabled' => 'disabled'],
            ],
            'constraints'=> [
                new NotBlank(['message' => 'Le type de feu ne peut être vide']),
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
        
  
        ->add('dateCreation', DateTimeType::class, [
            'attr' => ['class' => 'd-none invisible'],
            'data' => new \DateTimeImmutable(), // Valeur par défaut
            'mapped' => false,
            'label' => false,
        ])
        ->add('dateModificationSF', DateTimeType::class, [
            
            'mapped' => false,
            'label' => false,
            'empty_data' => '',
            'required' => false,
            'attr' => ['class' => 'd-none invisible'],
        ])
        ->add('dateModificationVRP', DateTimeType::class, [
            
            'mapped' => false,
            'label' => false,
            'empty_data' => '',
            'required' => false,
            'attr' => ['class' => 'd-none invisible'],


        ])
        ->add('lectureSF', EntityType::class, [
            'class' => User::class,
            'choice_label' => 'id',
            'attr' => ['class' => 'd-none invisible'],
            'mapped' => false,
            'label' => false,
        ])
        ->add('lectureVRP', EntityType::class, [
            'class' => User::class,
            'choice_label' => 'id',
            'attr' => ['class' => 'd-none invisible'],
            'mapped' => false,
            'label' => false,
            
        ])
        ->add('assignVrp', UserSelectionType::class,[
            'mapped' => true,
            'attr' => ['class' => 'd-none invisible'],
            'placeholder' => "Assignation du vrp automatique", // Ajoutez cette ligne pour la première option vide

         

        ])

        ->add('nomVrp', TextType::class,[
    
            'required' => false,
            'mapped' => true,
            'label' => false,

            'attr' => ['class' => 'd-none invisible'],

         

        ])
        // autres champs de votre formulaire
        ->add('data_name', HiddenType::class, [
            'mapped' => true, // Ce champ n'est pas lié à l'entité
            'required' => false,
        ])

        // autres champs de votre formulaire
        ->add('userId', HiddenType::class, [
            'mapped' => true, // Ce champ n'est pas lié à l'entité
            'required' => false,
        ])
        
        ->add('clientId', TextType::class, [
            'label' => false,
            'required' => true,
        ])
        ->add('transmis', ChoiceType::class, [
            'choices' => [
                'Dossier Transmis' => null, // Première option invisible
                'Oui' => true,
                'Non' => false,
            ],
            'mapped' => false,
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
            'mapped' => false,
            'choice_attr' => [
                'Déclaration Préfecture' => ['disabled' => true], // Ajoutez l'attribut "disabled" à la première option
            ],
        ])
        ->add('dossier_commentaire', CommentairesType::class, [
            'label' => false,
            'mapped' => false, // This field is not mapped to the entity
            'attr' => ['class' => 'd-flex'],

        ])
        
        ->add('contratArtificier', ChoiceType::class, [
            'choices'  => [
                "Contrat Artificier" => null,
                'Oui' => true,
                'Non' => false,
            ],
            'mapped' => false,
            'choice_attr' => [
                'Contrat Artificier' => ['disabled' => true], // Ajoutez l'attribut "disabled" à la première option
            ],
        ])
        
        ->add('dossier_commentaire', CommentairesType::class, [
            'label' => false,
            'mapped' => false, // This field is not mapped to the entity
        ]);
      
        
        // ->add('statut', ChoiceType::class, [
   
        //     'choice_label' => 'id',
        //     'mapped' => false,
        //     'attr' => ['class' => 'd-none invisible'],
        //     'label' => false
  
        // ]);
}


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Dossiers::class,
        ]);
    }
}
