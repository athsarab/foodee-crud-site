<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deli-licious</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
    <div class="logo"><a href="#">Deli-licious</a></div>
    <nav>
        <ul>
            
       <li><a href="home.php">Home</a></li>
            <li><a href="pictures.html">Gallery</a></li>
            <li><a href="reviwe.php">rew</a></li>
            <li><a href="client.php">Client</a></li>
            <li><a href="recipes.php">Recipes</a></li>
            <li><a href="chef.php">our chefs</a></li>
            <li><a href="login.php" onclick="return alert('User Successfully Logged out')">Logout</a></li>
        </ul>
    </div>
    </nav>
</header>
 <body>

<footer id="footer">
<p>At Deli-licious,Where We Strive For More</p>
</footer>
</body>
</html>
