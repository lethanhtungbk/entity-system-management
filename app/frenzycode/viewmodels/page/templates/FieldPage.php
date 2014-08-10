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


        $fieldItem = new FormItemData();
        $fieldItem->name = 'name';
        $fieldItem->desc = 'Field Name';
        $fieldItem->ui = 'form.items.textfield';
        if ($field != null) {
            $fieldItem->value = $field->name;
        }

        if ($input != null && InputHelper::getInput('name', $input, null) != null) {
            $fieldItem->value = InputHelper::getInput('name', $input);
        }

        $formData->addFormItem($fieldItem);

        $fieldItem = new FormItemData();
        $fieldItem->name = 'value_type';
        $fieldItem->desc = "Value type";
        $fieldItem->ui = 'form.items.dropdown';
        $fieldItem->value = Fields::$valueType;
        $fieldItem->id = $fieldItem->name;
        $formData->addFormItem($fieldItem);


        $fieldItem = new FormItemData();
        $fieldItem->name = 'display_type';
        $fieldItem->desc = 'Display';
        $fieldItem->ui = 'form.items.dropdown';
        $fieldItem->id = $fieldItem->name;
        $formData->addFormItem($fieldItem);


        $fieldItem = new FormItemData();
        $fieldItem->name = 'depend_on_objects[]';
        $fieldItem->value = $groups;
        $fieldItem->desc = 'Depend on objects';
        $fieldItem->ui = 'form.items.list';
        $formData->addFormItem($fieldItem);

        $fieldItem = new FormItemData();
        $fieldItem->name = 'depend_on_fields[]';
        $fieldItem->value = Fields::lists('name','id');
        $fieldItem->desc = 'Depend on fields';
        $fieldItem->ui = 'form.items.list';
        $formData->addFormItem($fieldItem);

        $fieldItem = new FormItemData();
        $fieldItem->name = 'assign_type';
        $fieldItem->value = Fields::$assignType;
        $fieldItem->selected = 1;
        $fieldItem->desc = 'Assign value';
        $fieldItem->ui = 'form.items.dropdown';
        $fieldItem->id = $fieldItem->name;
        $formData->addFormItem($fieldItem);


        $fieldItem = new FormItemData();
        $fieldItem->name = 'field_self_value';
        $fieldItem->desc = 'Assign itself';
        $fieldItem->ui = 'form.items.token-random';
        $fieldItem->id = 'field_self_value';
        $formData->addFormItem($fieldItem);

        $fieldItem = new FormItemData();
        $fieldItem->name = 'field_field_value';
        $fieldItem->desc = 'Assign to Object';
        $fieldItem->ui = 'form.items.dropdown';
        $fieldItem->id = 'field_field_value';
        $formData->addFormItem($fieldItem);

        $fieldItem = new FormItemData();
        $fieldItem->name = 'field_object_value';

        $fieldItem->desc = 'Assign to field';
        $fieldItem->ui = 'form.items.dropdown';
        $fieldItem->id = 'field_object_value';
        $formData->addFormItem($fieldItem);


        $formData->addFormButton(new Button(array('title' => 'Cancel', 'style' => 'blue', 'link' => '/fields')));
        $this->portletData->content = $formData;

        $this->addScript("scripts/fields.js");

        $this->addFunctionScript('var BASE = "' . URL::to('/restapi') . '";');
        $this->addStyle('assets/customs/bootstrap-tokenfield/css/bootstrap-tokenfield.css');
        $this->addStyle('assets/customs/bootstrap-tokenfield/css/tokenfield-typeahead.css');
        $this->addScript('assets/customs/bootstrap-tokenfield/bootstrap-tokenfield.js');
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
