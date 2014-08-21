<?php

namespace Frenzycode\ViewModels\Page\Templates;

class RouteManager {

    public static function getRoute() {
        return array(
            array("url" => "/" , "handle" => "" , "type" => "get"),                
            array("url" => "setting" , "handle" => "" , "type" => "get"),                
            array("url" => "setting/fields" , "handle" => "FieldController@getFields" , "type" => "get"),                
            array("url" => "setting/fields/add" , "handle" => "FieldController@addField" , "type" => "get"),                
            array("url" => "setting/fields/edit/{id}" , "handle" => "FieldController@editField" , "type" => "get"),                
            
            array("url" => "setting/groups" , "handle" => "GroupController@getGroups" , "type" => "get"),                
            array("url" => "setting/groups/add" , "handle" => "GroupController@addGroup" , "type" => "get"),                
            array("url" => "setting/groups/edit/{id}" , "handle" => "GroupController@editGroup" , "type" => "get"),                
            array("url" => "setting/groups/assign/{id}" , "handle" => "GroupController@assignGroup" , "type" => "get"),                
            
            
            array("url" => "restapi/fields" , "handle" => "RestController@getFields" , "type" => "post"),                
            array("url" => "restapi/field" , "handle" => "RestController@getField" , "type" => "post"),                
            array("url" => "restapi/field-save" , "handle" => "RestController@fieldSave" , "type" => "post"),                
            
            array("url" => "restapi/groups" , "handle" => "RestController@getGroups" , "type" => "post"),                
            array("url" => "restapi/group" , "handle" => "RestController@getGroup" , "type" => "post"),  
            array("url" => "restapi/group/save" , "handle" => "RestController@saveGroup" , "type" => "post"),                
            array("url" => "restapi/group-fields" , "handle" => "RestController@getGroupFields" , "type" => "post"),  
            array("url" => "restapi/group-fields/save" , "handle" => "RestController@saveGroupFields" , "type" => "post"),  
            
//            array("url" => "restapi/field-save" , "handle" => "RestController@fieldSave" , "type" => "post"),                
        );
    }
    
    public static function getMenus() {
        return array(
            array('icon' => 'icon-home', 'title' => 'Dashboard', 'link' => '/'),
            array('icon' => 'icon-home', 'title' => 'Setting', 'link' => 'setting', 'children' => array(
                array('icon' => 'icon-home', 'title' => 'Fields', 'link' => 'setting/fields'),
                array('icon' => 'icon-home', 'title' => 'Groups', 'link' => 'setting/groups'),
            )),
        );
    }

}
