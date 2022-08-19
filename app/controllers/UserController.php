<?php

class UserController extends Controller {
    public function __construct() {
        $data = [
            'info' => $this->model('User')->getUserByUsername($_SESSION['username'])
        ];
        $_SESSION['role'] = $data['info']['level'];
        if ($data['info']['level'] != 'user') {
            $this->redirect();
        }
    }

    public function index() {
        $data = [
            'info' => $this->model('User')->getUserByUsername($_SESSION['username'])
        ];

        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }
}
