<?php
// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '');

// Check if ID parameter is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the feedback entry based on the ID
    $sql = "SELECT * FROM feedback WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $feedback = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$feedback) {
        echo "Error: Feedback not found.";
        exit();
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $recipeRating = isset($_POST['recipe_rating']) ? $_POST['recipe_rating'] : null;
        $chefRating = isset($_POST['chef_rating']) ? $_POST['chef_rating'] : null;
        $websiteRating = isset($_POST['website_rating']) ? $_POST['website_rating'] : null;
        $comments = isset($_POST['comments']) ? $_POST['comments'] : null;

        // Prepare SQL statement to update feedback
        $sql = "UPDATE feedback SET recipe_rating = :recipeRating, chef_rating = :chefRating, 
                website_rating = :websiteRating, comments = :comments WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // Bind parameters and execute the statement
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':recipeRating', $recipeRating);
        $stmt->bindParam(':chefRating', $chefRating);
        $stmt->bindParam(':websiteRating', $websiteRating);
        $stmt->bindParam(':comments', $comments);

        if ($stmt->execute()) {
            // Feedback updated successfully
            echo "<script>alert('Feedback updated successfully.'); window.location = 'Feedback.php';</script>";
            exit();
        } else {
            // Error handling
            echo "Error: Could not update feedback.";
        }
    }

    // Display a form to edit the feedback
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Feedback</title>
        
    <link rel="stylesheet" type="text/css" href="feedbackstyle.css">
    </head>
    <body>
    <header>
    <div class="logo"><a href="#">Deli-licious</a></div>
    <nav>
        <ul>
               <li><a href="pictures.php">Home</a></li>
           
            <li><a href="contact.html">Contact</a></li>
            <li><a href="login.php">login</a></li>
             <li><a href="register.html">Register</a></li>
            
        </ul>
    </div>
    </nav>  
 </header>
 <div id="page-container">
        <div id="content-wrap">
        <h2>Edit Feedback</h2>
        <form action="" method="post">
            <label for="recipe_rating">Rate the Recipe:</label>
            <input type="number" name="recipe_rating" min="1" max="5" value="<?php echo $feedback['recipe_rating']; ?>">
            <br>
            <label for="chef_rating">Rate the Chef:</label>
            <input type="number" name="chef_rating" min="1" max="5" value="<?php echo $feedback['chef_rating']; ?>">
            <br>
            <label for="website_rating">Rate the Website:</label>
            <input type="number" name="website_rating" min="1" max="5" value="<?php echo $feedback['website_rating']; ?>">
            <br>
            <label for="comments">Comments:</label><br>
            <textarea name="comments" rows="4" cols="50"><?php echo $feedback['comments']; ?></textarea>
            <br>
            <input type="submit" value="Update Feedback">
        </form>
</div>
</div>
    </body>
    </html>
    <?php
} else {
    echo "Error: No ID specified.";
}
?>
