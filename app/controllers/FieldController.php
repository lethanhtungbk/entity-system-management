<?php

use Frenzycode\Models\Groups;
use Frenzycode\Models\Fields;
use Frenzycode\ViewModels\Page\Templates\FieldPage;
use Frenzycode\Libraries\InputHelper;

use Frenzycode\ViewModels\Page\Templates\PageFactory;

class FieldController extends BaseController {

    public function getFields() {
        $pageData = PageFactory::getPage('fields');
        return View::make('page.page-index',array('pageData' => $pageData));
    }

    public function addField() {
        $templateData = new stdClass();
        $templateData->action = "add";
        $templateData->id = null;
        $pageData = PageFactory::getPage('field-add',$templateData);
        return View::make('page.page-index',array('pageData' => $pageData));
    }

    public function editField($id) {
        $templateData = new stdClass();
        $templateData->action = "update";
        $templateData->id = $id;
        $pageData = PageFactory::getPage('field-add',$templateData);
        return View::make('page.page-index',array('pageData' => $pageData));
    }

    public function saveField() {

        $input = Input::all();
        
        var_dump($input['fieldValue']);
        return;
        
        $field = new Fields();
        $field->name = InputHelper::getInput('name', $input);
        $field->value_type = InputHelper::getInput('value_type', $input);
        $field->display_type = InputHelper::getInput('display_type', $input);
        $field->assign_type = InputHelper::getInput('assign_type', $input);

        $field->depend_on_objects = implode(InputHelper::DELIMITER, InputHelper::getInput('depend_on_objects', $input, array()));
        $field->depend_on_fields = implode(InputHelper::DELIMITER, InputHelper::getInput('depend_on_fields', $input, array()));

        $field->save();

        return Redirect::to('/fields')->with('success', 'Field <b>added</b>!');
    }

    public function removeField() {
        
    }

}
