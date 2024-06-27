<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deli-licious</title>
    <link rel="stylesheet" type="text/css" href="clientstyle.css">
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
                <li><a href="userprofile.php">User Profile</a></li>
                <li><a href="login.php" onclick="return alert('User Successfully Logged out')">Logout</a></li>
            </ul>
        </nav>
    </header>
 
    <div id="page-container">
        <div id="content-wrap">
            <div class="search-box">
                <form action="search.php" method="post">
                    <label>Search Recipe by Name/Category/Author: </label>
                    <input type="text" name="searchvalue" placeholder="Search..." required>
                    <input type="submit" name="search" value="Search">
                </form>
            </div>

            <h1 style="background-color: #555; padding: 20px; color:white; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 80%; margin: 0 auto; text-align: center; margin-bottom: 30px;">Recipes Table</h1>

            <table border="1" style="background: linear-gradient(90deg, transparent, #fff); box-sizing: border-box; box-shadow: 0 15px 25px rgba(0,0,0,.6); padding:5px; border-radius: 10px; background: rgba(255, 255, 255, 0.76); color: black;">
                <tr>
                    <th>Recipe Id</th>
                    <th>Recipe Name</th>
                    <th>Category Name</th>
                    <th>Author Name</th>
                    <th>Ingredients</th>
                    <th>Prep Method</th>
                    <th>Prep Time</th>
                    <th>Cooking Time</th>
                    <th>Servings</th>
                    <th>Image Name</th>
                    <th>Give your idea</th>
                </tr>

                <?php
                $pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '');
                
                $sql = 'SELECT * FROM recipetable ORDER BY rand() LIMIT 4';
                $queryresult = $pdo->query($sql);

                foreach($queryresult as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['recipeid'] ?></td>
                        <td><?php echo $row['recipename']?></td>
                        <td><?php echo $row['categoryname']?></td>
                        <td><?php echo $row['author']?></td>
                        <td><?php echo $row['ingredients']?></td>
                        <td><?php echo $row['prepmethod']?></td>
                        <td><?php echo $row['preptime']?></td>
                        <td><?php echo $row['cookingtime']?></td>
                        <td><?php echo $row['servings']?></td>
                        <td><img src="recipeimages/<?php echo $row['imagename'];?>" width="150px" height="150px"></td>
                        <td><a href="review.php?recipeid=<?php echo $row['recipeid']; ?>" class="btn1-more">Feedback</a></td>
                    </tr>
                <?php }?>
            </table>
        </div>
    </div>
    <br><br><br> <br><br><br>
    <footer id="footer">
        <p>At Deli-licious,Where We Strive For More</p>
    </footer>
</body>
</html>
