<?php

namespace Frenzycode\Models;

use Frenzycode\Models\Field;
use Frenzycode\Models\EntityValue;
use DB;

class Entity {

    public $id;
    public $name;
    public $fieldValues;
    public $groupId;

    public function getEntity($id) {
        return null;
    }

    public static function getEntityFields($groupId) {
        $fieldIds = DB::table('group_fields')
                        ->leftJoin('fields', 'group_fields.field_id', '=', 'fields.id')
                        ->where('group_fields.group_id', '=', $groupId)
                        ->select('fields.id')->get();

        $fields = array();

        foreach ($fieldIds as $fieldId) {
            $field = Field::getField($fieldId->id);
            $fieldTypes = FieldTypes::lists('display', 'id');
            if (array_key_exists($field->field_type_id, $fieldTypes)) {
                $field->display = $fieldTypes[$field->field_type_id];
            }
            array_push($fields, $field);
        }
        return $fields;
    }

    private function updateEntityValue() {
        if ($this->fieldValues != null) {
            foreach ($this->fieldValues as $fieldValue) {
                if (is_array($fieldValue->value)) {
                    foreach ($fieldValue->value as $v) {
                        EntityValue::firstOrCreate(array(
                            "entity_id" => $this->id,
                            "field_id" => $fieldValue->id,
                            "value" => $v));
                    }
                } else {
                    EntityValue::firstOrCreate(array(
                        "entity_id" => $this->id,
                        "field_id" => $fieldValue->id,
                        "value" => $fieldValue->value));
                }
            }
        }
    }

    public function save() {
        $record = array();
        $record["name"] = $this->name;
        $record["group_id"] = $this->groupId;
        $this->id = DB::table('entities')->insertGetId($record);
        $this->updateEntityValue();
    }

}
