<?php

use Frenzycode\Libraries\InputHelper;
use Frenzycode\Models\FieldTypes;

class RestController extends BaseController {
    
    public function getFields()
    {
        $fields = array(
            array("id" => 1,"name"=>"Field 1"),
            array("id" => 2,"name"=>"Field 2"),
            array("id" => 3,"name"=>"Field 3"),
        );
        return Response::json($fields);
    }
    
    
    public function getFieldTypes()
    {
        $fieldTypes = array(
            array("id"=>"1","name"=>"Textedit","group"=>"Single Value","groupId"=>"1"),
            array("id"=>"2","name"=>"Textarea","group"=>"Single Value","groupId"=>"1"),
            array("id"=>"3","name"=>"Date","group"=>"Single Value","groupId"=>"1"),
            array("id"=>"4","name"=>"Datetime","group"=>"Single Value","groupId"=>"1"),
            array("id"=>"5","name"=>"Audio","group"=>"Single Value","groupId"=>"1"),
            array("id"=>"6","name"=>"Video","group"=>"Single Value","groupId"=>"1"),
            array("id"=>"7","name"=>"File","group"=>"Single Value","groupId"=>"1"),
            array("id"=>"8","name"=>"Dropdown","group"=>"Multi Value - Single Select","groupId"=>"2"),
            array("id"=>"9","name"=>"Checkbox","group"=>"Multi Value - Single Select","groupId"=>"2"),
            array("id"=>"10","name"=>"Textedit","group"=>"Multi Value - Multi Select","groupId"=>"3"),
            array("id"=>"11","name"=>"Radiobox","group"=>"Multi Value - Multi Select","groupId"=>"4"),
        );
        
        
        return Response::json($fieldTypes);
    }
    
    public function getFieldValueTypes()
    {
        $fieldValueTypes = array (
            array("id"=>1,"name"=>"Self-Defined Value"),
            array("id"=>2,"name"=>"Object Value"),
        );
        
        return Response::json($fieldValueTypes);
    }
    
    
    public function getFieldDisplay() {
        $input = Input::all();
        $valueType = InputHelper::getInput('value_type', $input, 1);
//        $data = array(
//            'display_types' => FieldTypes::where('value_type','=',$valueType)->lists('name','id'),
//        );
        
        $fieldTypes = FieldTypes::where('value_type','=',$valueType)->select('name','id')->get();
        
        return Response::json($fieldTypes);
    }

    public function getValueAssignType() {
        $input = Input::all();
        $assignValueType = InputHelper::getInput('value_assign_type', $input, 1);


        switch ($assignValueType) {
            case 3:
                $assignValue = array(
                    'id' => 'field_field_value',
                    'data' => Frenzycode\Models\Fields::lists('name','id')
                );
                break;
            case 2:
                $assignValue = array(
                    'id' => 'field_object_value',
                    'data' => \Frenzycode\Models\Groups::lists('name','id')
                );
                break;
            case 1:
            default:
                $assignValue = array();
                break;
        }
        
        $data = array(
            'assignValue' => $assignValue,
        );
        return Response::json($data);
    }

}
