<?php
namespace Frenzycode\Models;
use Eloquent;
class Groups extends Eloquent{
    protected $table = 'groups';
    public static $rules = array(
        'name' => 'required|min:3|unique:groups,name'
    );   
            
}
