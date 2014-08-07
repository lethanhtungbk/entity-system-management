<?php

namespace Frenzycode\ViewModels;
use Frenzycode\Libraries\InputHelper;
class PageMessage {
    public $title;
    public $style = 'alert-success';
    function __construct($array) {
        $this->title = InputHelper::getInput('title', $array);
        $this->style = InputHelper::getInput('style', $array);
    }
}
