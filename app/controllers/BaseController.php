<?php

use Frenzycode\Libraries\PageManager;
use Frenzycode\ViewModels\Menu\MenuItem;

class BaseController extends Controller {
    protected $messages = array();
    protected $pageManager;
    
    function __construct() {
        $this->pageManager = new PageManager();
        
    }
    
    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }
    
    protected function addSubMenu(&$menu,$children)
    {
        foreach ($children as $subitem)
        {
            $item = $menu->addMenuItem(new MenuItem($subitem));
//            if (array_key_exists('children', $subitem))
//            {
//                $this->addSubMenu(&$item, $subitem['children']);
//            }
        }
    }
    
    protected function configPage(&$pageData)
    {
        $menus = array(
            array('title' => 'Dashboard','icon' => 'icon-home','link' => '/'),
            array('title' => 'Setting','icon' => 'icon-home', 'children' => array(
                array('title' => 'Fields','icon' => 'icon-home','link' => '/setting/fields'),
                array('title' => 'Groups','icon' => 'icon-home','link' => '/setting/groups'),
            ))
        );
        
        foreach ($menus as $menu)
        {
            $menuItem = $pageData->body->addMenuItem(new MenuItem($menu));
            if (array_key_exists('children', $menu))
            {
                $this->addSubMenu($menuItem, $menu['children']);
            }
        }
    }
}
