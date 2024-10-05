<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'UserDB';
    private $username = 'root';
    private $password = '';
    public $conn;

}

public function connect() {
    $this->conn = null;


}
