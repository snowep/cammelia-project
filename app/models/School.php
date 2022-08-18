<?php

class School {
    private $table = 'schools';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllSchools() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getAllSchoolsByNPSN($npsn) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE npsn = :npsn');
        $this->db->bind(':npsn', $npsn);
        return $this->db->single();
    }

    public function addSchool($data) {
        $this->db->query('INSERT INTO ' . $this->table . ' (npsn, nns, name) VALUES (:npsn, :nns, :name)');
        $this->db->bind(':npsn', $data['npsnInput']);
        $this->db->bind(':nns', $data['nssInput']);
        $this->db->bind(':name', $data['namaSekolah']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteSchool($id) {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE npsn = :npsn');
        $this->db->bind(':npsn', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
