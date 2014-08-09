<?php

namespace Frenzycode\ViewModels\General;
use Frenzycode\ViewModels\BaseViewModel;

class PageMessages extends BaseViewModel {
    public $messages = array();
    public function addMessage($message)
    {
        array_push($this->messages, $message);
        return $message;                
    }
}
