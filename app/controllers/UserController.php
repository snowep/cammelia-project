<?php

class UserController extends Controller {
    public function __construct() {
        if ($this->model('Authentication')->isLoggedIn() == 0) {
            header('Location: ' . BASEURL . '/auth/login');
        }
        $data = [
            'info' => $this->model('User')->getUserByUsername($_SESSION['username'])
        ];
        $_SESSION['role'] = $data['info']['level'];
    }

    public function index() {
        $data = [
            'title' => 'Dashboard',
            'info' => $this->model('User')->getUserByUsername($_SESSION['username'])
        ];

        // $this->view('templates/header', $data);
        // $this->view('user/index', $data);
        // $this->view('templates/footer');
        //if user == user and npsn is null redirect to profile
        if ($data['info']['level'] == 'user' && $data['info']['npsn'] == null) {
            header('Location: ' . BASEURL . '/user/profile');
        }
        header('Location: ' . BASEURL . '/report/list');
    }

    // show list of user
    public function list() {

        if ($_SESSION["role"] == 'user') {
            echo 'forbidden';
            die();
        }
        $data = [
            'title' => 'List of User',
            'info' => $this->model('User')->getUserByUsername($_SESSION['username']),
            ...($_SESSION['role'] == 'admin') ? [
                'users' => $this->model('User')->getAllUsersExcSU()
            ] : [
                'users' => $this->model('User')->getAllUsers()
            ]
        ];
        $this->view('templates/header', $data);
        $this->view('user/list', $data);
        $this->view('templates/footer');
    }

    // show detail of user
    public function details($id) {
        if ($_SESSION["role"] == 'user') {
            echo 'forbidden';
            die();
        }
        $data = [
            'title' => 'User Details',
            'info' => $this->model('User')->getUserByUsername($_SESSION['username']),
            'users' => $this->model('User')->getUserById($id)
        ];

        $this->view('templates/header', $data);
        $this->view('user/details', $data);
        $this->view('templates/footer');
    }

    // delete user
    public function delete($id) {
        if ($_SESSION["role"] == 'user') {
            echo 'forbidden';
            die();
        }
        if ($this->model('User')->deleteUser($id) > 0) {
            Flasher::setFlash(' berhasil ', ' dihapus ', 'success');
            header('Location: ' . BASEURL . '/user/list');
        } else {
            Flasher::setFlash(' gagal ', ' dihapus ', 'danger');
            header('Location: ' . BASEURL . '/user/details/' . $id);
        }
    }

    // get data to edit
    public function getEdit() {
        echo json_encode($this->model('User')->getUserById($_POST['id']));
    }
    // edit user
    public function edit() {
        if ($_SESSION["role"] == 'user') {
            echo 'forbidden';
            die();
        }
        if ($this->model('User')->editUser($_POST) > 0) {
            Flasher::setFlash(' berhasil ', ' diubah ', 'success');
            if ($this->model('User')->editUserInfo($_POST) > 0) {
                Flasher::setFlash(' berhasil ', ' diubah ', 'success');
                header('Location: ' . BASEURL . '/user/details/' . $_POST['idInputEdit']);
            }
            header('Location: ' . BASEURL . '/user/details/' . $_POST['idInputEdit']);
            exit;
        } else {
            Flasher::setFlash(' gagal ', ' diubah ', 'danger');
            header('Location: ' . BASEURL . '/user/details/' . $_POST['idInputEdit']);
            exit;
        }
    }

    //get user by  username
    public function getUserByUsername() {
        echo json_encode($this->model('User')->getUserByUsername($_SESSION['username']));
    }







    public function profile() {
        $data = [
            'title' => 'Profile',
            'info' => $this->model('User')->getUserByUsername($_SESSION['username']),
            'schools' => $this->model('School')->getAllSchools(),
        ];
        $this->view('templates/header', $data);
        $this->view('user/profile', $data);
        $this->view('templates/footer');
    }
    public function editProfile() {
        if ($this->model('User')->editProfiles($_POST) > 0) {
            Flasher::setFlash(' berhasil ', ' diubah ', 'success');
            header('Location: ' . BASEURL . '/user/profile');
            exit;
        } else {
            Flasher::setFlash(' gagal ', ' diubah ', 'danger');
            header('Location: ' . BASEURL . '/user/profile');
            exit;
        }
    }
}
