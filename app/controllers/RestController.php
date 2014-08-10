<?php

use Frenzycode\Libraries\InputHelper;
use Frenzycode\Models\FieldTypes;

class RestController extends BaseController {

    public function getFieldDisplay() {
        $input = Input::all();
        $valueType = InputHelper::getInput('value_type', $input, 1);
        $data = array(
            'display_types' => FieldTypes::where('value_type','=',$valueType)->lists('name','id'),
        );
        return Response::json($data);
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
