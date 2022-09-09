<?php

class Authentication extends Controller {
    private $table = 'users';
    private $table_info = 'users_info';
    private $table_log = 'users_change_log';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function authCheck($data) {
        $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN ' . $this->table_info . ' ON ' . $this->table_info . '.user_id = ' . $this->table . '.id WHERE username=:username AND password=:password');
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->execute();
        $row = $this->db->single();
        $count = $this->db->rowCount();
        if ($count > 0) {
            // flash message
            Flasher::setFlash('Berhasil ', ' login ', 'success');
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['level'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['npsn'] = $row['school_npsn'];
            header('Location: ' . BASEURL . '/user/dashboard');
            exit;
        } else {
            Flasher::setFlash('Username atau Password salah', '', 'danger');
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }
    }

    public function addUser($data) {
        //check if username or email already exist
        $this->db->query("SELECT * FROM " . $this->table . " INNER JOIN " . $this->table_info . " ON " . $this->table . ".id = " . $this->table_info . ".user_id WHERE username=:username OR email=:email OR fullname=:fullname");
        $this->db->bind(':username', $data['usernameInput']);
        $this->db->bind(':email', $data['emailInput']);
        $this->db->bind(':fullname', $data['fullnameInput']);
        $this->db->execute();
        $count = $this->db->rowCount();
        if ($count > 0) {
            Flasher::setFlash('Username atau Email sudah terdaftar', '', 'danger');
            header('Location: ' . BASEURL . '/auth/register');
            exit;
        } else {
            $this->db->query("INSERT INTO " . $this->table . " VALUES ('', :username, :password, :level, :status)");
            $this->db->bind(':username', $data['usernameInput']);
            $this->db->bind(':password', $data['passwordInput']);
            $this->db->bind(':level', 'user');
            $this->db->bind(':status', 'pending');
            $this->db->execute();
            //insert to user_info table
            $this->db->query('INSERT INTO ' . $this->table_info . ' (user_id, fullname, email) VALUES (:id,:fullname, :email)');
            //get last inserted row id
            $id = $this->db->lastInsertId();
            $this->db->bind(':id', $id);
            $this->db->bind(':fullname', $data['fullnameInput']);
            $this->db->bind(':email', $data['emailInput']);
            $this->db->execute();

            $this->db->query('INSERT INTO ' . $this->table_log . ' VALUES ("", :user_id, :action, :user_id, "", :date)');
            $this->db->bind(':user_id', $id);
            $this->db->bind(':action', 'register');
            $this->db->bind(':date', date('Y-m-d H:i:s'));
            $this->db->execute();

            return $this->db->rowCount();

            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/auth/register');
            exit;
        }
    }

    public function isLoggedIn() {
        if (isset($_SESSION['username'])) {
            return 1;
        } else {
            return 0;
        }
    }
}
