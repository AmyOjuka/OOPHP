<?php
interface UserInterface {
    public function registerUser($fullname, $gender, $dob, $email, $residence, $password);
    public function getUsers();
}
?>
