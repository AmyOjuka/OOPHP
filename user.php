<?php
require 'db.php';
require 'UserInterface.php'; 

class User implements UserInterface {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }
}

public function registerUser($fullname, $gender, $dob, $email, $residence, $password) {
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);


}