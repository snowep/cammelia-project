<?php

class ReportController extends Controller {
    public function __construct() {
        if ($this->model('Authentication')->isLoggedIn() == 0) {
            $this->redirect('auth', 'login');
        }
        //array push to $data
        $data = [
            'info' => $this->model('User')->getUserByUsername($_SESSION['username'])
        ];
        $_SESSION['role'] = $data['info']['level'];
    }

    public function index() {
        $this->redirect('report', 'list');
    }

    public function list() {
        $data = [
            'title' => 'Report',
            'info' => $this->model('User')->getUserByUsername($_SESSION['username']),
            'file_directory' => '/uploads/reports',
            ...($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'superuser') ? [
                'reports' => $this->model('Report')->getAllReports(),
            ] : [
                'reports' => $this->model('Report')->getAllReportsByMe($_SESSION['id']),
            ]
        ];
        $this->view('templates/header', $data);
        $this->view('report/list', $data);
        $this->view('templates/footer');
    }

    public function details($id) {
        $data = [
            'title' => 'Report Details',
            'info' => $this->model('User')->getUserByUsername($_SESSION['username']),
            'reports' => $this->model('Report')->getReportById($id)
        ];
        $this->view('templates/header', $data);
        $this->view('report/details', $data);
        $this->view('templates/footer');
    }

    //add
    public function add() {
        if ($this->model('Report')->addReport($_POST) > 0) {
            Flasher::setFlash(' berhasil ', ' ditambahkan ', 'success');
            header('Location: ' . BASEURL . '/report/list');
            exit;
        } else {
            Flasher::setFlash(' gagal ', ' ditambahkan ', 'danger');
            header('Location: ' . BASEURL . '/report/list');
            exit;
        }
    }
    //delete
    public function delete($id, $file) {
        if ($this->model('Report')->deleteReport($id, $file) > 0) {
            Flasher::setFlash(' berhasil ', ' dihapus ', 'success');
            header('Location: ' . BASEURL . '/report/list');
            exit;
        } else {
            Flasher::setFlash(' gagal ', ' dihapus ', 'danger');
            header('Location: ' . BASEURL . '/report/list');
            exit;
        }
    }

    //getEdit
    public function getEdit() {
        echo json_encode($this->model('Report')->getReportById($_POST['id']));
    }

    //edit
    public function edit() {
        if ($this->model('Report')->editReport($_POST) > 0) {
            Flasher::setFlash(' berhasil ', ' diedit ', 'success');
            header('Location: ' . BASEURL . '/report/details/' . $_POST['idInputEdit']);
            exit;
        } else {
            Flasher::setFlash(' gagal ', ' diedit ', 'danger');
            header('Location: ' . BASEURL . '/report/details/' . $_POST['idInputEdit']);
            exit;
        }
    }
}
