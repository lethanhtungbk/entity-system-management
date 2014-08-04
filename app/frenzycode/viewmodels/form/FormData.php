<?php
namespace Frenzycode\ViewModels\Form;
class FormData {
    public $url;
    public $class = 'form-horizontal';
    public $method = 'post';
    public $formItems = array();
    
    
    public function addFormItem($formItem)
    {
        array_push($this->formItems, $formItem);
    }
}
