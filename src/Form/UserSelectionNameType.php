<?php


namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityManagerInterface;

class UserSelectionNameType extends AbstractType
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $users = $this->entityManager->getRepository(User::class)->findVrpUsers();

        $choices = [];
        foreach ($users as $user) {
            $choices[$user->getName() . ' ' . $user->getLastName()] = $user->getName() . ' ' . $user->getLastName();
        }

        $options = [
            'choices' => $choices,
            'mapped' => true,
            'label' => false,
            'required' => false,
        ];

        // Ajouter le placeholder par défaut seulement si le placeholder n'est pas désactivé
        if (!isset($options['placeholder']) || $options['placeholder'] !== false) {
            $options['placeholder'] = 'Sélectionner un VRP';
        }

        $resolver->setDefaults($options);
    }

    public function getParent(): ?string
    {
        return ChoiceType::class;
    }
}
