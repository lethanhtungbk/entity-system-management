<?php

use Frenzycode\Models\PageModel;

class GroupController extends BaseController {

    public function getGroups() {
        $pageData = $this->pageModel->createPage(PageModel::PAGE_GROUPS);
        return View::make('page.page-index', array('pageData' => $pageData));
    }

    public function assignGroup($id) {
        $templateData = new stdClass();
        $templateData->action = "update-fields";
        $templateData->id = $id;
        $pageData = $this->pageModel->createPage(PageModel::PAGE_GROUP_ASSIGN, $templateData);
        return View::make('page.page-index', array('pageData' => $pageData));
    }

    public function addGroup() {
        $templateData = new stdClass();
        $templateData->action = "add";
        $templateData->id = null;
        $pageData = $this->pageModel->createPage(PageModel::PAGE_GROUP_ADD, $templateData);
        return View::make('page.page-index', array('pageData' => $pageData));
    }

    public function editGroup($id) {
        $templateData = new stdClass();
        $templateData->action = "update";
        $templateData->id = $id;
        $pageData = $this->pageModel->createPage(PageModel::PAGE_GROUP_EDIT, $templateData);
        return View::make('page.page-index', array('pageData' => $pageData));
    }

}
