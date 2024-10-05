<?php
require 'db.php'; 
require 'UserInterface.php'; 

class User implements UserInterface {
    private $conn;

    
    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    
    public function registerUser($fullname, $gender, $dob, $email, $residence, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); 
        
        $sql = "INSERT INTO userDetails (fullname, gender, DateofBirth, email, residence, password)
                VALUES (:fullname, :gender, :dob, :email, :residence, :password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':residence', $residence);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            return "User registered successfully!";
        } else {
            return "Error: " . $stmt->errorInfo()[2];
        }
    }

    
    public function getUsers() {
        $sql = "SELECT * FROM userDetails";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
