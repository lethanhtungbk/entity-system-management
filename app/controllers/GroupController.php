<?php

use Frenzycode\Models\Groups;
use Frenzycode\Models\Fields;
use Frenzycode\ViewModels\Page\Templates\GroupPage;
use Frenzycode\Libraries\InputHelper;
use Frenzycode\ViewModels\Page\Templates\PageFactory;

class GroupController extends BaseController {

    public function getGroups() {
        $pageData = PageFactory::getPage('groups');
        return View::make('page.page-index', array('pageData' => $pageData));
    }

    public function assignGroup($id) {
        $templateData = new stdClass();
        $templateData->action = "update-fields";
        $templateData->id = $id;
        $pageData = PageFactory::getPage('group-assign',$templateData);
        return View::make('page.page-index', array('pageData' => $pageData));
    }

    public function addGroup() {
        $templateData = new stdClass();
        $templateData->action = "add";
        $templateData->id = null;
        $pageData = PageFactory::getPage('group-detail', $templateData);
        return View::make('page.page-index', array('pageData' => $pageData));
    }

    public function editGroup($id) {
        $templateData = new stdClass();
        $templateData->action = "update";
        $templateData->id = $id;
        $pageData = PageFactory::getPage('group-detail', $templateData);
        return View::make('page.page-index', array('pageData' => $pageData));
    }

//    public function addGroup() {
//        $groupPage = new GroupPage();
//        $groupPage->setDetailMode(null, Session::get('input'), Fields::lists('name', 'id'));
//        $messages = Session::get('messages');
//        if ($messages != null) {
//            foreach ($messages as $message) {
//                $groupPage->addPageMessage(array('title' => $message, 'style' => 'alert-danger'));
//            }
//        }
//        return $groupPage->buildPage();
//    }
//
//    public function editGroup($id) {
//        $group = Groups::find($id);
//        if ($group == null) {
//            return Redirect::to('/groups')->with('error', 'Group cannot be found.');
//        } else {
//            $groupPage = new GroupPage();
//            $groupPage->setDetailMode($group, Session::get('input'), Fields::lists('name', 'id'));
//            $messages = Session::get('messages');
//            if ($messages != null) {
//                foreach ($messages as $message) {
//                    $groupPage->addPageMessage(array('title' => $message, 'style' => 'alert-danger'));
//                }
//            }
//            return $groupPage->buildPage();
//        }
//    }
//
//    public function saveGroup() {
//        $input = Input::all();
//        $groupName = InputHelper::getInput('name', $input, '');
//
//        $v = Validator::make($input, Groups::$rules);
//        if ($v->fails()) {
//            return Redirect::to('/groups/add')->with('input', $input)->with('messages', $v->errors()->all());
//        } else {
//            $group = new Groups();
//            $this->saveGroup($group,$input);
//            return Redirect::to('/groups')->with('success', 'Group <b>added</b>. Please edit group to assign fields to group.');
//        }
//    }
//
//    private function saveGroupToDB(&$group,$input) {
//        $group->name = InputHelper::getInput('name', $input);
//        $fields = InputHelper::getInput('fields', $input, array());
//        if (count($fields) > 0) {
//            $group->fields = implode(InputHelper::DELIMITER, $fields);
//        }
//        $group->save();
//    }
//
//    public function updateGroup() {
//        $input = Input::all();
//        $id = InputHelper::getInput('id', $input, '');
//
//        $group = Groups::find($id);
//        if ($group == null) {
//            return Redirect::to('/groups')->with('error', 'Group cannot be found.');
//        } else {
//            $groupName = InputHelper::getInput('name', $input);
//            $v = Validator::make($input, Groups::$rules);
//
//            if ($groupName == $group->name) {
//                $this->saveGroupToDB($group,$input);
//                return Redirect::to('/groups')->with('success', 'Group <b>updated</b>!');
//            } else {
//                if ($v->passes()) {
//                    $this->saveGroupToDB($group,$input);
//                    return Redirect::to('/groups')->with('success', 'Group <b>updated</b>!');
//                } else {
//                    return Redirect::to('/groups/edit/' . $id)->with('input', $input)->with('messages', $v->errors()->all());
//                }
//            }
//        }
//    }
//
//    public function removeGroup() {
//        
//    }
}
