<?php

namespace Frenzycode\ViewModels;
class ViewModelConfig {
    public static $viewModalMap = array(
        'Frenzycode\ViewModels\Button\ButtonBar' => array('view' => 'components.button-bar','model' => 'buttonBar'),
        'Frenzycode\ViewModels\Table\DataTable' => array('view' => 'table.table-content','model' => 'dataTable'),
        'Frenzycode\ViewModels\Portlet\PortletData' => array('view' => 'portlet.portlet','model' => 'portletData'),
        'Frenzycode\ViewModels\General\PageMessages' => array('view' => 'components.messages','model' => 'pageMessages'),
    );
}
