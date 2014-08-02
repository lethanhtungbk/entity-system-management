<?php

namespace Frenzycode\Libraries;

use URL;

class FrenzyHelper {

    public static function getValueFromArray($index, $array, $default = null) {
        if ($array == null || !is_array($array)) {
            return $default;
        }

        if (array_key_exists($index, $array)) {
            return $array[$index];
        }
        return $default;
    }

    public static function generateMenu($menus) {
        if ($menus == null || !is_array($menus)) {
            return '';
        }

        $output = '';
        foreach ($menus as $index => $menu) {
            $liclass = '';
            if ($index == 0) {
                $liclass = 'start ';
            }

            if ($menu->isActive) {
                $liclass .= ' active';
            }
            $itag = ($menu->icon == '') ? '' : 'class="' . $menu->icon . '"';

            $hasSubItem = count($menu->children) > 0;
            $href = $hasSubItem ? 'javascript;;' : URL::to($menu->link) ;

            $subMenu = $hasSubItem ? sprintf('<ul class="sub-menu">%s</ul>', self::generateMenu($menu->children)) : '';

            if ($hasSubItem) {
                $arrowtag = $menu->isActive ? '<span class="arrow open"></span>' : '<span class="arrow"></span>';
            } else {
                $arrowtag = '';
            }

            $title = sprintf('<li class="%s"><a href="%s"><i %s></i> <span class="title">%s</span>%s</a>%s</li>', $liclass, $href, $itag, $menu->title, $arrowtag, $subMenu);
            $output .= $title;
        }
        return $output;
    }

}
