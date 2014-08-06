<?php
use Frenzycode\Models\Groups;


class GroupController extends BaseController{
    
    
    public function getGroups()
    {
        $groups = Groups::all();
        
        
        $pageData = $this->pageManager->createPageData();
        
        var_dump($pageData);
    }
    
    public function addGroup()
    {
        
    }
    
    public function editGroup($id)
    {
        
    }
    
    public function saveGroup()
    {
        
    }
    
    public function removeGroup()
    {
        
    }
}
