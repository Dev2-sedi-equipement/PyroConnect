<?php

namespace App\Controller\Admin;

use App\Entity\Statut;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StatutCrudController extends AbstractCrudController
{
    #[IsGranted('ROLE_ADMIN')]
    public static function getEntityFqcn(): string
    {
        return Statut::class;
    }

    public function configureFields(string $pageName): iterable
{
    return [
        // IdField::new('statut_id')->hideOnForm(),
        IdField::new('statut_id')->hideOnForm()->hideOnIndex(),
        TextField::new('libelle'),
        ColorField::new('couleur'),
    ];
}

   
}
