<?php
namespace Frenzycode\ViewModels\Button;
class ButtonBar {
    public $leftButtons = array();
    public $rightButtons = array();
    
    public function addLeftButton($button)
    {
        array_push($this->leftButtons, $button);
    }
    public function addRightButton($button)
    {
        array_push($this->rightButtons, $button);
    }
}
