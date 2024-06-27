<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require('db.php');

// Retrieve user data from the database
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

// Delete user account
if (isset($_POST['delete'])) {
    $delete_query = "DELETE FROM users WHERE username='$username'";
    mysqli_query($con, $delete_query);
    
    // Show notification and redirect to register page
    echo "<script>alert('Your account has been successfully deleted!'); window.location.href = 'register.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete User Account</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
    width: 50%;
    margin: 100px auto;
    background: #ffffff9f;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
  

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            text-align: center;
        }

        .delete-button {
            display: block;
            margin: 0 auto; /* Centers the button */
            margin-top: 20px; /* Adds some space between the paragraph and the button */
        }

        input[type="submit"] {
            background-color: #ff4d4d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #e60000;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Delete User Account</h1>
    <form method="post" action="">
        <p>Are you sure you want to delete your account?</p>
        <input class="delete-button" type="submit" name="delete" value="Delete Account">
    </form>
</div>
</body>
</html>
