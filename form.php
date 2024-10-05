<?php
require 'User.php';

function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = sanitizeInput($_POST['fullname']);
    $gender = sanitizeInput($_POST['gender']);
    $dob = sanitizeInput($_POST['dob']);
    $email = sanitizeInput($_POST['email']);
    $residence = sanitizeInput($_POST['residence']);
    $password = sanitizeInput($_POST['password']);

}