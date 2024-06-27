<html>
<head>
    <title>Chef page</title>
    <link rel="stylesheet" type="text/css" href="displayrecipesstyle.css">
</head>
<body>

<ul>
    <li class="logout-link"><a href="login.php" onclick="return confirm('Are you sure you want to log out?')">Logout</a></li>
</ul>

<h1>Chef Information</h1>
<table>
    <tr>
        <th>Chef ID</th>
        <th>Chef Name</th>
        <th>Chef Email</th>
        <th>Chef Address</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>

    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '');

    $sql = 'SELECT * FROM authortable';
    $queryresult = $pdo->query($sql);

    foreach($queryresult as $row) {
    ?>
        <tr>
            <td><?php echo $row['authorid'] ?></td>
            <td><?php echo $row['authorname'] ?></td>
            <td><?php echo $row['authoremail'] ?></td>
            <td><?php echo $row['authoraddress'] ?></td>
            <td><button><a href="deleteauthors.php?did=<?php echo $row['authorid'] ?>">Delete</a></button></td>
            <td><button><a href="editauthors.php?id=<?php echo $row['authorid'] ?>">Edit</a></button></td>
        </tr>
    <?php }?>
</table>
<button><a href="accountadmin.html">Back</a></button>
</body>
</html>
