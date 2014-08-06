<?php
namespace Frenzycode\ViewModels;
use View;
class BaseViewModel {
    protected $layout;
    protected $parameter;
    public function getView()
    {
        return View::make($this->layout,array($this->parameter => $this));
    }
}
