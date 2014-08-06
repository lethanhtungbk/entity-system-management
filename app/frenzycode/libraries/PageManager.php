<?php
namespace Frenzycode\Libraries;

use Frenzycode\ViewModels\Page\PageData;

class PageManager {
    public function createPageData()
    {
        $pageData = new PageData();

        $pageData->head->title = "Entity Managemet System";
        $pageData->footer->title = "Entity Management System &copy; 2014.";
        
        return $pageData;
    }
}
