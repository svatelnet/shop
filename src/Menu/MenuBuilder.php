<?php

// src/Menu/MenuBuilder.php

namespace App\Menu;

use App\Entity\Menu;
use App\Repository\MenuRepository;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class MenuBuilder
{
    private $factory;

    private $menuRepository;

    /**
     * Add any other dependency you need...
     */
    public function __construct(FactoryInterface $factory, MenuRepository $menuRepository)
    {
        $this->factory = $factory;
        $this->menuRepository = $menuRepository;
    }

    public function createMainMenu(array $options): ItemInterface
    {
        $item = $this->menuRepository->findAll();

        $menu = $this->factory->createItem('root', array('childrenAttributes' => array('class' => 'navbar-nav me-auto mb-2 mb-md-0')));

        foreach ($item as $i) {
            $menu->addChild($i->getName(), array('route' => $i->getLink()))->setAttributes(array('class' => 'nav-item'));
        }

        return $menu;
    }
}