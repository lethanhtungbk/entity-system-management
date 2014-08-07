<?php
namespace Frenzycode\ViewModels\Button;
use Frenzycode\ViewModels\BaseViewModel;
class ButtonBar extends BaseViewModel {
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
