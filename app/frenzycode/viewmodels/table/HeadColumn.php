<?php
namespace Frenzycode\ViewModels\Table;
use Frenzycode\Libraries\FrenzyHelper;
class HeadColumn {
    public $title;
    public $style;
    
    function __construct($array) {
        $this->title = FrenzyHelper::getValueFromArray('title', $array,'');
        $this->style = FrenzyHelper::getValueFromArray('style', $array,'');
        
    }
}
