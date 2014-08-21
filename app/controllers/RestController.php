<?php

use Frenzycode\Libraries\InputHelper;
use Frenzycode\Libraries\FrenzyHelper;
use Frenzycode\Models\Field;
use Frenzycode\Models\Group;

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
    
    public function getGroups()
    {
        $groups = Group::getGroups();
        return Response::json($groups);
    }
    
    public function getGroup() {
        $id = InputHelper::getInput('id', Input::all());
        $group = ($id == "") ? new Group() : Group::getGroup($id);
        $data = new stdClass();
        $data->group = $group;
        return Response::json($data);
    }
    
    public function saveGroup()
    {
        $input = Input::all();
        $data = json_decode(InputHelper::getInput('data', $input));
        $action = InputHelper::getInput('action', $input);
        $group = FrenzyHelper::cast('Frenzycode\Models\Group', $data);        
        if ($action == 'add') {
            $group->save();
            $data = new stdClass();
            $data->success = new stdClass();
            $data->success->message = "Field added successfully.";
            $data->success->url = URL::to("setting/groups");
            return Response::json($data);
        } else if ($action == 'update') {
            $group->update();
            $data = new stdClass();
            $data->success = new stdClass();
            $data->success->message = "Field updated successfully.";
            return Response::json($data);
        } else {
            //unknow action
            $data = new stdClass();
            $data->error = new stdClass();
            $data->error->message = "Unknow action.Please do again.";
            return Response::json($data);
        }
    }
    
    public function getGroupFields()
    {
        $id = InputHelper::getInput('id', Input::all());
        $group = Group::getGroup($id);
        if ($group != null)
        {
            $data = new stdClass();
            $group->getFields();
            $data->group = $group;
            
            $fields = Field::getFields();
            //all fields assinged to group
            foreach ($group->fields as $assignField)
            {
                foreach ($fields as $index => $field)
                {
                    if ($field->id == $assignField->id)
                    {
                        unset($fields[$index]);
                    }
                }
            }
            $data->fields = array_values($fields);
            
            return Response::json($data);
        }
        //TODO: need implement cannot find group case
        return null;
    }
    
    public function saveGroupFields()
    {
        $input = Input::all();
        //$id = InputHelper::getInput('id', Input::all());
        
        $data = json_decode(InputHelper::getInput('data', $input));
        $action = InputHelper::getInput('action', $input);
        $group = FrenzyHelper::cast('Frenzycode\Models\Group', $data);
        
        if ($action == 'update-fields') {
            $group->saveFields();
            $data = new stdClass();
            $data->success = new stdClass();
            $data->success->message = "Assign fields to group successfully.";
            $data->success->url = URL::to("setting/groups");
            return Response::json($data);
        }
        
        
        //TODO: need implement cannot find group case
        return null;
    }


    public function getObjects() {
        
    }

    public function getObjectFields() {
        
    }

}
