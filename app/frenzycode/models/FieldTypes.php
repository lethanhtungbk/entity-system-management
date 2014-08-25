<?php
namespace Frenzycode\Models;

use Eloquent;
class FieldTypes extends Eloquent
{
    protected $table = 'field_types';
    protected $fillable = array('name', 'groupId', 'group','display');
    
}