<?php

namespace Frenzycode\Models;

class URLModel {

    public static $httpGet = array(
        array("url" => "setting", "handle" => ""),
        //fields
        array("url" => "setting/fields", "handle" => "FieldController@getFields"),
        array("url" => "setting/fields/add", "handle" => "FieldController@addField"),
        array("url" => "setting/fields/edit/{id}", "handle" => "FieldController@editField"),
        //groups
        array("url" => "setting/groups", "handle" => "GroupController@getGroups"),
        array("url" => "setting/groups/add", "handle" => "GroupController@addGroup"),
        array("url" => "setting/groups/edit/{id}", "handle" => "GroupController@editGroup"),
        array("url" => "setting/groups/assign/{id}", "handle" => "GroupController@assignGroup"),
        //entities
        array("url" => "entities", "handle" => "EntityController@assignGroup"),
        array("url" => "entities/{name}", "handle" => "EntityController@getEntities"),
        array("url" => "entities/{name}/add", "handle" => "EntityController@addEntitiy"),
        array("url" => "entities/{name}/edit/{id}", "handle" => "EntityController@editEntity"),
    );
    public static $httpPost = array(
        //fields
        array("url" => "restapi/fields", "handle" => "RestController@getFields", "type" => "post"),
        array("url" => "restapi/field", "handle" => "RestController@getField", "type" => "post"),
        array("url" => "restapi/field/save", "handle" => "RestController@fieldSave", "type" => "post"),
        //groups
        array("url" => "restapi/groups", "handle" => "RestController@getGroups", "type" => "post"),
        array("url" => "restapi/group", "handle" => "RestController@getGroup", "type" => "post"),
        array("url" => "restapi/group/save", "handle" => "RestController@saveGroup", "type" => "post"),
        array("url" => "restapi/group-fields", "handle" => "RestController@getGroupFields", "type" => "post"),
        array("url" => "restapi/group-fields/save", "handle" => "RestController@saveGroupFields", "type" => "post"),
        //entities
        array("url" => "restapi/entities", "handle" => "RestController@getEntities", "type" => "post"),
        array("url" => "restapi/entities/search", "handle" => "RestController@searchEntities", "type" => "post"),
        array("url" => "restapi/entity", "handle" => "RestController@getEntity", "type" => "post"),
        array("url" => "restapi/entity/save", "handle" => "RestController@saveEntity", "type" => "post"),
    );

}
