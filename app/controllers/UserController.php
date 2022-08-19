<?php

class UserController extends Controller {
    public function __construct() {
        if ($_SESSION['role'] != 'user') {
            $this->redirect();
        }
    }

    public function index($name = 'Yeah') {
        $data = [
            'role' => $_SESSION['role'],
            'info' => $this->model('User')->getUser($_SESSION['username'])
        ];

        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }
}
