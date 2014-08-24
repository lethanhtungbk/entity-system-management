<?php

namespace Frenzycode\Models;

use Frenzycode\ViewModels\Page\PageData;
use Request;
use Frenzycode\ViewModels\Menu\MenuItem;
use Frenzycode\ViewModels\Breadcrumb\BreadcrumbItem;

class PageModel {

    const PAGE_FIELDS = 1;
    const PAGE_FIELD_ADD = 2;
    const PAGE_FIELD_EDIT = 3;
    const PAGE_GROUPS = 4;
    const PAGE_GROUP_ADD = 5;
    const PAGE_GROUP_EDIT = 6;
    const PAGE_GROUP_ASSIGN = 7;
    const PAGE_ENTITIES = 8;
    const PAGE_ENTITY_ADD = 9;
    const PAGE_ENTITY_EDIT = 10;

    protected $menuData = array(
        array('icon' => 'icon-home', 'title' => 'Dashboard', 'link' => '/'),
        array('icon' => 'icon-home', 'title' => 'Setting', 'link' => 'setting', 'children' => array(
                array('icon' => 'icon-home', 'title' => 'Fields', 'link' => 'setting/fields'),
                array('icon' => 'icon-home', 'title' => 'Groups', 'link' => 'setting/groups'),
            )),
    );
    
    protected $breadcrumbsData = array(
        "root" => array('icon' => 'fa-home', 'title' => 'Dashboard', 'link' => '/'),
        "field" => array('icon' => '', 'title' => 'Fields', 'link' => 'setting/fields'),
        "field-add" => array('icon' => '', 'title' => 'Add field', 'link' => 'setting/fields/add'),
        "field-edit" => array('icon' => '', 'title' => 'Edit field', 'link' => 'setting/fields/edit'),
        "group" => array('icon' => '', 'title' => 'Groups', 'link' => 'setting/groups'),
        "group-add" => array('icon' => '', 'title' => 'Add group', 'link' => 'setting/groups/add'),
        "group-edit" => array('icon' => '', 'title' => 'Edit group', 'link' => 'setting/groups/edit'),
    );
    
    protected $breadcrumbs = array (
        self::PAGE_FIELDS => array("root","field"),
        self::PAGE_FIELD_ADD => array("root","field","field-add"),
        self::PAGE_FIELD_EDIT => array("root","field","field-edit"),
        self::PAGE_GROUPS => array("root","group"),
        self::PAGE_GROUP_ADD => array("root","group","group-add"),
        self::PAGE_GROUP_EDIT => array("root","group","group-edit"),
        self::PAGE_GROUP_ASSIGN => array("root","group","group-assign"),
    );
    
    
    private $pageData;
    private $pageType;

    private function getActivePath() {
        $paths = Request::segments();
        return implode('/', array_slice($paths, 0, 2));
    }

    private function addMenuItem(&$parent, $children, $activePath) {
        foreach ($children as $menu) {
            $subItem = $parent->addMenuItem(new MenuItem($menu));
            if ($subItem->link == $activePath) {
                $subItem->setActive(true);
            }
            if (array_key_exists('children', $menu)) {
                $this->addMenuItem($subItem, $menu['children'], $activePath);
            }
        }
    }

    private function createMenu() {
        $activePath = $this->getActivePath();
        $this->addMenuItem($this->pageData->body, $this->menuData, $activePath);
        $groups = Group::getGroups();
        foreach ($groups as $group) {
            $this->pageData->body->addMenuItem(new MenuItem(array('title' => $group->name, 'link' => 'entities/' . $group->link, 'icon' => $group->icon)));
        }
    }

    private function createBreadcrumbs() {
        if (array_key_exists($this->pageType, $this->breadcrumbs))
        {
            foreach ($this->breadcrumbs[$this->pageType] as $b)
            {
                if (array_key_exists($b,$this->breadcrumbsData))
                {
                    $this->pageData->body->addBreadcrumbItem(new BreadcrumbItem($this->breadcrumbsData[$b]));
                }
            }
        }
    }

    private function addAngularJS() {
        $this->pageData->addScript('scripts/angular.min.js');
        $this->pageData->addScript('scripts/library/library.js');
        $this->pageData->addScript('scripts/ems.js');
        $this->pageData->addScript('scripts/service/base-service.js');
        switch ($this->pageType) {
            case PageModel::PAGE_FIELDS:
            case PageModel::PAGE_FIELD_ADD:
            case PageModel::PAGE_FIELD_EDIT:
                $this->pageData->addScript('scripts/service/field-service.js');
                $this->pageData->addScript('scripts/controller/fields.js');
                break;

            case PageModel::PAGE_GROUPS:
            case PageModel::PAGE_GROUP_ADD:
            case PageModel::PAGE_GROUP_EDIT:
            case PageModel::PAGE_GROUP_ASSIGN:
                $this->pageData->addScript('scripts/service/group-service.js');
                $this->pageData->addScript('scripts/controller/groups.js');
                break;
            
            
            case PageModel::PAGE_ENTITIES:
            case PageModel::PAGE_ENTITY_ADD:
            case PageModel::PAGE_ENTITY_EDIT:
                $this->pageData->addScript('scripts/service/entity-service.js');
                $this->pageData->addScript('scripts/controller/entities.js');
                break;
        }
    }

    private function createBodyTemplate($data = null) {
        switch ($this->pageType) {
            case PageModel::PAGE_FIELDS:
                $this->pageData->body->template = 'page.template.fields';
                break;
            case PageModel::PAGE_FIELD_ADD:
            case PageModel::PAGE_FIELD_EDIT:
                $this->pageData->body->template = 'page.template.field-detail';
                break;

            case PageModel::PAGE_GROUPS:
                $this->pageData->body->template = 'page.template.groups';
                break;
            case PageModel::PAGE_GROUP_ADD:
            case PageModel::PAGE_GROUP_EDIT:
                $this->pageData->body->template = 'page.template.group-detail';
                break;
            case PageModel::PAGE_GROUP_ASSIGN:
                $this->pageData->body->template = 'page.template.group-assign';
                break;
            
            case PageModel::PAGE_ENTITIES:
                $this->pageData->body->template = 'page.template.entities';
                break;
            case PageModel::PAGE_ENTITY_ADD:
            case PageModel::PAGE_ENTITY_EDIT:
                $this->pageData->body->template = 'page.template.entity-detail';
                break;
        }

        $this->pageData->body->templateData = $data;
    }

    public function createPage($pageType, $data = null) {
        $this->pageData = new PageData();
        $this->pageType = $pageType;

        $this->pageData->head->title = "EMS | Entity management system";

        $this->createMenu();
        $this->createBreadcrumbs();
        $this->createBodyTemplate($data);
        $this->addAngularJS();

        return $this->pageData;
    }

}
