<?php

namespace Frenzycode\Libraries;

use Frenzycode\ViewModels\Page\PageData;
use Frenzycode\ViewModels\Menu\MenuItem;
use View;
class PageManager {

    public function createPageData() {
        $pageData = new PageData();

        $pageData->head->title = "Entity Managemet System";
        $pageData->footer->title = "Entity Management System &copy; 2014.";
        $this->createMenu($pageData);
        return $pageData;
    }

    public function createMenu($pageData) {
        $pageData->body->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Dashboard', 'link' => '/')));
        $menuItem = $pageData->body->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Setting', 'link' => '/setting')));
        $menuItem->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Fields', 'link' => '/fields')));
        $menuItem = $menuItem->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Groups', 'link' => '/groups')));
        $menuItem->setActive(true);

       
    }
    
    public function generateView($pageData)
    {
        return View::make('page.page-index', array('pageData' => $pageData));
    }
}
