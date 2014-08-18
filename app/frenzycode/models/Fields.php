<?php

namespace Frenzycode\Models;

use Eloquent;

class Fields extends Eloquent {

    protected $table = 'fields';
    public static $rules = array(
        'name' => 'required|min:3|unique:groups,name'
    );
    protected $fillable = array('name');
    public $timestamps = false;
    
    public static $valueType = array('1' => 'Single value', '2' => 'Multiple values - Single select', '3' => 'Multiple value - Multiple select');
    public static $assignType =  array('1' => 'Self-Value', '2' => 'Object-Value', '3' => 'Field-Value');
    
    

}
