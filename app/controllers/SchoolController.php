<?php
class SchoolController extends Controller {
    public function index() {
        $data = [
            'title' => 'Sekolah',
            'name' => $this->model('User')->getUser(),
            'schools' => $this->model('School')->getAllSchools()
        ];
        $this->view('templates/header', $data);
        $this->view('school/index', $data);
        $this->view('templates/footer');
    }

    public function details($npsn) {
        $data = [
            'title' => 'Detail Sekolah',
            'name' => $this->model('User')->getUser(),
            'schools' => $this->model('School')->getAllSchoolsByNPSN($npsn)
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
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
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
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/school');
            exit;
        }
    }
}
