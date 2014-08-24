<?php
use Frenzycode\Models\PageModel;
class BaseController extends Controller {
    protected $messages = array();
    protected $pageModel;
    
    function __construct() {
        $this->pageModel = new PageModel();
        
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
