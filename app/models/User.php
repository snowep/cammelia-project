<?php

class User {
    private $table = 'users';
    private $table_info = 'users_info';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    //get single user
    public function getUserByUsername($username) {
        $this->db->query("SELECT * FROM " . $this->table . " INNER JOIN " . $this->table_info . " ON " . $this->table . ".id = " . $this->table_info . ".user_id WHERE username=:username");
        $this->db->bind(':username', $username);
        return $this->db->single();
    }

    //get all users
    public function getAllUsers() {
        $this->db->query("SELECT * FROM " . $this->table . " INNER JOIN " . $this->table_info . " ON " . $this->table . ".id = " . $this->table_info . ".user_id");
        return $this->db->resultSet();
    }
    //get user by id
    public function getUserById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " INNER JOIN " . $this->table_info . " ON " . $this->table . ".id = " . $this->table_info . ".user_id WHERE id=:id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    //edit user
    public function editUser($data) {
        $this->db->query("UPDATE " . $this->table . " SET username=:username, level=:level, status=:status WHERE id=:id");
        $this->db->bind(':username', $data['usernameInputEdit']);
        $this->db->bind(':level', $data['roleInputEdit']);
        $this->db->bind(':status', $data['statusInputEdit']);
        $this->db->bind(':id', $data['idInputEdit']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function editUserInfo($data) {
        $this->db->query("UPDATE " . $this->table_info . " SET fullname=:fullname, email=:email WHERE user_id=:id");
        $this->db->bind(':fullname', $data['namaInputEdit']);
        $this->db->bind(':email', $data['emailInputEdit']);
        $this->db->bind(':id', $data['idInputEdit']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
