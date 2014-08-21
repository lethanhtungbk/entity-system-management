<?php

namespace Frenzycode\ViewModels\Page\Templates;

use Frenzycode\ViewModels\Page\PageData;
use Frenzycode\ViewModels\Breadcrumb\BreadcrumbItem;
use Frenzycode\ViewModels\Menu\MenuItem;
use Request;
use Frenzycode\ViewModels\Page\Templates\RouteManager;
use Log;
use URL;
use Frenzycode\Models\Group;

class PageFactory {

    public static function getPage($pageType, $data = null) {
        $pageData = null;
        switch ($pageType) {
            case 'fields':
                $pageData = self::createFields($data);
                break;
            case 'field-add':
                $pageData = self::createFieldAdd($data);
                break;
         
            case 'groups':
                $pageData = self::createGroups($data);
                break;
            
            case 'group-assign':
                $pageData = self::createGroupAssign($data);
                break;
            
            case 'group-detail':
                $pageData = self::createGroupDetail($data);
                break;
                
        }

        if ($pageData != null)
        {
            self::initialize($pageData);
        }
        return $pageData;
    }

    private static function addSubMenu(&$menuItem, $submenu, $activeLink) {
        foreach ($submenu as $menu) {
            $subItem = $menuItem->addMenuItem(new MenuItem($menu));
            if ($subItem->link == $activeLink)
            {
                $subItem->setActive(true);    
            }
            if (array_key_exists('children', $menu)) {
                self::addSubMenu($subItem, $menu['children']);
            }
        }
    }

    private static function initialize(&$pageData) {
        $paths = Request::segments();
        
        $activeLevel = max(count($paths),2);
        $activeLink = implode('/',array_slice($paths,0,2));
        
        foreach (RouteManager::getMenus() as $menu) {
            $menuItem = $pageData->body->addMenuItem(new MenuItem($menu));
            
            if ($menuItem->link == $activeLink)
            {
                $menuItem->setActive(true);
            }
            
            if (array_key_exists('children', $menu)) {
                self::addSubMenu($menuItem, $menu['children'], $activeLink);
            }
        }
        
        $groups = Group::getGroups();
        foreach ($groups as $group)
        {
            $pageData->body->addMenuItem(new MenuItem(array('title' => $group->name,'link' => 'entities/'.$group->link,'icon' => $group->icon)));
        }
        
        
    }

    private static function createFields($data = null) {
        $pageData = new PageData();

        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home', 'title' => 'Dashboard', 'link' => '/')));
        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Fields', 'link' => '/fields')));

        $pageData->body->template = 'page.template.fields';
        $pageData->body->templateData = $data;

        $pageData->addScript('scripts/angular.min.js');
        $pageData->addScript('scripts/ems.js');
        $pageData->addScript('scripts/controller/fields.js');
        return $pageData;
    }

    private static function createFieldAdd($data = null) {
        $pageData = new PageData();

        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home', 'title' => 'Dashboard', 'link' => '/')));
        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Fields', 'link' => '/fields')));
        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Add field', 'link' => '/fields')));

        $pageData->body->template = 'page.template.field-detail';
        $pageData->body->templateData = $data;

        $pageData->addScript('scripts/angular.min.js');
        $pageData->addScript('scripts/ems.js');
        $pageData->addScript('scripts/controller/field-detail.js');
        return $pageData;
    }

    private static function createGroups($data = null) {
        $pageData = new PageData();

        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home', 'title' => 'Dashboard', 'link' => '/')));
        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Groups', 'link' => '/group')));

        $pageData->body->template = 'page.template.groups';
        $pageData->body->templateData = $data;

        $pageData->addScript('scripts/angular.min.js');
        $pageData->addScript('scripts/ems.js');
        $pageData->addScript('scripts/service/base-service.js');
        $pageData->addScript('scripts/service/group-service.js');
        $pageData->addScript('scripts/controller/groups.js');
        return $pageData;
    }
    
    private static function createGroupAssign($data = null) {
        $pageData = new PageData();

        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home', 'title' => 'Dashboard', 'link' => '/')));
        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Groups', 'link' => '/group')));
        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Group assign', 'link' => '/group/assign')));

        $pageData->body->template = 'page.template.group-assign';
        $pageData->body->templateData = $data;

        $pageData->addScript('scripts/angular.min.js');
        $pageData->addScript('scripts/ems.js');
        $pageData->addScript('scripts/service/base-service.js');
        $pageData->addScript('scripts/service/group-service.js');
        $pageData->addScript('scripts/controller/groups.js');
        return $pageData;
    }
    
    private static function createGroupDetail($data = null)
    {
        $pageData = new PageData();

        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home', 'title' => 'Dashboard', 'link' => '/')));
        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Groups', 'link' => 'setting/groups')));
        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Group', 'link' => 'setting/groups/add')));

        $pageData->body->template = 'page.template.group-detail';
        $pageData->body->templateData = $data;

        $pageData->addScript('scripts/angular.min.js');
        $pageData->addScript('scripts/ems.js');
        $pageData->addScript('scripts/service/base-service.js');
        $pageData->addScript('scripts/service/group-service.js');
        $pageData->addScript('scripts/controller/groups.js');
        return $pageData;
    }
}
