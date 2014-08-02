<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

use Frenzycode\ViewModels\Page\PageData;
use Frenzycode\ViewModels\Menu\MenuItem;
use Frenzycode\ViewModels\Button\ButtonBar;
use Frenzycode\ViewModels\Button\Button;
use Frenzycode\ViewModels\Breadcrumb\BreadcrumbItem;



Route::get('/', function() {
    $page = test();
    return View::make('page.page-index',array('pageData' => $page));
});


function test()
{
    $pageData = new PageData();
    
    $pageData->head->title = "Entity Managemet System";    
    $pageData->footer->title = "Entity Management System &copy; 2014.";
    
    $pageData->body->addMenuItem(new MenuItem(array('icon' => 'icon-home','title' => 'Dashboard','link'=>'/')));
    $menuItem = $pageData->body->addMenuItem(new MenuItem(array('icon' => 'icon-home','title' => 'Setting','link'=>'/setting')));
    $menuItem->addMenuItem(new MenuItem(array('icon' => 'icon-home','title' => 'Field Types','link'=>'/setting/field-types'))); 
    $menuItem->addMenuItem(new MenuItem(array('icon' => 'icon-home','title' => 'Fields','link'=>'/setting/fields'))); 
    $menuItem->addMenuItem(new MenuItem(array('icon' => 'icon-home','title' => 'Groups','link'=>'/setting/groups'))); 
    
    $pageData->body->addMenuItem(new MenuItem(array('icon' => 'icon-home','title' => 'Student','link'=>'/entities/student')));
    $pageData->body->addMenuItem(new MenuItem(array('icon' => 'icon-home','title' => 'Class','link'=>'/entities/class')));
    $pageData->body->addMenuItem(new MenuItem(array('icon' => 'icon-home','title' => 'Subject','link'=>'/entities/subject')));
    $pageData->body->addMenuItem(new MenuItem(array('icon' => 'icon-home','title' => 'Mark','link'=>'/entities/mark')));
    
    $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home','title' => 'Dashboard','link' => '/')));
    $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home','title' => 'Setting','link' => '')));
    $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home','title' => 'Fields','link' => '/setting/fields')));
    
    $pageData->body->title = "Fields";
    
    $buttonBar = new ButtonBar();
    
    $buttonBar->addRightButton(new Button(array('title' => 'Add','style' => 'blue','icon' => 'fa-plus','link' => '/')));
    $buttonBar->addRightButton(new Button(array('title' => 'Remove','style' => 'blue','icon' => 'fa-trash','link' => '/')));
    
    $pageData->body->buttonBar = $buttonBar;
    
    //var_dump($pageData->body->buttonBar);
    
    return $pageData;
}