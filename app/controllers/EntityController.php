<?php
use Frenzycode\Models\Group;
use Frenzycode\Models\PageModel;

class EntityController extends BaseController{
    public function getEntities($link)
    {
        $group = Group::getGroupByLink($link);
        $templateData = new stdClass();
        $templateData->action = "add";
        $templateData->id = null;
        $templateData->portletTitle = $group->name;
        $templateData->groupId = $group->id;
        $templateData->groupLink = $group->link;
        $pageData = $this->pageModel->createPage(PageModel::PAGE_ENTITIES, $templateData);
        return View::make('page.page-index',array('pageData' => $pageData));
    }
    
    public function addEntitiy($link)
    {
        $group = Group::getGroupByLink($link);
        $templateData = new stdClass();
        $templateData->action = "add";
        $templateData->id = null;
        $templateData->portletTitle = $group->name;
        $templateData->groupLink = $group->link;
        $pageData = $this->pageModel->createPage(PageModel::PAGE_ENTITY_ADD, $templateData);
        return View::make('page.page-index',array('pageData' => $pageData));
    }
    
    public function editEntity($link,$id)
    {
        
    }
}
