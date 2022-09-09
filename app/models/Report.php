<?php

class Report {
    private $table = 'file_upload';
    private $table_school = 'schools';
    private $table_user = 'users';
    private $table_user_info = 'users_info';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    //get all reports
    public function getAllReports() {
        $this->db->query('SELECT ' . $this->table . '.id, ' . $this->table . '.file_name, ' . $this->table . '.upload_time, ' . $this->table . '.status, ' . $this->table . '.notes, ' . $this->table_user_info . '.fullname FROM ' . $this->table . ' INNER JOIN ' . $this->table_user . ' ON ' . $this->table . '.user_id = ' . $this->table_user . '.id INNER JOIN ' . $this->table_user_info . ' ON ' . $this->table_user . '.id = ' . $this->table_user_info . '.user_id');
        return $this->db->resultSet();
    }

    //get all reports by school
    public function getAllReportsBySchool($npsn) {
        $this->db->query('SELECT ' . $this->table . '.id, ' . $this->table . '.file_name, ' . $this->table . '.upload_time, ' . $this->table_user_info . '.fullname FROM ' . $this->table . ' INNER JOIN ' . $this->table_user . ' ON ' . $this->table . '.user_id = ' . $this->table_user . '.id INNER JOIN ' . $this->table_user_info . ' ON ' . $this->table_user . '.id = ' . $this->table_user_info . '.user_id WHERE ' . $this->table . '.npsn = :npsn');
        $this->db->bind(':npsn', $npsn);
        return $this->db->resultSet();
    }
    //get all report by user id
    public function getAllReportsByMe($id) {
        $this->db->query('SELECT ' . $this->table . '.id, ' . $this->table . '.file_name, ' . $this->table . '.upload_time, ' . $this->table . '.status, ' . $this->table . '.notes, ' . $this->table_user_info . '.fullname FROM ' . $this->table . ' INNER JOIN ' . $this->table_user . ' ON ' . $this->table . '.user_id = ' . $this->table_user . '.id INNER JOIN ' . $this->table_user_info . ' ON ' . $this->table_user . '.id = ' . $this->table_user_info . '.user_id WHERE ' . $this->table . '.user_id = ' . $id);
        return $this->db->resultSet();
    }

    //get single report
    public function getReportById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind(':id', $id);
        // $this->db->query('SELECT ' . $this->table . '.id, ' . $this->table . '.file_name, ' . $this->table . '.upload_time, ' . $this->table . '.status, ' . $this->table . '.notes, ' . $this->table_user_info . '.fullname FROM ' . $this->table . ' INNER JOIN ' . $this->table_user . ' ON ' . $this->table . '.user_id = ' . $this->table_user . '.id INNER JOIN ' . $this->table_user_info . ' ON ' . $this->table_user . '.id = ' . $this->table_user_info . '.user_id WHERE ' . $this->table . '.id = ' . $id);
        return $this->db->single();
    }

    //add report
    public function addReport($data) {
        date_default_timezone_set('Asia/Hong_Kong');
        //rename file then upload
        $file = $_FILES['reportFileInput']['name'];
        $file_tmp = $_FILES['reportFileInput']['tmp_name'];
        $file_ext = explode('.', $file);
        $file_ext = strtolower(end($file_ext));
        $allowed = array('pdf', 'doc', 'docx', 'xlxs');
        //file new name
        //get current month and year
        $month = $_POST['reportMonth'];
        $year = $_POST['reportYear'];
        $this->db->query('SELECT * FROM ' . $this->table_school . ' WHERE npsn = :npsn');
        $this->db->bind(':npsn', $_SESSION['npsn']);
        $row = $this->db->single();
        $name = str_replace(" ", "-", $row['name']);
        $new_file_name = $name . '_Laporan-Bulanan_' . $month . '_' . $year;
        $new_file_name = $new_file_name . '.' . $file_ext;
        //upload file
        if (in_array($file_ext, $allowed)) {
            if ($file_tmp != '') {
                move_uploaded_file($file_tmp, 'uploads/reports/' . $new_file_name);
            }
            $this->db->query('INSERT INTO ' . $this->table . ' (file_name, user_id, npsn, report_month, report_year,  upload_time, status, notes) VALUES (:file_name, :user_id, :npsn, :report_month, :report_year, :upload_time, :status, :notes)');
            $this->db->bind(':file_name', $new_file_name);
            $this->db->bind(':upload_time', date('Y-m-d H:i:s'));
            $this->db->bind(':user_id', $_SESSION['id']);
            $this->db->bind(':status', 'pending');
            $this->db->bind(':notes', $data['notes']);
            $this->db->bind(':npsn', $_SESSION['npsn']);
            $this->db->bind(':report_month', $month);
            $this->db->bind(':report_year', $year);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        return $this->db->rowCount();
    }

    //update report
    public function editReport($data) {
        if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'superuser') {
            $this->db->query('UPDATE ' . $this->table . ' SET status = :status, notes = :notes WHERE id = :id');
            $this->db->bind(':status', $data['statusInputEdit']);
        } else {
            $this->db->query('UPDATE ' . $this->table . ' SET notes = :notes WHERE id = :id');
        }
        $this->db->bind(':notes', $data['notesInputEdit']);
        $this->db->bind(':id', $data['idInputEdit']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    //delete report
    public function deleteReport($id, $file) {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        unlink($_SERVER['DOCUMENT_ROOT'] . '/cammelia-project/public/uploads/reports/' . $file);
        return $this->db->rowCount();
    }
}
