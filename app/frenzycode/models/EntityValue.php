<?php
namespace Frenzycode\Models;
use Eloquent;

class EntityValue extends Eloquent{
    protected $table = "entity_values";
    protected $fillable = array('entity_id', 'field_id', 'value');
    public $timestamps = false;
}
