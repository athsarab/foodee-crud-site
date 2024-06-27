<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deli-licious</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            justify-content: center;
            background-repeat: no-repeat;
            background-position: center;
            overflow: scroll;
            background-image: url("recipeimages/pasta.jpg");
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo a {
            color: white;
            text-decoration: none;
            font-size: 28px;
            margin-left: 30px;
            font-family: Lucida Sans Typewriter;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin-right: 20px;
            display: flex;
            align-items: center;
        }

        nav ul li {
            margin-right: 30px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        #footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        table {
            height: 300px;
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
            border-radius: 10px;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #bbbbbb73;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 20px;
            color: #fff;
            background-color: #bbbbbb;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        button:hover {
            background-color: #555;
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
                <li><a href="client.php">Recipes</a></li>
                <li><a href="chef.php">Chefs Details</a></li>
                <li><a href="userprofile.php">User Profile</a></li>
                <li><a href="login.php" onclick="return alert('User Successfully Logged out')">Logout</a></li>
            </ul>
        </nav>
    </header>
    <table>
        <thead>
            <tr>
                <th>Cheff ID</th>
                <th>Cheff Name</th>
                <th>Cheff Email</th>
                <th>Cheff Address</th>
            </tr>
        </thead>
        <tbody>
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
            </tr>
            <?php }?>
        </tbody>
    </table>
    
    <footer id="footer">
        <p>At Deli-licious, Where We Strive For More</p>
    </footer>
</body>
</html>
