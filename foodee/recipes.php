<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Module</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            background-repeat: no-repeat;
            background-position: center;
            overflow: scroll;
            background-image: linear-gradient(to bottom, rgb(128, 128, 128) 0%, rgb(31, 31, 31) 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Header styles */
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            position: absolute;
            top: 0;
        }

        .logo a {
            color: #fff;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
            padding: 25px ;
        }

        nav ul {
            display: flex;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #555;
        }

        /* form */
        form {
            background: rgba(255, 255, 255, 0.61);
            width: 700px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            color: #626364;
            font-size: 2.8em;
            text-align: center;
            padding-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"], input[type="file"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #5D6975;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 20px;
            cursor: pointer;
            border-radius: 5px;
            display: block;
            margin: 30px auto;
        }

        input[type="submit"]:hover {
            background-color: #424e60;
        }

        /*footer*/
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
            margin-top: 20px;
        }
    </style>
    <script src="//cdn.ckeditor.com/4.20.0/basic/ckeditor.js"></script>
</head>
<body>

<header>
    <div class="logo"><a href="index.html">Home</a></div>
    <nav>
        <ul>
            <li><a href="admin.html">Welcome Admin</a></li>
        </ul>
    </nav>
</header>

<br><br><br>

<form id="forms" action="" method="post" enctype="multipart/form-data">
    <h1>Recipe Module</h1>
    <label for="recipename">Recipe Name</label>
    <input type="text" id="recipename" name="recipename" placeholder="Recipe name" required><br>

    <label for="categoryname">Category</label>
    <input type="text" id="categoryname" name="categoryname" placeholder="Category" required><br>

    <label for="author">Chef</label>
    <input type="text" id="author" name="author" placeholder="Chef" required><br>

    <label for="ingredients">Ingredients</label>
    <textarea id="ingredients" name="ingredients" placeholder="Ingredients" required></textarea><br>

    <label for="prepmethod">Prep Method</label>
    <textarea id="prepmethod" name="prepmethod" placeholder="Prep method" required></textarea><br>

    <label for="preptime">Prep Time</label>
    <input type="text" id="preptime" name="preptime" placeholder="Prep Time" required><br>

    <label for="cookingtime">Cooking Time</label>
    <input type="text" id="cookingtime" name="cookingtime" placeholder="Cooking Time" required><br>

    <label for="servings">Servings</label>
    <input type="text" id="servings" name="servings" placeholder="Servings" required><br>

    <label for="imagename">Image Name</label>
    <input type="file" id="imagename" name="imagename" required><br>

    <input type="submit" value="Save recipe" name="skicka"><br>
</form>

<script src="ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('ingredients');
    CKEDITOR.replace('prepmethod');
</script>

<br><br><br><br>
<footer>
    <p>At Deli-licious, Where We Strive For More</p>
</footer>

<?php
if(isset($_POST['skicka'])) {
    $pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $sql = 'INSERT INTO recipetable (recipename, categoryname, author, ingredients, prepmethod, preptime, cookingtime, servings, imagename) VALUES (:name, :category, :aauthor, :ingre, :prepmeth, :r_prep, :cooktime, :serving, :image)';
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':name', $_POST['recipename']);
    $stmt->bindParam(':category', $_POST['categoryname']);
    $stmt->bindParam(':aauthor', $_POST['author']);
    $stmt->bindParam(':ingre', $_POST['ingredients']);
    $stmt->bindParam(':prepmeth', $_POST['prepmethod']);
    $stmt->bindParam(':r_prep', $_POST['preptime']);
    $stmt->bindParam(':cooktime', $_POST['cookingtime']);
    $stmt->bindParam(':serving', $_POST['servings']);
    $stmt->bindParam(':image', $_FILES['imagename']['name']);
    
    try {
        $pdo->beginTransaction();
        
        if($stmt->execute()) {
            $target_folder = "recipeimages/";
            $target_file = $target_folder . basename($_FILES["imagename"]["name"]);
            
            if(move_uploaded_file($_FILES["imagename"]["tmp_name"], $target_file)) {
                $pdo->commit();
                echo '<script language="javascript">';
                echo 'alert("Recipe Successfully Sent")';
                echo '</script>';
                echo "<script> location.href='displayrecipes.php';</script>";
            } else {
                $pdo->rollBack();
                echo "Failed to move uploaded file.";
            }
        } else {
            $pdo->rollBack();
            echo "Recipe Not Saved, Try Again";
        }
    } catch(PDOException $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
?>

</body>
</html>
