<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require('db.php');


$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);


if (isset($_POST['update'])) {
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $country = $_POST['country'];

    $update_query = "UPDATE users SET email='$email', mobile='$mobile', country='$country' WHERE username='$username'";
    mysqli_query($con, $update_query);
    
    echo "<script>alert('Update successful!'); window.location.href = 'userprofile.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User Profile</title>
    <style>
                body {
    font-family: 'Arial', sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    
    justify-content: center; /* Aligns horizontally center */
    background-repeat: no-repeat;
  background-position: center;
  overflow: scroll;
    background-image: url("recipeimages/pasta.jpg");
     
    
    
  }
  
  /* Navigation bar */
  header {
    background-color: #333;
    color: white;
    padding: 10px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .logo a {
    color: white;
    text-decoration: none;
    font-size: 28px;
    margin-left: 30px;
    font-family:Lucida Sans Typewriter;
  }
  
  nav ul {
    list-style-type: none;
    padding: 0;
    margin-right: 20px;
    display: flex;
    align-items: center;
  }
  
  nav ul li {
    margin-right: 30px;
  }
  
  nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
  }
  
  /*footer*/
  
  #footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
  }
          .container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h1 {
    font-size: 24px;
    color: #333;
    text-align: center;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-size: 16px;
    color: #666;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box; /* Makes sure padding does not affect width */
    height: 40px; /* Gives input a proper height */
}

.button {
    display: inline-block;
    font-size: 16px;
    color: #fff;
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    margin-right: 5px;
}

.update {
    background-color: #28a745;
}

.update:hover {
    background-color: #218838;
}

.delete {
    background-color: #dc3545;
}

.delete:hover {
    background-color: #c82333;
}

.form-actions {
    text-align: right;
}

input[type="text"]:focus {
    border-color: #66afe9;
    outline: none;
}
    </style>
</head>
<header>
        <div class="logo"><a href="#">Deli-licious</a></div>
        <nav>
            <ul>
            <li><a href="pictures.php">Home</a></li>
            
            <li><a href="contact.html">Contact</a></li>
            <li><a href="client.php">Recipes</a></li>
            <li><a href="chef.php">Chefs Details</a></li>
           
             <li><a href="userprofile.php">User Profile</a></li>
            <li><a href="login.php" onclick="return alert('User Successfully Logged out')">Logout</a></li>
            </ul>
        </nav>
    </header>

<body>
    <div class="container">
<h1>Welcome, <?php echo htmlspecialchars($row['username']); ?>!</h1>
    <form method="post" action="updateuser.php">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>">
        </div>
        <div class="form-group">
            <label for="mobile">Mobile:</label>
            <input type="text" id="mobile" name="mobile" value="<?php echo htmlspecialchars($row['mobile']); ?>">
        </div>
        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" id="country" name="country" value="<?php echo htmlspecialchars($row['country']); ?>">
        </div>
        <div class="form-actions">
        <input type="submit" name="update" value="Update" class="button update">     
    </div>
       

         
    </form>
</div>

<footer id="footer">
        <p>At Deli-licious, Where We Strive For More</p>
    </footer>
</body>
</html>
