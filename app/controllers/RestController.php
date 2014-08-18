<?php

use Frenzycode\Libraries\InputHelper;
use Frenzycode\Models\Field;

class RestController extends BaseController {

    public function getFields() {
        $fields = array(
            array("id" => 1, "name" => "Field 1"),
            array("id" => 2, "name" => "Field 2"),
            array("id" => 3, "name" => "Field 3"),
        );
        return Response::json($fields);
    }

    public function getField() {
        $input = Input::all();
        $fieldId = InputHelper::getInput('fieldId', $input);
        $field = new Field();
        $data = new stdClass();
        $data->field = $field;
        $data->fieldTypes = $field->getFieldTypes();
        $data->valueTypes = $field->getValueTypes();

        return Response::json($data);
    }
    
    public function saveField()
    {
        return Response::json(Input::all());
    }
    
    public function getObjects()
    {
        
    }
    
    public function getObjectFields()
    {
        
    }

  



}
