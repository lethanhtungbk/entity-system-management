<?php

use Frenzycode\Libraries\InputHelper;

class RestController extends BaseController {

    public function getFieldDisplay() {
        $input = Input::all();
        $selectType = InputHelper::getInput('select_type', $input, 1);


        switch ($selectType) {
            case 2:
                $fieldDisplays = array('5' => 'Dropdown', '6' => 'Checkbox');
                break;
            case 3:
                $fieldDisplays = array('7' => 'Listbox', '8' => 'Radio');
                break;
            case 1:
            default:
                $fieldDisplays = array('1' => 'Text edit', '2' => 'Text area', '3' => 'Date', '4' => 'Image');
                break;
        }

        $data = array(
            'field_displays' => $fieldDisplays,
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
                    'data' => array('1' => 'Country', '2' => 'City', '3' => 'District')
                );
                break;
            case 2:
                $assignValue = array(
                    'id' => 'field_object_value',
                    'data' => array('1' => 'Student', '2' => 'Class', '3' => 'Mark')
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
