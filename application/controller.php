<?php

abstract class Controller {
    private $pdo;

    public function __constructor($dbcon) {
        $this->pdo = $dbcon;
    }

    public function loadModel($model) {
        require_once('model/'.$model.'.php');
        $this->$model = new $model($this->pdo);
    }

    public function loadView($view,$vars="") {
        if(is_array($vars) && count($vars) > 0) {
            extract($vars, EXTR_PREFIX_SAME, "wddx");
        }
        require_once('view/'.$view.'.php');
    }

    abstract public function index();
}

?>