<!DOCTYPE html>
<html>
<head>
    <title>Recipes page</title>
    <link rel="stylesheet" type="text/css" href="displayrecipesstyle.css">
</head>
<body>
    <ul>
        <li class="logout-link"><a href="login.php" onclick="return confirm('Are you sure you want to log out?')">Logout</a></li>
    </ul>

    <h1>Recipes Table</h1>

    <table>
        <thead>
            <tr>
                <th>Recipe Id</th>
                <th>Recipe Name</th>
                <th>Category Name</th>
                <th>Chef Name</th>
                <th>Ingredients</th>
                <th>Prep Method</th>
                <th>Prep Time</th>
                <th>Cooking Time</th>
                <th>Servings</th>
                <th>Image Name</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '');

            $sql = 'SELECT * FROM recipetable';
            $queryresult = $pdo->query($sql);

            foreach ($queryresult as $row) {
            ?>
                <tr>
                    <td><?php echo $row['recipeid'] ?></td>
                    <td><?php echo $row['recipename'] ?></td>
                    <td><?php echo $row['categoryname'] ?></td>
                    <td><?php echo $row['author'] ?></td>
                    <td><?php echo $row['ingredients'] ?></td>
                    <td><?php echo $row['prepmethod'] ?></td>
                    <td><?php echo $row['preptime'] ?></td>
                    <td><?php echo $row['cookingtime'] ?></td>
                    <td><?php echo $row['servings'] ?></td>
                    <td><?php echo $row['imagename'] ?></td>
                    <td><button><a href="deleterecipe.php?dd=<?php echo $row['recipeid'] ?>">Delete</a></button></td>
                    <td><button><a href="editrecipe.php?id=<?php echo $row['recipeid'] ?>">Edit</a></button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <button><a href="contentadmin.html">Back</a></button>
</body>
</html>
