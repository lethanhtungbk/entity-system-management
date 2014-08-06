<?php
namespace Frenzycode\ViewModels\Table;
use Frenzycode\ViewModels\BaseViewModel;
class DataTable extends BaseViewModel {
    protected $layout = 'table.table-content';
    protected $parameter = 'dataTable';




    public $checkAllMode = true;
    public $id;
    
    public $headColumns = array();
    public $dataRows = array();
    
   
    
    public function addHeadColoumn($headColoumn)
    {
        array_push($this->headColumns,$headColoumn);
    }
    
    public function addDataRow($dataRow)
    {
        array_push($this->dataRows,$dataRow);
        return $dataRow;
    }
    
    
}
