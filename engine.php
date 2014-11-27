<?php

class Engine {

    public static $defaultController = 'index';
    private static $pathClasses = 'classes';
    private static $pathControllers = 'controllers';
    // Clasele ce trebuie incluse
    private $includeClasses = array(
        'database',
        'query',
        'template',
        'controller',
        'url',
    );
    public function __construct() {

        // Includem clasele de baza definite in array-ul de mai sus
        $this->includeClasses();

       
        $url = Url::getInstance();


        $this->callController($url->controller, $url->action);
    }

    private function includeFile($filePath) {

        require_once $filePath;
    }

    private function includeClasses() {

        foreach ($this->includeClasses as $class) {

            $this->includeFile(self::$pathClasses . '/' . $class . '.php');
           
        }

        return $this;
    }


    public function callController($controller, $action = null) {

        $path = self::$pathControllers . '/' . $controller . '.php';
// controllers/cocktail.php
        if ($controller != null and file_exists($path))
            $this->includeFile($path);
        else {

            $this->callController(self::$defaultController);

            exit();
        }

        $controllerName = 'Controller_' . $controller;

        $controller = new $controllerName();

        if ($action != null)
            $controller->$action(); //
        else
            $controller->index();

        return $this;
    }

}

?>