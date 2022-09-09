<?php

class User {
    private $table = 'users';
    private $table_info = 'users_info';
    private $table_log = 'users_change_log';
    private $table_school = 'schools';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    //get single user
    public function getUserByUsername($username) {

        //inner join all table
        $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN ' . $this->table_info . ' ON ' . $this->table_info . '.user_id = ' . $this->table . '.id LEFT JOIN ' . $this->table_school . ' ON ' . $this->table_school . '.npsn = ' . $this->table_info . '.school_npsn WHERE username=:username');
        $this->db->bind(':username', $username);
        return $this->db->single();
    }

    //get all users
    public function getAllUsers() {
        $this->db->query("SELECT * FROM " . $this->table . " INNER JOIN " . $this->table_info . " ON " . $this->table . ".id = " . $this->table_info . ".user_id");
        return $this->db->resultSet();
    }
    public function getAllUsersExcSU() {
        $this->db->query("SELECT * FROM " . $this->table . " INNER JOIN " . $this->table_info . " ON " . $this->table . ".id = " . $this->table_info . ".user_id WHERE NOT level='superuser'");
        return $this->db->resultSet();
    }
    //get user by id
    public function getUserById($id) {
        $this->db->query(
            "SELECT * FROM " . $this->table . " INNER JOIN " . $this->table_info . "  ON " . $this->table . ".id = " . $this->table_info . ".user_id LEFT JOIN " . $this->table_school . " ON " . $this->table_school . ".npsn = " . $this->table_info . ".school_npsn WHERE " . $this->table . ".id =:id"

            // SELECT * FROM " . $this->table . "
            // INNER JOIN " . $this->table_info . " ON " . $this->table . ".id = " . $this->table_info . ".user_id
            // LEFT JOIN ' . $this->table_school . ' ON ' . $this->table_school . '.npsn = ' . $this->table_info . '.school_npsn
            // WHERE " . $this->table . ".id=:id"
        );
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    //edit user
    public function editUser($data) {
        // TODO: select
        $this->db->query("SELECT * FROM " . $this->table . " INNER JOIN " . $this->table_info . " ON " . $this->table . ".id = " . $this->table_info . ".user_id WHERE " . $this->table . ".id=:id");
        $this->db->bind(':id', $data['idInputEdit']);
        $row = $this->db->single();
        // TODO: store all data in variable
        $username = $row['username'];
        $level = $row['level'];
        $status = $row['status'];
        // TODO: check if data is changed
        if ($data['usernameInputEdit'] != $username) {
            $this->db->query("INSERT INTO " . $this->table_log . " (users_id, action, description, log_time, affected_id) VALUES (:users_id, :action, :description, :log_time, :id)");
            $this->db->bind(':users_id', $_SESSION['id']);
            $this->db->bind(':action', 'update');
            $this->db->bind(':description', $username . ' to ' . $data['usernameInputEdit']);
            $this->db->bind(':log_time', date('Y-m-d H:i:s'));
            $this->db->bind(':id', $data['idInputEdit']);
            $this->db->execute();
        }
        if ($data['roleInputEdit'] != $level) {
            $this->db->query("INSERT INTO " . $this->table_log . " (users_id, action, description, log_time, affected_id) VALUES (:users_id, :action, :description, :log_time, :id)");
            $this->db->bind(':users_id', $_SESSION['id']);
            $this->db->bind(':action', 'update');
            $this->db->bind(':description', $level . ' to ' . $data['roleInputEdit']);
            $this->db->bind(':log_time', date('Y-m-d H:i:s'));
            $this->db->bind(':id', $data['idInputEdit']);
            $this->db->execute();
        }
        if ($data['statusInputEdit'] != $status) {
            $this->db->query("INSERT INTO " . $this->table_log . " (users_id, action, description, log_time, affected_id) VALUES (:users_id, :action, :description, :log_time, :id)");
            $this->db->bind(':users_id', $_SESSION['id']);
            $this->db->bind(':action', 'update');
            $this->db->bind(':description', $status . ' to ' . $data['statusInputEdit']);
            $this->db->bind(':log_time', date('Y-m-d H:i:s'));
            $this->db->bind(':id', $data['idInputEdit']);
            $this->db->execute();
        }

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

    //delete user
    public function deleteUser($id) {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id=:id");
        $this->db->bind(':id', $id);
        $this->db->execute();
        $this->db->query("DELETE FROM " . $this->table_info . " WHERE user_id=:id");
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editProfiles($data) {

        $this->db->query("UPDATE " . $this->table . " SET username=:username, password=:password WHERE id=:id");
        $this->db->bind(':username', $data['user-usernameInputEdit']);
        $this->db->bind(':password', $data['user-passwordInputEdit']);
        $this->db->bind(':id', $_SESSION['id']);
        $this->db->execute();

        $this->db->query("UPDATE " . $this->table_info . " SET school_npsn=:npsn, fullname=:fullname, email=:email WHERE user_id=:user_id");
        $this->db->bind(':npsn', $data['workAtInputEdit']);
        $this->db->bind(':fullname', $data['user-fullnameInputEdit']);
        $this->db->bind(':email', $data['user-emailInputEdit']);
        $this->db->bind(':user_id', $_SESSION['id']);
        $this->db->execute();

        //check what is changed
        $this->db->query("SELECT * FROM " . $this->table . " INNER JOIN " . $this->table_info . " ON " . $this->table . ".id = " . $this->table_info . ".user_id WHERE user_id=:id");
        $this->db->bind(':id', $_SESSION['id']);
        $row = $this->db->single();
        //validate data
        if ($data['user-usernameInputEdit'] != $row['username']) {
            $this->db->query("INSERT INTO " . $this->table_log . " (users_id, action, description, log_time, affected_id) VALUES (:id, :action, :description, :log_time, :id)");
            $this->db->bind(':action', 'update');
            $this->db->bind(':description', $row['username'] . ' to ' . $data['user-usernameInputEdit']);
            $this->db->bind(':log_time', date('Y-m-d H:i:s'));
            $this->db->bind(':id', $_SESSION['id']);
            $this->db->execute();
        }
        if ($data['user-passwordInputEdit'] != $row['password']) {
            $this->db->query("INSERT INTO " . $this->table_log . " (users_id, action, description, log_time, affected_id) VALUES (:id, :action, :description, :log_time, :id)");
            $this->db->bind(':action', 'update');
            $this->db->bind(':description', $row['password'] . ' to ' . $data['user-passwordInputEdit']);
            $this->db->bind(':log_time', date('Y-m-d H:i:s'));
            $this->db->bind(':id', $_SESSION['id']);
            $this->db->execute();
        }
        if ($data['user-fullnameInputEdit'] != $row['fullname']) {
            $this->db->query("INSERT INTO " . $this->table_log . " (users_id, action, description, log_time, affected_id) VALUES (:id, :action, :description, :log_time, :id)");
            $this->db->bind(':action', 'update');
            $this->db->bind(':description', $row['fullname'] . ' to ' . $data['user-fullnameInputEdit']);
            $this->db->bind(':log_time', date('Y-m-d H:i:s'));
            $this->db->bind(':id', $_SESSION['id']);
            $this->db->execute();
        }
        if ($data['user-emailInputEdit'] != $row['email']) {
            $this->db->query("INSERT INTO " . $this->table_log . " (users_id, action, description, log_time, affected_id) VALUES (:id, :action, :description, :log_time, :id)");
            $this->db->bind(':action', 'update');
            $this->db->bind(':description', $row['email'] . ' to ' . $data['user-emailInputEdit']);
            $this->db->bind(':log_time', date('Y-m-d H:i:s'));
            $this->db->bind(':id', $_SESSION['id']);
            $this->db->execute();
        }
        if ($data['workAtInputEdit'] != $row['npsn']) {
            $this->db->query("INSERT INTO " . $this->table_log . " (users_id, action, description, log_time, affected_id) VALUES (:id, :action, :description, :log_time, :id)");
            $this->db->bind(':action', 'update');
            $this->db->bind(':description', $row['npsn'] . ' to ' . $data['workAtInputEdit']);
            $this->db->bind(':log_time', date('Y-m-d H:i:s'));
            $this->db->bind(':id', $_SESSION['id']);
            $this->db->execute();
        }

        return $this->db->rowCount();
    }
}
