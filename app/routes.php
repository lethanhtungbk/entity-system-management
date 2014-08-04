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
use Frenzycode\ViewModels\Table\DataTable;
use Frenzycode\ViewModels\Table\HeadColumn;
use Frenzycode\ViewModels\Table\DataRow;
use Frenzycode\ViewModels\Table\DataColumn;
use Frenzycode\ViewModels\Form\FormData;
use Frenzycode\ViewModels\Form\FormItemData;
use Frenzycode\ViewModels\Portlet\PortletData;

Route::get('/', function() {
    $page = test();
    return View::make('page.page-index', array('pageData' => $page));
});

function test() {
    $pageData = new PageData();

    $pageData->head->title = "Entity Managemet System";
    $pageData->footer->title = "Entity Management System &copy; 2014.";

    $pageData->body->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Dashboard', 'link' => '/')));
    $menuItem = $pageData->body->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Setting', 'link' => '/setting')));
    $menuItem->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Field Types', 'link' => '/setting/field-types')));
    $menuItem->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Fields', 'link' => '/setting/fields')));
    $menuItem->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Groups', 'link' => '/setting/groups')));

    $pageData->body->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Student', 'link' => '/entities/student')));
    $pageData->body->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Class', 'link' => '/entities/class')));
    $pageData->body->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Subject', 'link' => '/entities/subject')));
    $pageData->body->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Mark', 'link' => '/entities/mark')));

    $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home', 'title' => 'Dashboard', 'link' => '/')));
    $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home', 'title' => 'Setting', 'link' => '')));
    $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home', 'title' => 'Fields', 'link' => '/setting/fields')));

    $pageData->body->title = "Fields";

    $buttonBar = new ButtonBar();

    $buttonBar->addLeftButton(new Button(array('title' => 'Add', 'style' => 'blue', 'icon' => 'fa-plus', 'link' => '/')));
    $buttonBar->addLeftButton(new Button(array('title' => 'Remove', 'style' => 'blue', 'icon' => 'fa-trash', 'link' => '/')));

    $pageData->body->buttonBar = $buttonBar;

    $pageData->addStyle('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');
    $pageData->addScript('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js');
    $pageData->addScript('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js');
    $pageData->addScript('assets/admin/pages/scripts/table-managed.js');
    $pageData->addInitScript('TableManaged.init();');


    $dataTable = new DataTable();
    $dataTable->addHeadColoumn(new HeadColumn((array('title' => 'Username 1'))));
    $dataTable->addHeadColoumn(new HeadColumn((array('title' => 'Email 1'))));
    $dataTable->addHeadColoumn(new HeadColumn((array('title' => 'Point 1'))));
    $dataTable->addHeadColoumn(new HeadColumn((array('title' => 'Joined 1'))));
    $dataTable->addHeadColoumn(new HeadColumn((array('title' => 'Status 1'))));


    for ($i = 0; $i < 20; $i++) {
        $dataRow = $dataTable->addDataRow(new DataRow());

        $dataRow->addDataColumn(new DataColumn(array('data' => 'shuxer ' . $i)));
        $dataRow->addDataColumn(new DataColumn(array('data' => 'shuxer@gmail.com ' . $i)));
        $dataRow->addDataColumn(new DataColumn(array('data' => '120 ' . $i)));
        $dataRow->addDataColumn(new DataColumn(array('data' => '12 Jan 2012 ' . $i)));
        //$dataRow->addDataColumn(new DataColumn(array('data' => '12 Jan 2012 ' . $i)));
        $dataRow->addDataColumn(new DataColumn(array('data' => $buttonBar, 'style' => 'width="11%"'), DataColumn::TYPE_BUTTON));
    }


    $pageData->body->dataTable = $dataTable;

    //var_dump($pageData->body->dataTable->dataRows[0]);

    $formData = new FormData();

    //$pageData->body->formData = $formData;

    $multipleValues = array('1' => 'value 1', '2' => 'value 2', '3' => 'value 3', '4' => 'value 4');
    $multipleSelected = array(1, 4);

    $field = new FormItemData();
    $field->name = 'checkbox';
    $field->value = $multipleValues;
    $field->selected = $multipleSelected;
    $field->desc = 'Checkbox Field';
    $field->ui = 'form.items.checkbox';
    $formData->addFormItem($field);


    $field = new FormItemData();
    $field->name = 'dropdown';
    $field->value = $multipleValues;
    $field->selected = 3;
    $field->desc = 'Drop Field';
    $field->ui = 'form.items.dropdown';
    $formData->addFormItem($field);


    $field = new FormItemData();
    $field->name = 'hidden';
    $field->value = 'hiddenValue';
    $field->ui = 'form.items.hidden';
    $formData->addFormItem($field);


    $field = new FormItemData();
    $field->name = 'list_single';
    $field->value = $multipleValues;
    $field->selected = 3;
    $field->desc = 'List Single Field';
    $field->ui = 'form.items.list';
    $formData->addFormItem($field);


    $field = new FormItemData();
    $field->name = 'list_multiple';
    $field->value = $multipleValues;
    $field->selected = $multipleSelected;
    $field->desc = 'List Multiple Field';
    $field->ui = 'form.items.list';
    $formData->addFormItem($field);


    $field = new FormItemData();
    $field->name = 'radio';
    $field->value = $multipleValues;
    $field->selected = 4;
    $field->desc = 'List Multiple Field';
    $field->ui = 'form.items.radio';
    $formData->addFormItem($field);


    $field = new FormItemData();
    $field->name = 'textfield';
    $field->value = "Select text field";
    $field->desc = 'Textfield Field';
    $field->ui = 'form.items.textfield';
    $formData->addFormItem($field);

    $field = new FormItemData();
    $field->name = 'textarea';
    $field->value = 'Select text area';
    $field->desc = 'List Multiple Field';
    $field->ui = 'form.items.textarea';
    $formData->addFormItem($field);

    $portletData = new PortletData();
    $portletData->title = 'Fields';
    $portletData->content = $formData;
    
    $pageData->body->portletData = $portletData;
    
    return $pageData;
}
