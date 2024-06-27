<?php
// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '');

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