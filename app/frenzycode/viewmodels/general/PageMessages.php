<?php

namespace Frenzycode\ViewModels;
use Frenzycode\ViewModels\ViewModelConfig;

class PageMessages extends ViewModelConfig {
    public $messages = array();
    public function addMessage($message)
    {
        array_push($this->messages, $message);
        return $message;                
    }
}
