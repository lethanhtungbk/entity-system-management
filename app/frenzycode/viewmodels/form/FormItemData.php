<?php

namespace Frenzycode\ViewModels\Form;
use Frenzycode\Libraries\InputHelper;

class FormItemData {

    public $desc = '';
    public $name = '';
    public $value;
    public $selected;
    public $descStyle = 'col-md-4';
    public $inputStyle = 'col-md-5';
    public $showDesc = true;
    public $ui;
    public $id;
    
    function __construct($array = null) {
        $this->desc = InputHelper::getInput('desc', $array);
        $this->name = InputHelper::getInput('name', $array);
        $this->value = InputHelper::getInput('value', $array);
        $this->selected = InputHelper::getInput('selected', $array);
        $this->ui = InputHelper::getInput('ui', $array);
        $this->id = InputHelper::getInput('id', $array);
    }
}
