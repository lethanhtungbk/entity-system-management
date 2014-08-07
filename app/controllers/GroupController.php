<?php

use Frenzycode\Models\Groups;
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
use Frenzycode\Libraries\InputHelper;

class GroupController extends BaseController {

    public function getGroups() {
        $groups = Groups::all();
        $pageData = $this->pageManager->createPageData();
        $pageData->body->title = "Groups";

        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home', 'title' => 'Dashboard', 'link' => '/')));
        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Groups', 'link' => '/groups')));
            

        $buttonBar = new ButtonBar();
        $buttonBar->addRightButton(new Button(array('title' => 'Add', 'style' => 'blue', 'icon' => 'fa-plus', 'link' => '/groups/add')));
        $buttonBar->addRightButton(new Button(array('title' => 'Remove', 'style' => 'blue', 'icon' => 'fa-trash', 'link' => '/')));


        $dataTable = new DataTable();
        $dataTable->addHeadColoumn(new HeadColumn((array('title' => 'Name'))));
        $dataTable->addHeadColoumn(new HeadColumn((array('title' => ''))));


        foreach ($groups as $group) {
            $tableButton = new ButtonBar();
            $tableButton->addLeftButton(new Button(array('title' => 'Edit', 'style' => 'blue', 'icon' => 'fa-plus', 'link' => '/groups/edit/' . $group->id)));
            $tableButton->addLeftButton(new Button(array('title' => 'Remove', 'style' => 'blue', 'icon' => 'fa-trash', 'link' => '/groups/remove/' . $group->id)));
            $dataRow = $dataTable->addDataRow(new DataRow());
            $dataRow->addDataColumn(new DataColumn(array('data' => $group->name)));
            $dataRow->addDataColumn(new DataColumn(array('data' => $tableButton, 'style' => 'width="11%"'), DataColumn::TYPE_BUTTON));
        }



        $pageData->body->addContent($buttonBar);
        $pageData->body->addContent($dataTable);

        return $this->pageManager->generateView($pageData);
    }

    public function addGroup() {
        $pageData = $this->pageManager->createPageData();
        $pageData->body->title = "Add new group";

        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('icon' => 'fa-home', 'title' => 'Dashboard', 'link' => '/')));
        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Groups', 'link' => '/groups')));
        $pageData->body->addBreadcrumbItem(new BreadcrumbItem(array('title' => 'Add new group', 'link' => '/groups/add')));

        $portletData = new PortletData();
        $portletData->title = 'Add new group';
        $portletData->content = null;

        $formData = new FormData();
            
        $formData->url = "groups/save";
        
        
        $field = new FormItemData();
        $field->name = 'name';
        $field->desc = 'Group Name';
        $field->ui = 'form.items.textfield';
        $formData->addFormItem($field);
        
        $formData->addFormButton(new Button(array('title' => 'Cancel','style' => 'blue','link'=>'/groups')));

        $portletData->content = $formData;
        
        $pageData->body->addContent($portletData);
        return $this->pageManager->generateView($pageData);
    }

    public function editGroup($id) {
        
    }

    public function saveGroup() {
        $input = Input::all();
        $groupName = InputHelper::getInput('name', $input,'');
        
        $v = Validator::make($input,  Groups::$rules);
        
        if ($v->fails())
        {
            var_dump($v->errors());  
        }
        else
        {
            return $this->getGroups();
        }        
    }

    public function removeGroup() {
        
    }

}
