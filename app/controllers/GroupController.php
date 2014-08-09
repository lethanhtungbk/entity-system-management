<?php

use Frenzycode\Models\Groups;
use Frenzycode\ViewModels\Page\Templates\GroupPage;
use Frenzycode\Libraries\InputHelper;
class GroupController extends BaseController {

    public function getGroups() {
        $groups = Groups::all();
        $groupPage = new GroupPage();
        $groupPage->setListMode($groups);
        $success = Session::get('success');
        if ($success != null) {
            $groupPage->addPageMessage(array('title' => $success, 'style' => 'alert-success'));
        }
        $fail = Session::get('error');
        if ($fail != null) {
            $groupPage->addPageMessage(array('title' => $fail, 'style' => 'alert-danger'));
        }
        return $groupPage->buildPage();
    }

    public function addGroup() {
        $groupPage = new GroupPage();
        $groupPage->setDetailMode(null, Session::get('input'));
        $messages = Session::get('messages');
        if ($messages != null) {
            foreach ($messages as $message) {
                $groupPage->addPageMessage(array('title' => $message, 'style' => 'alert-danger'));
            }
        }
        return $groupPage->buildPage();
    }

    public function editGroup($id) {
        $group = Groups::find($id);
        if ($group == null) {
            return Redirect::to('/groups')->with('error', 'Group cannot be found.');
        } else {
            $groupPage = new GroupPage();
            $groupPage->setDetailMode($group, Session::get('input'));
            $messages = Session::get('messages');
            if ($messages != null) {
                foreach ($messages as $message) {
                    $groupPage->addPageMessage(array('title' => $message, 'style' => 'alert-danger'));
                }
            }
            return $groupPage->buildPage();
        }
    }

    public function saveGroup() {
        $input = Input::all();
        $groupName = InputHelper::getInput('name', $input, '');

        $v = Validator::make($input, Groups::$rules);
        if ($v->fails()) {
            return Redirect::to('/groups/add')->with('input', $input)->with('messages', $v->errors()->all());
        } else {
            $group = new Groups();
            $group->name = $groupName;
            $group->save();
            return Redirect::to('/groups')->with('success', 'Group <b>added</b>. Please edit group to assign fields to group.');
        }
    }

    public function removeGroup() {
        
    }

}
