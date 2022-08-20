<?php

class App {
    protected $controller = 'AuthController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();

        // Check if controller exists
        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . $url[0] . 'Controller.php')) {
                $this->controller = $url[0] . 'Controller';
                unset($url[0]);
            } else {
                $this->controller = 'errorController';
            }
        } else {
            echo 'yeah';
        }
        // Require the controller
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Check if method exists
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            } else {
                $this->method = 'index';
            }
        }

        // Get params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // Call a callback with array of params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
