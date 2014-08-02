<?php

namespace Frenzycode\ViewModels\Breadcrumb;

use Frenzycode\Libraries\FrenzyHelper;

class BreadcrumbItem {

    public $title;
    public $icon;
    public $link;

    function __construct($array = null) {
        $this->title = FrenzyHelper::getValueFromArray('title', $array,'');
        $this->icon = FrenzyHelper::getValueFromArray('title', $array,'');
        $this->link = FrenzyHelper::getValueFromArray('title', $array,'');        
    }

}
