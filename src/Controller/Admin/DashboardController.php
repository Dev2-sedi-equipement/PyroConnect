<?php

namespace App\Controller\Admin;

use App\Entity\Statut;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Asset;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    
    public $adminUrlGenerator;
    
    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }
    
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
     
    
        
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // if (!$this->isGranted('ROLE_ADMIN')) {
        //     throw new AccessDeniedException("Vous n'avez pas les droits pour accéder à cette ressource.");
        // }
    
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());
    
        // Option 2. You can make your dashboard redirect to different pages depending on the user
        // ...
    
        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    
        return parent::index();
    }
    

    public function configureDashboard(): Dashboard
    {
        // Obtenez la locale souhaitée (par exemple, 'fr_FR')
        return Dashboard::new()
            ->setTitle('PyroConnect')
            ->setTranslationDomain('add Utilisateur');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Liste des utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Statut des dossiers', 'fas fa-user', Statut::class);
        yield MenuItem::linkToRoute('Voir les dossiers', '< fas fa-file', 'app_index');
        
        
    }
    public function configureAssets(): Assets
    {
        return parent::configureAssets()
            ->addWebpackEncoreEntry('adminUser'); // Utilisez le nom de l'entrée définie dans Webpack Encore
            // ->addWebpackEncoreEntry('app'); // Utilisez le nom de l'entrée définie dans Webpack Encore
    
        }
}
