<?php

use Frenzycode\Models\Groups;
use Frenzycode\Models\Fields;
use Frenzycode\ViewModels\Page\Templates\FieldPage;
use Frenzycode\Libraries\InputHelper;

use Frenzycode\ViewModels\Page\Templates\PageFactory;

class FieldController extends BaseController {

    public function getFields() {
//        $fields = Fields::all();
//        $fieldPage = new FieldPage();
//        $this->configPage($fieldPage);
//        $fieldPage->setListMode($fields);
//        $success = Session::get('success');
//        if ($success != null) {
//            $fieldPage->addPageMessage(array('title' => $success, 'style' => 'alert-success'));
//        }
//        $fail = Session::get('error');
//        if ($fail != null) {
//            $fieldPage->addPageMessage(array('title' => $fail, 'style' => 'alert-danger'));
//        }
//        return $fieldPage->buildPage();
    
        $pageData = PageFactory::getPage('fields');
        return View::make('page.page-index',array('pageData' => $pageData));
    }

    public function addField() {
//        $fieldPage = new FieldPage();
//        $fieldPage->setDetailMode(null, Session::get('input'), Groups::lists('name', 'id'), Fields::lists('name', 'id'));
//        $messages = Session::get('messages');
//        if ($messages != null) {
//            foreach ($messages as $message) {
//                $fieldPage->addPageMessage(array('title' => $message, 'style' => 'alert-danger'));
//            }
//        }
//        return $fieldPage->buildPage();
        $pageData = PageFactory::getPage('field-add');
        return View::make('page.page-index',array('pageData' => $pageData));
    }

    public function editField($id) {
        $pageData = PageFactory::getPage('field-add');
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
