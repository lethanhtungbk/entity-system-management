<?php

namespace Frenzycode\Models;

use DB;
use Frenzycode\Libraries\FrenzyHelper;

class Group {
    public $name;
    public $id;
    function __construct() {
    }

    public function save() {
        $record = array();
        $record["name"] = $this->name;
        $this->id = DB::table('groups')->insertGetId($record);
    }

    public function update() {
        $record = array();
        $record["name"] = $this->name;
        DB::table('groups')->where('id', '=', $this->id)->update($record);
    }
    
    public static function getGroups() {
        return DB::table('groups')->select("id", "name")->get();
    }
    
    public static function getGroup($id) {
        $groupdb = DB::table('groups')
                        ->where('id', '=', $id)
                        ->select('id', 'name')->first();
        if ($groupdb != null) {
            $group = FrenzyHelper::cast('Frenzycode\Models\Group', $groupdb);
            return $group;
        }
        return null;
    }
}
