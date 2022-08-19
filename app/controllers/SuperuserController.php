<?php

class SuperuserController extends Controller {

    public function __construct() {
        if ($_SESSION['role'] != 'superuser') {
            $this->redirect();
        }
    }

    public function index($name = 'Yeah') {
        $data = [
            'role' => $_SESSION['role'],
            'title' => 'Dashboard',
            'info' => $this->model('User')->getUserByUsername($_SESSION['username'])
        ];

        $this->view('templates/header', $data);
        $this->view('superuser/index', $data);
        $this->view('templates/footer');
    }

    public function user_list() {
        $data = [
            'role' => $_SESSION['role'],
            'title' => 'List User',
            'info' => $this->model('User')->getUserByUsername($_SESSION['username']),
            'users' => $this->model('User')->getAllUsers()
        ];

        $this->view('templates/header', $data);
        $this->view('superuser/user-list', $data);
        $this->view('templates/footer');
    }

    public function user_details($id) {
        $data = [
            'role' => $_SESSION['role'],
            'title' => 'Detail User',
            'info' => $this->model('User')->getUserByUsername($_SESSION['username']),
            'users' => $this->model('User')->getUserById($id)
        ];

        $this->view('templates/header', $data);
        $this->view('superuser/user-detail', $data);
        $this->view('templates/footer');
    }

    public function user_getEdit() {
        echo json_encode($this->model('User')->getUserById($_POST['id']));
    }
    public function user_edit() {
        if ($this->model('User')->editUser($_POST) > 0) {
            Flasher::setFlash(' berhasil ', ' diubah ', 'success');
            if ($this->model('User')->editUserInfo($_POST) > 0) {
                Flasher::setFlash(' berhasil ', ' diubah ', 'success');
                header('Location: ' . BASEURL . '/superuser/user_details/' . $_POST['idInputEdit']);
            }
            header('Location: ' . BASEURL . '/superuser/user_details/' . $_POST['idInputEdit']);
            exit;
        } else {
            Flasher::setFlash(' gagal ', ' diubah ', 'danger');
            header('Location: ' . BASEURL . '/superuser/user_details/' . $_POST['idInputEdit']);
            exit;
        }
    }
}
