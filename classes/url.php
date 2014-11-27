<?php

class Url {

    private static $path = '/cocktail/';
    private static $url;
    public $controller;
    public $action;
    public $fullPath;

    private function __construct() {

        $this->controller = $this->getItem('controller');

        $this->action = $this->getItem('action');

        $this->fullPath = $_SERVER['DOCUMENT_ROOT'] . self::$path;
    }

    public static function getInstance() {//singleTon

        if (self::$url == null)
            self::$url = new Url();

        return self::$url;
    }
    
    public function refresh() {
        
        header('Location: ' . $_SERVER['REQUEST_URI']);
        
    }

    public function getItem($item) {

        if (isset($_GET[$item]))
            return $_GET[$item];
        else
            return null;
    }

    public function site($controller = null, $action = null, $parameters = array()) {

        $url = 'http://' . $_SERVER['HTTP_HOST'] . self::$path;

        if ($controller != null)
            $url .= "?controller=$controller";
        if ($action != null)
            $url .= "&action=$action";

        foreach ($parameters as $key => $parameter) {

            $url .= "&$key=$parameter";
        }

        return $url;
    }

}

?>