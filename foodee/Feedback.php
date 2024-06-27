<?php
// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $recipeId = isset($_POST['recipeid']) ? $_POST['recipeid'] : null;
    $recipeRating = isset($_POST['recipe_rating']) ? $_POST['recipe_rating'] : null;
    $chefRating = isset($_POST['chef_rating']) ? $_POST['chef_rating'] : null;
    $websiteRating = isset($_POST['website_rating']) ? $_POST['website_rating'] : null;
    $comments = isset($_POST['comments']) ? $_POST['comments'] : null;

    // Check if required fields are not null
    if ($recipeRating !== null && $chefRating !== null && $websiteRating !== null) {
        
        if (empty($comments)) {
            echo "Error: Comments field cannot be empty.";
            exit; // Stop further execution
        }
        // Prepare SQL statement to insert feedback into database
        $sql = "INSERT INTO feedback (recipe_id, recipe_rating, chef_rating, website_rating, comments) 
                VALUES (:recipeId, :recipeRating, :chefRating, :websiteRating, :comments)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters and execute the statement
        $stmt->bindParam(':recipeId', $recipeId);
        $stmt->bindParam(':recipeRating', $recipeRating);
        $stmt->bindParam(':chefRating', $chefRating);
        $stmt->bindParam(':websiteRating', $websiteRating);
        $stmt->bindParam(':comments', $comments);

        if ($stmt->execute()) {
            // Feedback added successfully
            echo "<script>alert('Feedback submitted successfully.'); window.location = 'Feedback.php';</script>";
            exit; // Stop further execution
        } else {
            // Error handling
            echo "Error: Could not add feedback.";
        }
    } else {
     
    }
}

// Fetch feedback for the selected recipeid or all feedback entries
if (isset($_POST['recipeid']) && !empty($_POST['recipeid'])) {
    $sql = "SELECT * FROM feedback WHERE recipe_id = :recipeId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':recipeId', $_POST['recipeid']);
    $stmt->execute();
} else {
    $sql = "SELECT * FROM feedback";
    $stmt = $pdo->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" type="text/css" href="feedbackstyle.css">
<style>
       .center-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* 100% of the viewport height */
    }

    .feedback-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        /* Remaining CSS properties */
    }
    .feedback-item {
        width: calc(33.333% - 20px); /* Three items per row */
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .feedback-item:hover {
        transform: translateY(-5px);
    }

    .feedback-box {
        padding: 20px;
        background-color: #f9f9f9;
    }

    .feedback-box h5 {
        font-size: 1.2em;
        margin-bottom: 10px;
    }

    .feedback-box p {
        margin-bottom: 8px;
    }

    .actions {
        padding: 15px;
        background-color: #e9e9e9;
        text-align: right;
    }

    .actions a {
        margin-left: 10px;
        text-decoration: none;
        padding: 8px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .actions a.edit {
        background-color: #007bff;
        color: white;
    }

    .actions a.delete {
        background-color: #dc3545;
        color: white;
    }

    .actions a:hover {
        opacity: 0.8;
    }
</style>
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
 <br><br><br> 
 <div id="page-container">
        <div id="content-wrap">
        <h2 style="font-size:35px">Feedback Form</h2>
        <form action="Feedback.php" method="post">
                <input type="hidden" name="recipeid" value="<?php echo isset($_POST['recipeid']) ? $_POST['recipeid'] : ''; ?>">
                <label for="recipe_rating">Rate the Recipe:</label>
                <input type="number" name="recipe_rating" min="1" max="5" required>
                <label for="chef_rating">Rate the Chef:</label>
                <input type="number" name="chef_rating" min="1" max="5" required>
                <label for="website_rating">Rate the Website:</label>
                <input type="number" name="website_rating" min="1" max="5" required>
                <label for="comments">Comments:</label>
                <textarea name="comments" rows="4" cols="50" required></textarea>
                <input type="submit" value="Submit Feedback">
            </form>
           <br><br>
            <!-- PHP code to display feedback entries -->
            <div class="container   ">
    <div class="feedback-container">
        <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $recipeId = htmlspecialchars($row['recipe_id']);
                $recipeRating = htmlspecialchars($row['recipe_rating']);
                $chefRating = htmlspecialchars($row['chef_rating']);
                $websiteRating = htmlspecialchars($row['website_rating']);
                $comments = htmlspecialchars($row['comments']);
                $feedbackId = htmlspecialchars($row['id']);
        ?>
                <div class="feedback-item">
                    <div class="feedback-box">
                        <h5>Recipe ID: <?php echo $recipeId; ?></h5>
                        <p>Recipe Rating: <?php echo $recipeRating; ?></p>
                        <p>Chef Rating: <?php echo $chefRating; ?></p>
                        <p>Website Rating: <?php echo $websiteRating; ?></p>
                        <p>Comments: <?php echo $comments; ?></p>
                    </div>
                    
                    <div class="actions">
                        <a href='edit_feedback.php?id=<?php echo $feedbackId; ?>' class='edit'>Edit</a>
                        <a href='delete_feedback.php?id=<?php echo $feedbackId; ?>' class='delete' onclick='return confirm("Are you sure you want to delete this feedback?")'>Delete</a>
                    </div>
                </div>
        <?php
            }
        ?>
    </div>
</div>
</div>

            
           
</div>


    <br><br><br>    <br><br><br>
    <footer id="footer">
        <p>At Deli-licious, Where We Strive For More</p>
    </footer>
</body>
</html>
