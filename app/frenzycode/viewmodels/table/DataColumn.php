<?php

namespace Frenzycode\ViewModels\Table;
use Frenzycode\Libraries\FrenzyHelper;
class DataColumn {
    const TYPE_TEXT = 1;
    const TYPE_BUTTON = 2;
    const TYPE_LINK = 3;
    public $data;
    public $type;
    public $style;
    
    function __construct($array,$type = self::TYPE_TEXT) {
        $this->data = FrenzyHelper::getValueFromArray('data', $array,'');
        $this->style = FrenzyHelper::getValueFromArray('style', $array,'');     
        $this->type = $type;
    }
}
