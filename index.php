<?php

require_once "FrontController.php";
FrontController::createInstance()->dispatch();

$pdo = (new SQLiteConnection())->connect();
if ($pdo == null) {
    echo("Sikertelen csatlakozás az adatbázishoz!");
}

?>