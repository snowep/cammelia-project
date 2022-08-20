<?php

class AuthController extends Controller {

    public function __construct() {
        if ($this->model('Authentication')->isLoggedIn() == 1) {
            header('Location: ' . BASEURL . '/user/dashboard');
        }
    }

    public function index() {
        header('Location: ' . BASEURL . '/auth/login');
    }

    public function login() {
        $data = [
            'title' => 'Login',
        ];
        $this->view('templates/headerAuth', $data);
        $this->view('auth/login', $data);
        $this->view('templates/footerAuth');
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASEURL . '/auth/login');
    }

    public function register() {
        $data = [
            'title' => 'Register',
        ];
        $this->view('templates/headerAuth', $data);
        $this->view('auth/register', $data);
        $this->view('templates/footerAuth');
    }

    public function authCheck() {
        $data = [
            'username' => $_POST['usernameInput'],
            'password' => $_POST['passwordInput']
        ];
        $this->model('Authentication')->authCheck($data);
    }

    public function add() {
        if ($this->model('Authentication')->addUser($_POST) > 0) {
            Flasher::setFlash(' berhasil ', ' ditambahkan ', 'success');
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        } else {
            Flasher::setFlash(' gagal ', ' ditambahkan ', 'danger');
            header('Location: ' . BASEURL . '/auth/register');
            exit;
        }
    }
}
