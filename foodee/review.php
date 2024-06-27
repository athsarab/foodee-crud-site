<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Review</title>
    <link rel="stylesheet" type="text/css" href="reviewstyle.css">
</head>
<body>
    <header>
    <div class="logo"><a href="#">Deli-licious</a></div>
    <nav>
        <ul>
               <li><a href="index.html">Home</a></li>
           
            <li><a href="contact.html">Contact</a></li>
            <li><a href="login.php">login</a></li>
             <li><a href="register.html">Register</a></li>
            
        </ul>
    </div>
    </nav> </header>
    <div id="page-container">
        <div id="content-wrap" style="color:#fff">
            <?php
            // Check if recipe id is provided
            if(isset($_GET['recipeid'])) {
                $recipeid = $_GET['recipeid'];
                // Retrieve recipe details from the database
                try {
                    $pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '');
                    $sql = "SELECT * FROM recipetable WHERE recipeid = :recipeid";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(['recipeid' => $recipeid]);
                    $recipe = $stmt->fetch(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo "Error retrieving recipe details.";
                }
                if($recipe) {
                    echo "<h2>Review for: {$recipe['recipename']}</h2>";
                    // Display the recipe details
                    echo "<p>Category: {$recipe['categoryname']}</p>";
                    echo "<p>Author: {$recipe['author']}</p>";
                    echo "<p>Ingredients: {$recipe['ingredients']}</p>";
                    echo "<p>Prep Method: {$recipe['prepmethod']}</p>";
                    echo "<p>Prep Time: {$recipe['preptime']}</p>";
                    echo "<p>Cooking Time: {$recipe['cookingtime']}</p>";
                    echo "<p>Servings: {$recipe['servings']}</p>";
                    echo '<img src="recipeimages/' . $recipe['imagename'] . '" width="80%" height="70%">';
                    // Add review button
                    echo '<form action="Feedback.php" method="post">';
                    echo '<input type="hidden" name="recipeid" value="' . $recipe['recipeid'] . '">';
                    echo '<input type="submit" value="Add Review">';
                    echo '</form>';
                } else {
                    echo "Recipe not found.";
                }
            } else {
                echo "Recipe ID not provided.";
            }
            ?>
        </div>
    </div>
    <br><br><br> <br><br><br> <br><br><br>
    <footer id="footer">
        <p>At Deli-licious, Where We Strive For More</p>
    </footer>
</body>
</html>
