<?php

namespace Frenzycode\Models;

use Frenzycode\Models\Field;
use Frenzycode\Models\EntitySingleValue;
use Frenzycode\Models\EntityMultiValue;
use Frenzycode\Libraries\FrenzyHelper;
use DB;

class Entity {

    public $id;
    public $name;
    public $fieldValues = array();
    public $groupId;

    public static function getEntities($groupId) {
        return DB::table('entities')->select('id', 'name', 'group_id')->get();
    }

    public static function getEntity($id) {
        $entityDb = DB::table('entities')->where('id', '=', $id)->select('id', 'group_id', 'name')->first();
        if ($entityDb != null) {
            $entity = FrenzyHelper::cast('Frenzycode\Models\Entity', $entityDb);
            $singleValues = DB::table('entity_single_values')->where('entity_id', '=', $entity->id)->select('field_id', 'value')->get();
            $entity->fieldValues += $singleValues;
            $multipleValues = DB::table('entity_multi_values')->where('entity_id', '=', $entity->id)->select('field_id', 'value')->orderBy('field_id')->get();
            $values = array();
            foreach ($multipleValues as $value) {
                if (!array_key_exists($value->field_id, $values)) {
                    $values[$value->field_id] = array();
                }
                array_push($values[$value->field_id], $value->value);
            }
            foreach ($values as $index => $value) {
                $fieldValue = new \stdClass();
                $fieldValue->field_id = $index;
                $fieldValue->value = $value;
                array_push($entity->fieldValues, $fieldValue);
            }
        }

        return $entity;
    }

    public static function getEntityFields($groupId) {
        $fieldIds = DB::table('group_fields')
                        ->join('fields', 'group_fields.field_id', '=', 'fields.id')
                        ->where('group_fields.group_id', '=', $groupId)
                        ->select('fields.id')->get();
        $fields = array();
        $fieldTypes = DB::table('field_types')->select('id', 'groupId', 'display')->get();
        foreach ($fieldIds as $fieldId) {
            $field = Field::getField($fieldId->id);
            foreach ($fieldTypes as $fieldType) {
                if ($fieldType->id == $field->field_type_id) {
                    $field->display = $fieldType->display;
                    $field->fieldValueType = $fieldType->groupId;
                    break;
                }
            }
            array_push($fields, $field);
        }
        return $fields;
    }

    private function updateEntityValue() {
        if ($this->fieldValues != null) {
            foreach ($this->fieldValues as $fieldValue) {
                if (is_array($fieldValue->value)) {
                    EntityMultiValue::where('entity_id', '=', $this->groupId)
                            ->where('field_id', '=', $fieldValue->field_id)
                            ->whereNotIn('value', $fieldValue->value)
                            ->delete();

                    foreach ($fieldValue->value as $v) {
                        EntityMultiValue::firstOrCreate(array(
                            "entity_id" => $this->id,
                            "field_id" => $fieldValue->field_id,
                            "value" => $v));
                    }
                } else {
                    $entityValue = EntitySingleValue::firstOrNew(array(
                                "entity_id" => $this->id,
                                "field_id" => $fieldValue->field_id));

                    if ($entityValue->value != $fieldValue->value) {
                        $entityValue->value = $fieldValue->value;
                        $entityValue->save();
                    }
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

    public function update() {
        $record = array();
        $record["name"] = $this->name;
        $record["group_id"] = $this->groupId;
        DB::table('entities')->where('id', '=', $this->id)->update($record);
        $this->updateEntityValue();
    }

    public static function getEntitiesFieldsForSearch($groupId, &$hasTextSearch) {
        $fields = self::getEntityFields($groupId);
        foreach ($fields as $index => $field) {
            if ($field->fieldValueType == 1) {
                $hasTextSearch = true;
                unset($fields[$index]);
            } else if ($field->fieldValueType == 2) {
                //add no selected
                array_unshift($field->defineValues, array("id" => 0, "value" => "-- Select --"));
            }
        }
        $fields = array_values($fields);
        return $fields;
    }

    public static function searchEntities($groupId, $searchFields, $textsearch) {
        $entities = array();


        return $entities;
    }

    private static function getIdArray($array) {
        $ids = array();
        if ($array != null) {
            foreach ($array as $a) {
                array_push($ids, $a->id);
            }
        }
        return $ids;
    }

    public static function testSearch() {
        $entities = array();

        $entityIds = DB::table("entities")->where("group_id", "=", 5)->select("id")->get();

        $ids = self::getIdArray($entityIds);


        //get text search
        $searchFields = array(
            array("fieldId" => 107, "selected" => "3", "fieldValueType" => "2"),
            array("fieldId" => 108, "selected" => "5", "fieldValueType" => "2"),
            array("fieldId" => 109, "selected" => array("10", "11"), "fieldValueType" => "3"),
            array("fieldId" => 110, "selected" => array("13", "14", "15"), "fieldValueType" => "3"),
        );

        foreach ($searchFields as $searchField) {
            if ($searchField["fieldValueType"] == 2) {
                $entityIds = DB::table("entity_single_values")->select("entity_id as id")->get();
                $ids = self::getIdArray($entityIds);
            } else if ($searchField["fieldValueType"] == 3) {
                
            }
        }



        var_dump($ids);



        return $entities;
    }

}
