<?php

namespace Frenzycode\ViewModels\Page\Templates;

use Frenzycode\ViewModels\Page\PageData;
use Frenzycode\ViewModels\Breadcrumb\BreadcrumbItem;

class PageFactory {

    public static function getPage($pageType) {

        switch ($pageType) {
            case 'fields':
                return self::createFields();
            case 'field-add':
                return self::createFieldAdd();
        }
    }

    private static function createFields() {
        $pageData = new PageData();

        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home', 'title' => 'Dashboard', 'link' => '/')));
        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Fields', 'link' => '/fields')));

        $pageData->body->template = 'page.template.fields';

        $pageData->addScript('scripts/angular.min.js');
        $pageData->addScript('scripts/ems.js');
        return $pageData;
    }

    private static function createFieldAdd() {
        $pageData = new PageData();

        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home', 'title' => 'Dashboard', 'link' => '/')));
        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Fields', 'link' => '/fields')));
        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Add field', 'link' => '/fields')));

        $pageData->body->template = 'page.template.field-detail';

        $pageData->addScript('scripts/angular.min.js');
        $pageData->addScript('scripts/ems.js');
        $pageData->addScript('scripts/controller/field-detail.js');
        return $pageData;
    }

}
