<?php

namespace Frenzycode\ViewModels\Page\Templates;

use Frenzycode\ViewModels\Page\PageData;
use Frenzycode\ViewModels\Breadcrumb\BreadcrumbItem;
use Frenzycode\ViewModels\Button\ButtonBar;
use Frenzycode\ViewModels\Button\Button;
use Frenzycode\ViewModels\Table\DataTable;
use Frenzycode\ViewModels\Table\HeadColumn;
use Frenzycode\ViewModels\Table\DataColumn;
use Frenzycode\ViewModels\Table\DataRow;
use Frenzycode\ViewModels\Portlet\PortletData;
use Frenzycode\ViewModels\Form\FormData;
use Frenzycode\ViewModels\Form\FormItemData;
use Frenzycode\ViewModels\General\PageMessages;
use Frenzycode\ViewModels\General\PageMessage;
use Frenzycode\Libraries\InputHelper;
use Frenzycode\Models\Fields;
use View;
use URL;

class FieldPage extends PageData {

    protected $isListMode = true;
    protected $dataTable;
    protected $buttonBar;
    protected $portletData;
    protected $pageMessages;

    public function setListMode($fields) {
        $this->isListMode = true;

        $this->body->title = "Fields";

        $this->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home', 'title' => 'Dashboard', 'link' => '/')));
        $this->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Fields', 'link' => '/fields')));

        $this->buttonBar = new ButtonBar();
        $this->buttonBar->addRightButton(new Button(array('title' => 'Add', 'style' => 'blue', 'icon' => 'fa-plus', 'link' => '/fields/add')));
        $this->buttonBar->addRightButton(new Button(array('title' => 'Remove', 'style' => 'blue', 'icon' => 'fa-trash', 'link' => '/')));

        $this->dataTable = new DataTable();
        $this->dataTable->addHeadColoumn(new HeadColumn((array('title' => 'Name'))));
        $this->dataTable->addHeadColoumn(new HeadColumn((array('title' => ''))));


        foreach ($fields as $field) {
            $dataRow = $this->dataTable->addDataRow(new DataRow());
            $tableButton = new ButtonBar();
            $tableButton->addLeftButton(new Button(array('title' => 'Edit', 'style' => 'blue', 'icon' => 'fa-plus', 'link' => '/fields/edit/' . $field->id)));
            $tableButton->addLeftButton(new Button(array('title' => 'Remove', 'style' => 'blue', 'icon' => 'fa-trash', 'link' => '/fields/remove/' . $field->id)));
            $dataRow->addDataColumn(new DataColumn(array('data' => $field->name)));
            $dataRow->addDataColumn(new DataColumn(array('data' => $tableButton, 'style' => 'width="18%"'), DataColumn::TYPE_BUTTON));
        }
    }

    public function setDetailMode($field = null, $input = null,$groups = null,$fields = null) {
        $this->isListMode = false;

        $title = ($field == null) ? 'Add new field' : $field->name;

        $this->body->title = $title;

        $this->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home', 'title' => 'Dashboard', 'link' => '/')));
        $this->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Fields', 'link' => '/fields')));

        $this->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => $title)));

        $this->portletData = new PortletData();
        $this->portletData->title = $title;


        $formData = new FormData();

        $formData->url = ($field == null) ? "fields/save" : "fields/update";


        $fieldItem =  $formData->addFormItem(new FormItemData(array('desc' => 'Field name','name' => 'name','ui'=>'form.items.textfield')));
        if ($field != null) {
            $fieldItem->value = $field->name;
        }

        if ($input != null && InputHelper::getInput('name', $input, null) != null) {
            $fieldItem->value = InputHelper::getInput('name', $input);
        }

        $formData->addFormItem(new FormItemData(array('desc' => 'Value type','name' => 'value_type','ui'=>'form.items.dropdown','value' =>Fields::$valueType,'id'=>'value_type')));
        $formData->addFormItem(new FormItemData(array('desc' => 'Display','name' => 'display_type','ui'=>'form.items.dropdown','id'=>'display_type')));
        $formData->addFormItem(new FormItemData(array('desc' => 'Depend on objects','name' => 'depend_on_objects[]','ui'=>'form.items.list','value'=>$groups)));
        $formData->addFormItem(new FormItemData(array('desc' => 'Depend on fields','name' => 'depend_on_fields[]','ui'=>'form.items.list','value'=>Fields::lists('name','id'))));
        $formData->addFormItem(new FormItemData(array('desc' => 'Assign value','name' => 'assign_type','ui'=>'form.items.dropdown','value'=>Fields::$assignType,'id'=>'assign_type','selected'=>'1')));

        $formData->addFormItem(new FormItemData(array('desc' => 'Assign itself','name' => 'field_self_value','ui'=>'form.items.custom-value','id'=>'field_self_value')));
        $formData->addFormItem(new FormItemData(array('desc' => 'Assign to Object','name' => 'field_field_value','ui'=>'form.items.dropdown','id'=>'field_field_value')));
        $formData->addFormItem(new FormItemData(array('desc' => 'Assign to field','name' => 'field_object_value','ui'=>'form.items.dropdown','id'=>'field_object_value')));


        $formData->addFormButton(new Button(array('title' => 'Cancel', 'style' => 'blue', 'link' => '/fields')));
        $this->portletData->content = $formData;
        
        $this->addScript('scripts/fields.js');
        $this->addScript('scripts/custom-value.js');
        $this->addFunctionScript('var BASE = "' . URL::to('/restapi') . '";');
    }

    public function addPageMessage($message) {
        if ($this->pageMessages == null) {
            $this->pageMessages = new PageMessages();
        }

        $this->pageMessages->addMessage(new PageMessage($message));
    }

    public function buildPage() {
        $this->body->addContent($this->pageMessages);
        if ($this->isListMode) {
            $this->body->addContent($this->buttonBar);
            $this->body->addContent($this->dataTable);
        } else {
            $this->body->addContent($this->portletData);
        }

        return View::make('page.page-index', array('pageData' => $this));
    }

}
