<?php

abstract class Model {
    private $pdo;

    public function __constructor($dbcon) {
        $this->pdo = $dbcon;
    }

    public function getDbConnection() {
        return $this->pdo;
    }

    public function setDbConnection($dbcon) {
        $this->pdo = $dbcon;
    }

    public function isValid() {
        return FALSE;
    }
}

?>