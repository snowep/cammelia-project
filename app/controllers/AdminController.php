<?php

class AdminController extends Controller {
    public function __construct() {
        if ($_SESSION['role'] != 'admin') {
            $this->redirect();
        }
    }

    public function index($name = 'Yeah') {
        $data = [
            'role' => $_SESSION['role'],
            'info' => $this->model('User')->getUserByUsername($_SESSION['username'])
        ];

        $this->view('templates/header', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footer');
    }
}
