<?php

namespace Frenzycode\ViewModels\General;
use Frenzycode\Libraries\InputHelper;
class PageMessage {
    public $title;
    public $style = 'alert-danger';
    function __construct($array) {
        $this->title = InputHelper::getInput('title', $array);
        $this->style = InputHelper::getInput('style', $array,$this->style);
    }
}
