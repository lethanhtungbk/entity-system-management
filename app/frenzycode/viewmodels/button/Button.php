<?php

namespace Frenzycode\ViewModels\Button;

use Frenzycode\Libraries\FrenzyHelper;
class Button {
    public $link;
    public $icon;
    public $title;
    public $style;
    
    function __construct($array) {
        $this->title = FrenzyHelper::getValueFromArray('title', $array);
        $this->icon = FrenzyHelper::getValueFromArray('icon', $array);
        $this->link = FrenzyHelper::getValueFromArray('link', $array);
        $this->style = FrenzyHelper::getValueFromArray('style', $array);
    }
            
}
