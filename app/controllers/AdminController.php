<?php

class AdminController extends Controller {
    public function __construct() {
        $data = [
            'info' => $this->model('User')->getUserByUsername($_SESSION['username'])
        ];
        $_SESSION['role'] = $data['info']['level'];
        if ($data['info']['level'] != 'admin') {
            $this->redirect();
        }
    }

    public function index() {
        $data = [
            'title' => 'Dashboard',
            'info' => $this->model('User')->getUserByUsername($_SESSION['username'])
        ];

        $this->view('templates/header', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footer');
    }

    public function user_list() {
        $data = [
            'title' => 'List User',
            'info' => $this->model('User')->getUserByUsername($_SESSION['username']),
            'users' => $this->model('User')->getAllUsersExcSU()
        ];

        $this->view('templates/header', $data);
        $this->view('admin/user-list', $data);
        $this->view('templates/footer');
    }

    public function user_details($id) {
        $data = [
            'title' => 'Detail User',
            'info' => $this->model('User')->getUserByUsername($_SESSION['username']),
            'users' => $this->model('User')->getUserById($id)
        ];

        $this->view('templates/header', $data);
        $this->view('admin/user-details', $data);
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
