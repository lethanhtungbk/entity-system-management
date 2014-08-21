<?php

namespace Frenzycode\Models;

use DB;
use Frenzycode\Libraries\FrenzyHelper;

class Group {

    public $name;
    public $icon;
    public $link;
    public $id;
    public $fields;

    function __construct() {
        
    }

    public function save() {
        $record = array();
        $record["name"] = $this->name;
        $record["link"] = $this->link;
        $record["icon"] = $this->icon;
        $this->id = DB::table('groups')->insertGetId($record);
    }

    public function update() {
        $record = array();
        $record["name"] = $this->name;
        $record["link"] = $this->link;
        $record["icon"] = $this->icon;

        DB::table('groups')->where('id', '=', $this->id)->update($record);
    }

    public static function getGroups() {
        return DB::table('groups')->select("id", "name", 'link', 'icon')->get();
    }

    public static function getGroup($id) {
        $groupdb = DB::table('groups')
                        ->where('id', '=', $id)
                        ->select('id', 'name', 'link', 'icon')->first();
        if ($groupdb != null) {
            $group = FrenzyHelper::cast('Frenzycode\Models\Group', $groupdb);
            return $group;
        }
        return null;
    }

    public function getFields() {
        $fieldsdb = DB::table('group-fields')
                        ->join('fields', 'group-fields.field_id', '=', 'fields.id')
                        ->where('group-fields.id', '=', $this->id)
                        ->select('fields.id', 'fields.name')->get();

        $groupFields = array();
        foreach ($fieldsdb as $fielddb) {
            $group = FrenzyHelper::cast('Frenzycode\Models\Field', $fielddb);
            array_push($groupFields, $group);
        }
        $this->fields = $groupFields;
    }

    public function saveFields() {
        $assignFields = $this->fields;
        $this->getFields();

        $unAssignFields = array_diff($assignFields, $this->fields);
        $newAssignFields = array_diff($this->fields, $assignFields);

        foreach ($unAssignFields as $field) {
            DB::table('group-fields')
                    ->where('group_id', '=', $this->id)
                    ->where('field_id', '=', $field->id)
                    ->delete();
        }

        foreach ($newAssignFields as $field) {
            DB::table('group-fields')->insert(
                    array('group_id' => $this->id, 'field_id' => $field->id,)
            );
        }
    }

}
