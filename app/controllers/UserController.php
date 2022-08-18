<?php

class UserController extends Controller {
    public function index($name = 'Yeah') {
        $data = [
            'title' => 'User',
            'name' => $this->model('User')->getUser()
        ];

        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function page() {
        $this->view('user/page');
    }
}
