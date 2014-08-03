<?php
namespace Frenzycode\ViewModels\Table;

class DataRow {
    public $dataColumns = array();
    
    public function addDataColumn($coloumn)
    {
        array_push($this->dataColumns,$coloumn);
    }        
}
