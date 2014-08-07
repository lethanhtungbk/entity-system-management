<?php

namespace Frenzycode\ViewModels;
use Frenzycode\ViewModels\ViewModelConfig;
use View;

class BaseViewModel {

    public function getView() {
        $class = get_class($this);

        if (array_key_exists($class, ViewModelConfig::$viewModalMap)) {
            return View::make(ViewModelConfig::$viewModalMap[$class]['view'], array(ViewModelConfig::$viewModalMap[$class]['model'] => $this));
        } else {
            return "Not found mapping";
        }
    }

}
