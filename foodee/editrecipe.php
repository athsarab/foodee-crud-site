<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(to bottom, rgb(128, 128, 128) 0%, rgb(31, 31, 31) 100%);
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #555;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #000;
        }

        .alert {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Recipe</h2>
    <?php
    // Establish connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wt";

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Fetch recipe details from the database
    $sql = 'SELECT * FROM recipetable WHERE recipeid=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // If recipe found, display the form
    if($row) {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Update'])) {
            // Update recipe details in the database
            $recipename = $_POST['recipename'];
            $categoryname = $_POST['categoryname'];
            $author = $_POST['author'];
            $ingredients = $_POST['ingredients'];
            $prepmethod = $_POST['prepmethod'];
            $preptime = $_POST['preptime'];
            $cookingtime = $_POST['cookingtime'];
            $servings = $_POST['servings'];
            $imagename = $_POST['imagename'];
            $recipeid = $_POST['recipeid'];
            
            $sql = "UPDATE recipetable SET recipename=:recipename, categoryname=:categoryname, author=:author, ingredients=:ingredients, prepmethod=:prepmethod, preptime=:preptime, cookingtime=:cookingtime, servings=:servings, imagename=:imagename WHERE recipeid=:recipeid";
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':recipename', $recipename);
            $stmt->bindParam(':categoryname', $categoryname);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':ingredients', $ingredients);
            $stmt->bindParam(':prepmethod', $prepmethod);
            $stmt->bindParam(':preptime', $preptime);
            $stmt->bindParam(':cookingtime', $cookingtime);
            $stmt->bindParam(':servings', $servings);
            $stmt->bindParam(':imagename', $imagename);
            $stmt->bindParam(':recipeid', $recipeid);
            $stmt->execute();
            echo "<script>alert('Update successful!'); window.location.href = 'displayrecipes.php';</script>";
            exit();
        }
    ?>
        <form action="" method="post">
            <!-- Hidden field to store recipe ID -->
            <input type="hidden" name="recipeid" value="<?php echo $row['recipeid']; ?>">
            
            <!-- Input fields for recipe details -->
            <div class="form-group">
                <label for="recipename">Recipe Name</label>
                <input type="text" name="recipename" value="<?php echo $row['recipename']; ?>">
            </div>
            <div class="form-group">
                <label for="categoryname">Category Name</label>
                <input type="text" name="categoryname" value="<?php echo $row['categoryname']; ?>">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" value="<?php echo $row['author']; ?>">
            </div>
            <div class="form-group">
                <label for="ingredients">Ingredients</label>
                <input type="text" name="ingredients" value="<?php echo $row['ingredients']; ?>">
            </div>
            <div class="form-group">
                <label for="prepmethod">Prep Method</label>
                <input type="text" name="prepmethod" value="<?php echo $row['prepmethod']; ?>">
            </div>
            <div class="form-group">
                <label for="preptime">Prep Time</label>
                <input type="text" name="preptime" value="<?php echo $row['preptime']; ?>">
            </div>
            <div class="form-group">
                <label for="cookingtime">Cooking Time</label>
                <input type="text" name="cookingtime" value="<?php echo $row['cookingtime']; ?>">
            </div>
            <div class="form-group">
                <label for="servings">Servings</label>
                <input type="text" name="servings" value="<?php echo $row['servings']; ?>">
            </div>
            <div class="form-group">
                <label for="imagename">Image Name</label>
                <input type="text" name="imagename" value="<?php echo $row['imagename']; ?>">
            </div>
            <!-- Submit button -->
            <button type="submit" name="Update">Update</button>
        </form>
    <?php 
    } else {
        echo "<div class='alert'>Recipe not found</div>";
    }
    ?>  
</div>

</body>
</html>
