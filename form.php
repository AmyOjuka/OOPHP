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

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    if (strlen($password) < 6) {
        die("Password must be at least 6 characters long");
    }

    $user = new User();
    $result = $user->registerUser($fullname, $gender, $dob, $email, $residence, $password);
    echo $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration Form</h2>
    <form action="form.php" method="POST">
    Full Name: <input type="text" name="fullname" required><br><br>
    Gender: 
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br> 
        Date of Birth: <input type="date" name="dob" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Residence: <input type="text" name="residence" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Register">    
    </form>
</body>
</html>