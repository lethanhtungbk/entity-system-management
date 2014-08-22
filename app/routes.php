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

use Frenzycode\ViewModels\Page\Templates\RouteManager;

use Frenzycode\Models\FieldTypes;

foreach (RouteManager::getRoute() as $route)
{
    if ($route['type'] == 'post')
    {
        Route::post($route['url'],$route['handle']);
    }
    else if ($route['type'] == 'get')
    {
        Route::get($route['url'],$route['handle']);
    }
}

Route::get('/', function() {
    //$page = test();
    //return View::make('page.page-index', array('pageData' => $page));
    //return View::make('test.index');
    
    //var_dump(Frenzycode\Models\Group::getFields(2));
    $group = new \Frenzycode\Models\Group();
    $group->id = 1;
    $group->getFields();
    var_dump($group);
});
//  
//Route::get('test1',function(){
//    var_dump(Request::segments());
//});
//
//
//
//
//
//Route::post('/restapi/getFieldDisplay','RestController@getFieldDisplay');
//Route::post('/restapi/getValueAssignType','RestController@getValueAssignType');
//
//Route::get('/restapi/fields','RestController@getFields');
//Route::post('/restapi/field','RestController@getField');
//Route::post('/restapi/saveField','RestController@saveField');
//
//Route::get('/restapi/fieldTypes','RestController@getFieldTypes');
//Route::get('/restapi/fieldValueTypes','RestController@getFieldValueTypes');
//
//
//Route::get('/groups','GroupController@getGroups');
//Route::get('/groups/add','GroupController@addGroup');
//Route::get('/groups/edit/{id}','GroupController@editGroup');
//Route::get('/fields','FieldController@getFields');
//
//Route::post('/groups/save','GroupController@saveGroup');
//Route::post('/groups/update','GroupController@updateGroup');
//
//
//Route::get('/fields','FieldController@getFields');
//Route::get('/fields/add','FieldController@addField');
//Route::get('/fields/edit/{id}','FieldController@editField');
//
//Route::post('/fields/save','FieldController@saveField');
//Route::post('/fields/update','FieldController@updateField');



function test() {
    $pageData = new PageData();

    $pageData->head->title = "Entity Managemet System";
    $pageData->footer->title = "Entity Management System &copy; 2014.";

    $pageData->body->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Dashboard', 'link' => '/')));
    $menuItem = $pageData->body->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Setting', 'link' => '/setting')));
    $menuItem->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Field Types', 'link' => '/setting/field-types')));
    $menuItem->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Fields', 'link' => '/fields')));
    $menuItem->addMenuItem(new MenuItem(array('icon' => 'icon-home', 'title' => 'Groups', 'link' => '/groups')));

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
    //$pageData->addScript('assets/admin/pages/scripts/table-managed.js');
    //$pageData->addInitScript('TableManaged.init();');


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

    $formData = new FormData();
    
    $formData->url = "/test1";


    $multipleValues = array('1' => 'Single value', '2' => 'Multiple values - Single select', '3' => 'Multiple values - Multiple select');
    $multipleSelected = array(1, 4);

    $field = new FormItemData();
    $field->name = 'name';
    $field->desc = 'Field Name';
    $field->ui = 'form.items.textfield';
    $formData->addFormItem($field);


    $field = new FormItemData();
    $field->name = 'select_type';
    $field->value = $multipleValues;
    $field->desc = 'Field select type';
    $field->ui = 'form.items.dropdown';
    $field->id = 'select_type';

    $formData->addFormItem($field);

    $field = new FormItemData();
    $field->name = 'field_display_type';

    $field->desc = 'Field display as';
    $field->ui = 'form.items.dropdown';
    $field->id = 'field_display_type';
    $formData->addFormItem($field);

    $field = new FormItemData();
    $field->name = 'field_depend_type';
    $field->value = array('1' => 'None', '2' => 'Student', '3' => 'Class', '4' => 'Mark');
    $field->selected = 1;
    $field->desc = 'Depend on objects';
    $field->ui = 'form.items.list';
    $formData->addFormItem($field);

    $field = new FormItemData();
    $field->name = 'field_value_type';
    $field->value = array('1' => 'None', '2' => 'Country', '3' => 'District');
    $field->selected = 1;
    $field->desc = 'Depend on fields';
    $field->ui = 'form.items.list';
    $formData->addFormItem($field);

    $field = new FormItemData();
    $field->name = 'field_value_type';
    $field->value = array('1' => 'None', '2' => 'Country', '3' => 'District');
    $field->selected = 1;
    $field->desc = 'Depend on fields';
    $field->ui = 'form.items.list';
    $formData->addFormItem($field);



    $field = new FormItemData();
    $field->name = 'field_value_type';
    $field->value = array('1' => 'Self-Value', '2' => 'Object-Value', '3' => 'Field-Value');
    $field->selected = 1;
    $field->desc = 'Assign value';
    $field->ui = 'form.items.dropdown';
    $field->id = 'assign_value_type';
    $formData->addFormItem($field);


    $field = new FormItemData();
    $field->name = 'field_self_value';

    $field->desc = 'Assign itself';
    $field->ui = 'form.items.token-random';
    $field->id = 'field_self_value';
    $formData->addFormItem($field);

    $field = new FormItemData();
    $field->name = 'field_field_value';

    $field->desc = 'Assign to Object';
    $field->ui = 'form.items.dropdown';
    $field->id = 'field_field_value';
    $formData->addFormItem($field);

    $field = new FormItemData();
    $field->name = 'field_object_value';

    $field->desc = 'Assign to field';
    $field->ui = 'form.items.dropdown';
    $field->id = 'field_object_value';
    $formData->addFormItem($field);


    
    $field = new FormItemData();
    

    $field->desc = 'Dump';
    $field->name = 'custom-value';
    $field->ui = 'form.items.custom-value';
    $formData->addFormItem($field);

    $formData->addFormButton(new Button(array('title' => 'Cancel','style' => 'blue','link'=>'/test')));

    $portletData = new PortletData();
    $portletData->title = 'Fields';
    $portletData->content = $formData;

    $pageData->body->portletData = $portletData;
//    $pageData->addScript("scripts/fields.js");
//
//    $pageData->addFunctionScript('var BASE = "' . URL::to('/restapi') . '";');
    
//    $pageData->addStyle('assets/customs/bootstrap-tokenfield/css/bootstrap-tokenfield.css');
//    $pageData->addStyle('assets/customs/bootstrap-tokenfield/css/tokenfield-typeahead.css');
//    
//    $pageData->addScript('assets/customs/bootstrap-tokenfield/bootstrap-tokenfield.js');
    $pageData->addScript('scripts/custom-value.js');
    
    return $pageData;
}
