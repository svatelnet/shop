<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Menu;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //return parent::index();
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
        $url = $routeBuilder->setController(ProductCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Shop')
            ->setTranslationDomain('admin');
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        //fas fa-map-marker-alt
        yield MenuItem::linktoRoute('Вернуться на сайт', 'fas fa-home', 'homepage');
        yield MenuItem::linkToCrud('Товары', 'fas fa-product', Product::class);
        yield MenuItem::linkToCrud('Категории товаров', 'fas fa-category', Category::class);
        yield MenuItem::linkToCrud('Меню', 'fas fa-menu', Menu::class);
    }
}
