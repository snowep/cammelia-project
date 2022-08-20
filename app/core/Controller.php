<?php

class Controller {
    public function view($view, $data = []) {
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function redirect($page, $subpage) {
        header('Location: ' . BASEURL . '/' . $page . '/' . $subpage);
        exit;
    }
}
