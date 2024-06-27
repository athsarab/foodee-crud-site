<?php
// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '');

// Check if ID parameter is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare SQL statement to delete feedback
    $sql = "DELETE FROM feedback WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Feedback deleted successfully
        echo "<script>alert('Feedback deleted successfully.'); window.location = 'Feedback.php';</script>";
        exit();
    } else {
        // Error handling
        echo "Error: Could not delete feedback.";
    }
} else {
    echo "Error: No ID specified.";
}
?>
