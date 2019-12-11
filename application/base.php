<?php

class Application {
    public $uri;
    protected $pdo;

    function __construct($uri) {
        $this->uri = $uri;
        if ($this->pdo == null) {
            try {
                $this->pdo = new \PDO("sqlite:application/database/MunkaBeosztas.db");
            } catch (\PDOException $e) {
                echo("Sikertelen kapcsolódás az adatbázishoz! ".$e->getMessage());
            }
        }
    }

    function loadController($class) {
        $file = "application/controller/".$this->uri['controller'].".php";
        if(!file_exists($file)) {
            die();
        }
        require_once($file);
        $controller = new $class($this->pdo);
        if(method_exists($controller, $this->uri['method'])) {
            $controller->{$this->uri['method']}($this->uri['var']);
        } else {
            $controller->index();
        }
    }
}
  
?>