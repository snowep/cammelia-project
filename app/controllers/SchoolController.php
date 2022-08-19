<?php
class SchoolController extends Controller {
    public function list() {
        $data = [
            'title' => 'List of School',
            'info' => $this->model('User')->getUserByUsername($_SESSION['username']),
            'schools' => $this->model('School')->getAllSchools()
        ];
        $this->view('templates/header', $data);
        $this->view('school/list', $data);
        $this->view('templates/footer');
    }

    public function details($npsn) {
        $data = [
            'title' => 'School Details',
            'info' => $this->model('User')->getUserByUsername($_SESSION['username']),
            'schools' => $this->model('School')->getSchoolsByNPSN($npsn)
        ];
        $this->view('templates/header', $data);
        $this->view('school/details', $data);
        $this->view('templates/footer');
    }

    public function add() {
        if ($this->model('School')->addSchool($_POST) > 0) {
            Flasher::setFlash(' berhasil ', ' ditambahkan ', 'success');
            header('Location: ' . BASEURL . '/school');
            exit;
        } else {
            Flasher::setFlash(' gagal ', ' ditambahkan ', 'danger');
            header('Location: ' . BASEURL . '/school');
            exit;
        }
    }

    public function delete($npsn) {
        if ($this->model('School')->deleteSchool($npsn) > 0) {
            Flasher::setFlash(' berhasil ', ' dihapus ', 'success');
            header('Location: ' . BASEURL . '/school');
            exit;
        } else {
            Flasher::setFlash(' gagal ', ' dihapus ', 'danger');
            header('Location: ' . BASEURL . '/school');
            exit;
        }
    }

    public function getEdit() {
        echo json_encode($this->model('School')->getSchoolsByNPSN($_POST['npsn']));
    }

    public function edit() {
        if ($this->model('School')->editSchool($_POST) > 0) {
            Flasher::setFlash(' berhasil ', ' diubah ', 'success');
            header('Location: ' . BASEURL . '/school/details/' . $_POST['npsnInputEdit']);
            exit;
        } else {
            Flasher::setFlash(' gagal ', ' diubah ', 'danger');
            header('Location: ' . BASEURL . '/school/details/' . $_POST['npsnInputEdit']);
            exit;
        }
    }
}
