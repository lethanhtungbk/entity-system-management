<?php
namespace Frenzycode\ViewModels\Page;

class PageBody {
    public $logo;
    public $title;
    public $menus = array();
    public $breadcrumbs = array();
    
    public $buttonBar;
    public $formData;
    public $portletData;
    
    public function addMenuItem($menuItem)
    {
        array_push($this->menus, $menuItem);
        return $menuItem;
    }
    
    public function addBreadcrumbItem($breadcrumbItem)
    {
        array_push($this->breadcrumbs,$breadcrumbItem);
    }
}
