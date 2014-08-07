<?php

use Frenzycode\Libraries\PageManager;

class BaseController extends Controller {
    protected $messages = array();
    protected $pageManager;
    
    function __construct() {
        $this->pageManager = new PageManager();
        
    }
    
    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

}
