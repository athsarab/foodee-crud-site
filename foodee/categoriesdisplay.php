<html>
<head>
    <title>Categories page</title>
</head>
<body>
    <h1>Categories of Recipes</h1>
    <table border="1">
        <tr>
            <th>Category ID</th>
            <th>Category Name</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>

        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '');

        $sql = 'SELECT * FROM categorytable';
        $queryresult = $pdo->query($sql);

        foreach ($queryresult as $row) {
        ?>
            <tr>
                <td><?php echo $row['categoryid'] ?></td>
                <td><?php echo $row['categoryname'] ?></td>
                <td><button><a href="deletecategory.php?deleteid=<?php echo $row['categoryid'] ?>">Delete</a></button></td>
                <td><button><a href="editcategory.php?editid=<?php echo $row['categoryid'] ?>">Edit</a></button></td>
            </tr>
        <?php } ?>
    </table>
    <button><a href="categories.html">Back</a></button>
</body>
</html>
