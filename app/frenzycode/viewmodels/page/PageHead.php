<?php

namespace Frenzycode\ViewModels\Page;
use URL;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PageHead
 *
 * @author NhimXu
 */
class PageHead {

    public $title;
    public $customMetas = array();
    public $customStyles = array();

    public function addMeta($meta) {
        array_push($this->customMetas, $meta);
    }

    public function addStyle($style) {
        $style = URL::asset($style);
        if (!in_array($style, $this->customStyles))
        {
            array_push($this->customStyles, $style);
        }
    }

}
