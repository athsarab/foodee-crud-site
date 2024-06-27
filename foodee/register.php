<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	<title>Deli-licious</title>
	<link rel="stylesheet" type="text/css" href="regstyle.css">
   
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <script>
        // JavaScript validation for phone number
        function validatePhone() {
            var phoneInput = document.getElementById("phone");
            var phonePattern = /^\d{10}$/; // This pattern checks for exactly 10 digits

            if (!phonePattern.test(phoneInput.value)) {
                alert("Please enter a valid 10-digit phone number.");
                phoneInput.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
	<header>
    <div class="logo"><a href="#">Deli-licious</a></div>
    <nav>
        <ul>
               
            <li><a href="login.php">login</a></li>
             <li><a href="register.php">Register</a></li>
            
        </ul>
    </div>
    </nav>
</header>
<br><br><br><br><br><br>
<div id="page-container">
    <div id="content-wrap">
        <div class="container">
            <?php
            require('db.php');
            if (isset($_REQUEST['username'])) {
                $username = stripslashes($_REQUEST['username']);
                $username = mysqli_real_escape_string($con, $username);
                $email    = stripslashes($_REQUEST['email']);
                $email    = mysqli_real_escape_string($con, $email);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con, $password);
                $mobile = stripslashes($_REQUEST['mobile']);
                $mobile = mysqli_real_escape_string($con, $mobile);
                $country = stripslashes($_REQUEST['country']);
                $country = mysqli_real_escape_string($con, $country);
                $query    = "INSERT into `users` (username, password, email, mobile, country)
                             VALUES ('$username', '" . md5($password) . "', '$email', '$mobile', '$country')";
                $result   = mysqli_query($con, $query);
                
                if ($result) {
                    echo "<div class='form-success'>
                          <h3>You are registered successfully.</h3>
                          <p class='link'>Click here to <a href='login.php'>Login</a></p>
                          </div>";
                } else {
                    echo "<div class='form-error'>
                          <h3>Required fields are missing or username/email already exists.</h3>
                          <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                          </div>";
                }
            } else {
            ?>
            <form class="form" action="" method="POST">
                <h1 class="login-title">Registration</h1>
                
                <div class="input-group">
                    <input type="text" class="login-input" name="username" placeholder="Username" required />
                    <i class="fas fa-user"></i>
                </div>
                
                <div class="input-group">
                    <input type="text" class="login-input" name="email" placeholder="Email Address" required />
                    <i class="fas fa-envelope"></i>
                </div>
                
                <div class="input-group">
                    <input type="text" class="login-input" name="mobile" placeholder="Mobile No" required />
                    <i class="fas fa-mobile-alt"></i>
                </div>
                
                <div class="input-group">
                    <input type="text" class="login-input" name="country" placeholder="Country" required />
                    <i class="fas fa-globe"></i>
                </div>
                
                <div class="input-group">
                    <input type="password" class="login-input" name="password" placeholder="Password" required />
                    <i class="fas fa-lock"></i>
                </div>
                
                <div class="g-recaptcha" data-sitekey="6Ld-d2AiAAAAAO5-Jqkf44SCMy1aIzYqlNrDuEkp"></div>
                
                <input type="submit" name="submit" value="Register" class="login-button">
                <br><br><p style="color:#fff">Already registered ?</p>
                <input type="button" value="Login" onclick="window.location.href='login.php';" class="login-button alt" s>
            </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<br><br><br><br>
<footer id="footer">
<p>At Deli-licious,Where We Strive For More</p>
</footer>
</body>
</html>