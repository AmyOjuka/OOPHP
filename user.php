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