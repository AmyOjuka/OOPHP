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
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1b1b1b; 
            color: #fff;
        }
        .registration-form {
            width: 50%;
            margin: 50px auto;
            background-color: #2b2b2b; 
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }
        h2 {
            margin-bottom: 20px;
            color: #e63946; 
        }
        .form-control {
            background-color: #333; 
            border: 1px solid #e63946; 
            color: #fff;
        }
        .form-control::placeholder {
            color: #bbb; 
        }
        .form-control:focus {
            border-color: #e63946; 
            box-shadow: 0 0 0 0.2rem rgba(230, 57, 70, 0.25); 
        }
        .form-select {
            background-color: #333;
            border: 1px solid #e63946;
            color: #fff;
        }
        .form-select:focus {
            border-color: #e63946;
            box-shadow: 0 0 0 0.2rem rgba(230, 57, 70, 0.25);
        }
        .btn-primary {
            background-color: #e63946; 
            border-color: #e63946;
        }
        .btn-primary:hover {
            background-color: #d62828; 
            border-color: #d62828;
        }
        .btn-primary:focus {
            background-color: #e63946;
            box-shadow: 0 0 0 0.2rem rgba(230, 57, 70, 0.5);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="registration-form">
        <h2 class="text-center">User Registration Form</h2>
        <form action="register.php" method="POST">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your full name" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    
                </select>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
            </div>
            <div class="mb-3">
                <label for="residence" class="form-label">Residence</label>
                <input type="text" class="form-control" id="residence" name="residence" placeholder="Enter your residence" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Create a strong password" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
