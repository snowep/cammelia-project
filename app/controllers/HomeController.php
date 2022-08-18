<?php

class HomeController extends Controller {
    public function index() {
        $data = [
            'title' => 'Home',
            'name' => $this->model('User')->getUser()
        ];
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
