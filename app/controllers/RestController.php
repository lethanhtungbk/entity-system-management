<?php

use Frenzycode\Libraries\InputHelper;
use Frenzycode\Libraries\FrenzyHelper;
use Frenzycode\Models\Field;
use Frenzycode\Models\FieldTypes;

class RestController extends BaseController {

    public function getFields() {
        $fields = Field::getFields();
        return Response::json($fields);
    }

    public function getField() {
        $fieldId = InputHelper::getInput('fieldId', Input::all());
        $field = ($fieldId == "") ? new Field() : Field::getField($fieldId);
        $data = new stdClass();
        $data->field = $field;
        $data->fieldTypes = $field->getFieldTypes();
        $data->valueTypes = $field->getValueTypes();
        return Response::json($data);
    }

    public function saveField() {
        $input = Input::all();
        $data = json_decode(InputHelper::getInput('data', $input));
        $action = InputHelper::getInput('action', $input);
        $field = FrenzyHelper::cast('Frenzycode\Models\Field', $data);        
        if ($action == 'add') {
            $field->save();
            $data = new stdClass();
            $data->success = new stdClass();
            $data->success->message = "Field added successfully.";
            $data->success->url = URL::to("/fields");
            return Response::json($data);
        } else if ($action == 'update') {
            $field->update();
            $data = new stdClass();
            $data->success = new stdClass();
            $data->success->message = "Field updated successfully.";
            $data->success->url = URL::to("/fields");
            return Response::json($data);
        } else {
            //unknow action
            $data = new stdClass();
            $data->error = new stdClass();
            $data->error->message = "Unknow action.Please do again.";
            $data->success->url = URL::to("/fields");
            return Response::json($data);
        }
    }

    public function getObjects() {
        
    }

    public function getObjectFields() {
        
    }

}
