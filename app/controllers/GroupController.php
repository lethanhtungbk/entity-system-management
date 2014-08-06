<?php

use Frenzycode\Models\Groups;
use Frenzycode\ViewModels\Breadcrumb\BreadcrumbItem;
use Frenzycode\ViewModels\Button\ButtonBar;
use Frenzycode\ViewModels\Button\Button;
use Frenzycode\ViewModels\Table\DataTable;
use Frenzycode\ViewModels\Table\HeadColumn;
use Frenzycode\ViewModels\Table\DataColumn;
use Frenzycode\ViewModels\Table\DataRow;

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

        $pageData->body->addContent($buttonBar);
        $pageData->body->addContent($dataTable);
        
        return $this->pageManager->generateView($pageData);
    }

    public function addGroup() {
        
    }

    public function editGroup($id) {
        
    }

    public function saveGroup() {
        
    }

    public function removeGroup() {
        
    }

}
