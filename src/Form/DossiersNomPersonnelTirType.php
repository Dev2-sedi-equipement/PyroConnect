<?php
// src/Form/Type/DossiersNomPersonnelTirType.php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DossiersNomPersonnelTirType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('nomPersonnel',null,[
            'label' => false, // Désactivez l'affichage du libellé
        ]);
       
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configurez ici les options par défaut pour le champ
        ]);
    }
}
