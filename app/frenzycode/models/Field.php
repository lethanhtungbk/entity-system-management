<?php

namespace Frenzycode\Models;

class Field {

    public $id = "";
    public $name = "";
    public $fieldTypeId = 1;
    public $valueTypeId = 1;
    public $objectId;
    public $attributeId;
    public $definedValues;

    public function getFieldTypes() {        
        return array(
            array("id" => "1", "name" => "Textedit", "group" => "Single Value", "groupId" => "1"),
            array("id" => "2", "name" => "Textarea", "group" => "Single Value", "groupId" => "1"),
            array("id" => "3", "name" => "Date", "group" => "Single Value", "groupId" => "1"),
            array("id" => "4", "name" => "Datetime", "group" => "Single Value", "groupId" => "1"),
            array("id" => "5", "name" => "Audio", "group" => "Single Value", "groupId" => "1"),
            array("id" => "6", "name" => "Video", "group" => "Single Value", "groupId" => "1"),
            array("id" => "7", "name" => "File", "group" => "Single Value", "groupId" => "1"),
            array("id" => "8", "name" => "Dropdown", "group" => "Multi Value - Single Select", "groupId" => "2"),
            array("id" => "9", "name" => "Checkbox", "group" => "Multi Value - Single Select", "groupId" => "2"),
            array("id" => "10", "name" => "Textedit", "group" => "Multi Value - Multi Select", "groupId" => "3"),
            array("id" => "11", "name" => "Radiobox", "group" => "Multi Value - Multi Select", "groupId" => "4"),
        );
    }

    public function getValueTypes() {
        return array(
            array("id" => 1, "name" => "Self-Defined Value"),
            array("id" => 2, "name" => "Object Value"),
        );
    }

    public function getObjects() {
        return array(
            array("id" => 1, "name" => "Object 1"),
            array("id" => 2, "name" => "Object 2"),
            array("id" => 3, "name" => "Object 3"),
            array("id" => 4, "name" => "Object 4"),
        );
    }

}
