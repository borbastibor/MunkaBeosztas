<?php

class FrontController {

    public static function createInstance() {
        if (Config::VIEW_DIRECTORY == "") {
            exit("Kritikus hiba: A nézetek elérési útvonala nincs meghatározva!");
        }
        $instance = new self();
        return $instance;
    }

    public function dispatch() {
        $page = !empty($_GET["page"]) ? $_GET["page"] : "home";
        $action = !empty($_GET["action"]) ? $_GET["action"] : "index";
        $class = ucfirst($page) . "Actions";
        $file = Config::VIEW_DIRECTORY . "/" . $page . "/" . $class . ".php";
        if (!is_file($file)) {
            exit("Page not found");
        }
        require_once $file;
        $actionMethod = "do" . ucfirst($action);
        $controller = new $class();
        if (!method_exists($controller, $actionMethod)) {
            exit("Page not found");
        }
        $controller->$actionMethod();
        exit(0);
    }
}

?>