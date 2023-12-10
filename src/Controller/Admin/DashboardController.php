<?php

namespace App\Controller\Admin;

use App\Entity\Abonnement;
use App\Entity\Adherant;
use App\Entity\Categorie;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Menu\SubMenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
       // return $this->render('@EasyAdmin/page/content.html.twig');

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tekup Gym - Administration')
            ->renderContentMAximized()
            ->renderSidebarMinimized();
    }

    public function configureMenuItems(): iterable
    {
       // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Categories', 'fas fa-list-alt', Categorie::class);
        yield MenuItem::subMenu('Management', 'fas fa-list')->setSubItems([
            MenuItem::linkToCrud('Abonnements','fas fa-list-alt',Abonnement::class)
        ]);

    }
}