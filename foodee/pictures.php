<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deli-licious</title>
    <link rel="stylesheet" type="text/css" href="picturestyle.css">
   
</head>
<body>
	<header>
    <div class="logo"><a href="#">Deli-licious</a></div>
    <nav>
        <ul>
            <li><a href="pictures.php">Home</a></li>
            
            <li><a href="contact.html">Contact</a></li>
            <li><a href="client.php">Recipes</a></li>
            <li><a href="chef.php">Chefs Details</a></li>
            <li style="color:white;font-size:20px;">Hey, <?php echo $_SESSION['username']; ?>!</li>
  
             <li><a href="userprofile.php">User Profile</a></li>
            <li><a href="login.php" onclick="return alert('User Successfully Logged out')">Logout</a></li>
            
        </ul>
    </div>
    </nav>
</header>



<div class="gallery-title">Our Gallery</div>
<div class="image-grid">
    <img src="./recipeimages/pasta.jpg" id="img1">
    <img src="./recipeimages/burger.jfif" id="img2">
    <img src="./recipeimages/fan_cakes.jpg" id="img3">
    <img src="./recipeimages/stew.jpg" id="img4">
    <img src="./recipeimages/lasagna.jpg" id="img5">
    <img src="./recipeimages/shavarma.jpg" id="img6">
    <img src="./recipeimages/lava-cake.jpg" id="img7">
    <img src="./recipeimages/brownies.jpg" id="img8">
</div>


</div>

<br><br><br><br>
</div>
<footer id="footer">
<p>At Deli-licious,Where We Strive For More</p>
</footer>
</body>
</html>