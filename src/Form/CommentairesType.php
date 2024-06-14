<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Dossiers;
use App\Entity\Commentaires;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentairesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('message', TextType::class, [
            'label' => false,
            'required' => false, 
            'attr' => [
                'class' => 'form-control', 
                'placeholder' => 'Ajouter un commentaire',
                'style' => 'height: 50px; width: 100%;'
            ]
        ])
;
     
       
            
        
    
    
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentaires::class,
        ]);
    }
}
