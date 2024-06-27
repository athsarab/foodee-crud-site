<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Chef</title>
    <style>
        /* Styling for the page */
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(to bottom, rgb(128, 128, 128) 0%, rgb(31, 31, 31) 100%);
            margin: 0;
            padding: 20px;
        }
        .container {
            background: white;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #555;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #000;
        }
        label {
            margin-bottom: 4px;
            font-weight: bold;
            color: #555;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Chef</h2>
    <?php
    // Establishing a database connection
    $pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '');

    // Handling form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = 'UPDATE authortable SET authorname=:authorname, authoremail=:authoremail, authoraddress=:authoraddress WHERE authorid=:authorid';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':authorid', $_POST['authorid']);
        $stmt->bindValue(':authorname', $_POST['authorname']);
        $stmt->bindValue(':authoremail', $_POST['authoremail']);
        $stmt->bindValue(':authoraddress', $_POST['authoraddress']);
        
        // Executing the SQL query
        if ($stmt->execute()) {
            echo '<script language="javascript">';
            echo 'alert("Chef successfully edited")';
            echo '</script>';
            echo "<script> location.href='displayauthors.php';</script>";
        } else {
            echo '<script language="javascript">';
            echo 'alert("Error editing chef. Please try again.")';
            echo '</script>';
        }
    }

    // Fetching the chef details for editing
    $sql = 'SELECT * FROM authortable WHERE authorid=:id';
    $value = $pdo->prepare($sql);
    $value->bindValue(':id', $_GET['id']);
    $value->execute();

    // Displaying the edit form
    foreach ($value as $row) {
        ?>
        <form action="" method="post">
            <label for="authorid">Chef ID</label>
            <input type="text" id="authorid" name="authorid" value="<?php echo htmlspecialchars($row['authorid']); ?>" readonly>

            <label for="authorname">Chef Name</label>
            <input type="text" id="authorname" name="authorname" value="<?php echo htmlspecialchars($row['authorname']); ?>">

            <label for="authoremail">Chef Email</label>
            <input type="text" id="authoremail" name="authoremail" value="<?php echo htmlspecialchars($row['authoremail']); ?>">

            <label for="authoraddress">Chef Address</label>
            <input type="text" id="authoraddress" name="authoraddress" value="<?php echo htmlspecialchars($row['authoraddress']); ?>">
            <br><br>
            <input type="submit" name="Update" value="Update">
        </form>
        <?php
    }
    ?>
</div>
<br><br><br><br><br>
</body>
</html>
