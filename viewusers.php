<?php
require 'User.php';

$user = new User();
$users = $user->getUsers(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #1b1b1b; /* Black background */
            color: #fff;
        }
        .user-table {
            margin: 50px auto;
            width: 80%;
            background-color: #2b2b2b; /* Darker black/grey background for the table */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }
        h2 {
            margin-bottom: 20px;
            color: #e63946; /* Red for header */
            text-align: center;
        }
        table {
            width: 100%;
            background-color: #333; 
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #e63946; 
        }
        th {
            background-color: #e63946; 
            color: #fff;
        }
        td {
            background-color: #2b2b2b;
            color: #fff; 
        }
        tr:hover td {
            background-color: #444; 
        }
    </style>
    </head>
    <body>

    <div class="container">
    <div class="user-table">
        <h2>Registered Users</h2>
        <table class="table table-bordered table-hover">
        <thead>
                <tr>
                    <th>UserID</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
                    <th>Residence</th>
                    <th>Registration Date</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['userId']; ?></td>
                    <td><?= $user['fullname']; ?></td>
                    <td><?= $user['gender']; ?></td>
                    <td><?= $user['DateofBirth']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['residence']; ?></td>
                    <td><?= $user['regdate']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    </body>
    </html>