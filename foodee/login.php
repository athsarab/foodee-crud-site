<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deli-licious</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
   
</head>
<body>
    <header>
    
    <div class="logo"><a href="#">Deli-licious</a></div>
    <nav>
        <ul>
            <li><a href="register.php">Register</a></li>
            <li><a href="login-user.php">Admin Login</a></li>
        </ul>
    </nav>
    
</header>
 <div id="page-container">
   <div id="content-wrap">
    <div class="container" >
  <?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Set cookie for the username
            setcookie('username', $username, time() + (86400 * 30), "/"); // Cookie set to expire in 30 days
            // Redirect to user dashboard page
            header("Location: pictures.php");
            exit();
        } else {
            echo "<div class='form1'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
  <form class="form" method="post" name="login">
    <h1 class="login-title">Login</h1>
    <br><br>
    <div class="input-wrapper">
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus required>
        <i class="fas fa-user"></i>
    </div>
    <br>
    <div class="input-wrapper">
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <i class="fas fa-lock"></i>
    </div>
    <br>
    <input type="submit" value="Login" name="submit" class="login-button">
</form>

<?php
    }
?>
</div><br><br><br><br><br><br>
   </div>
<footer id="footer">
<p>At Deli-licious,Where We Strive For More</p>
</footer>
</body>
</html>
