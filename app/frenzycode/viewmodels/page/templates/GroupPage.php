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

use View;
class GroupPage extends PageData {

    protected $isListMode = true;
    protected $dataTable;
    protected $buttonBar;
    protected $portletData;
    protected $pageMessages;

    public function setListMode($groups) {
        $this->isListMode = true;

        $this->body->title = "Groups";

        $this->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home', 'title' => 'Dashboard', 'link' => '/')));
        $this->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Groups', 'link' => '/groups')));

        $this->buttonBar = new ButtonBar();
        $this->buttonBar->addRightButton(new Button(array('title' => 'Add', 'style' => 'blue', 'icon' => 'fa-plus', 'link' => '/groups/add')));
        $this->buttonBar->addRightButton(new Button(array('title' => 'Remove', 'style' => 'blue', 'icon' => 'fa-trash', 'link' => '/')));

        $this->dataTable = new DataTable();
        $this->dataTable->addHeadColoumn(new HeadColumn((array('title' => 'Name'))));
        $this->dataTable->addHeadColoumn(new HeadColumn((array('title' => ''))));


        foreach ($groups as $group) {
            $dataRow = $this->dataTable->addDataRow(new DataRow());
            $tableButton = new ButtonBar();
            $tableButton->addLeftButton(new Button(array('title' => 'Edit', 'style' => 'blue', 'icon' => 'fa-plus', 'link' => '/groups/edit/' . $group->id)));
            $tableButton->addLeftButton(new Button(array('title' => 'Fields', 'style' => 'blue', 'icon' => 'fa-trash', 'link' => '/groups/remove/' . $group->id)));
            $tableButton->addLeftButton(new Button(array('title' => 'Remove', 'style' => 'blue', 'icon' => 'fa-trash', 'link' => '/groups/remove/' . $group->id)));
            $dataRow->addDataColumn(new DataColumn(array('data' => $group->name)));
            $dataRow->addDataColumn(new DataColumn(array('data' => $tableButton, 'style' => 'width="18%"'), DataColumn::TYPE_BUTTON));
        }
    }

    public function setDetailMode($group = null,$input = null) {
        $this->isListMode = false;

        $title = ($group == null) ? 'Add new group' : $group->name;

        $this->body->title = $title;

        $this->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home', 'title' => 'Dashboard', 'link' => '/')));
        $this->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Groups', 'link' => '/groups')));

        $this->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => $title)));

        $this->portletData = new PortletData();
        $this->portletData->title = $title;


        $formData = new FormData();

        $formData->url = ($group == null)?"groups/save":"groups/update";


        $field = new FormItemData();
        $field->name = 'name';
        $field->desc = 'Group Name';
        $field->ui = 'form.items.textfield';
        if ($group != null)
        {
            $field->value = $group->name;
        }
        
        if ($input != null && InputHelper::getInput('name',$input,null) != null)
        {
            $field->value = InputHelper::getInput('name',$input);
        }
        
        $formData->addFormItem($field);
        $formData->addFormButton(new Button(array('title' => 'Cancel', 'style' => 'blue', 'link' => '/groups')));
        $this->portletData->content = $formData;

    }
    
    public function addPageMessage($message)
    {
        if ($this->pageMessages == null)
        {
            $this->pageMessages = new PageMessages();
        }
        
        $this->pageMessages->addMessage(new PageMessage($message));
    }
    
    
    public function buildPage() {
        $this->body->addContent($this->pageMessages);
        if ($this->isListMode) {
            $this->body->addContent($this->buttonBar);
            $this->body->addContent($this->dataTable);
        }
        else
        {
            $this->body->addContent($this->portletData);
        }
        
        return View::make('page.page-index', array('pageData' => $this));
    }

}
