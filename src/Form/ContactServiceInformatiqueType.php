<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactServiceInformatiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                'label' => 'Nom *',
                'attr' => ['placeholder' => 'Votre nom *'],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email *',
                'attr' => ['placeholder' => 'Votre adresse email *'],
            ])
            ->add('sujet', null, [
                'label' => 'Sujet *',
                'attr' => ['placeholder' => 'Le sujet de votre demande *'],
                "required" => true
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message *',
                'attr' => ['placeholder' => 'Votre message *'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
