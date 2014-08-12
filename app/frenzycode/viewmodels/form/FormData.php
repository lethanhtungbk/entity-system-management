<?php
namespace Frenzycode\ViewModels\Form;
class FormData {
    public $url;
    public $class = 'form-horizontal';
    public $method = 'post';
    public $formItems = array();
    public $actionClass = 'right';
    public $buttons = array();
    
    public function addFormItem($formItem)
    {
        array_push($this->formItems, $formItem);
        return $formItem;
    }
    
    public function addFormButton($button)
    {
        array_push($this->buttons,$button);
        return $button;
    }
}
