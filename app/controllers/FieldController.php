<?php

use Frenzycode\Models\PageModel;

class FieldController extends BaseController {

    public function getFields() {
        $pageData = $this->pageModel->createPage(PageModel::PAGE_FIELDS);
        return View::make('page.page-index',array('pageData' => $pageData));
    }

    public function addField() {
        $templateData = new stdClass();
        $templateData->action = "add";
        $templateData->id = null;
        $pageData = $this->pageModel->createPage(PageModel::PAGE_FIELD_ADD,$templateData);
        return View::make('page.page-index',array('pageData' => $pageData));
    }

    public function editField($id) {
        $templateData = new stdClass();
        $templateData->action = "update";
        $templateData->id = $id;
        $pageData = $this->pageModel->createPage(PageModel::PAGE_FIELD_EDIT,$templateData);
        return View::make('page.page-index',array('pageData' => $pageData));
    }
}
