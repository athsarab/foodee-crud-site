<?php
$pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '');

if (!$pdo) {
    echo "Error in connecting to the database";
    exit;
}

if (isset($_POST['send'])) {
    $sql = 'INSERT INTO categorytable SET categoryid=NULL, categoryname=:cname';
    $v = $pdo->prepare($sql);
    
    if (!$v) {
        echo "Error preparing the SQL statement";
        exit;
    }

    $result = $v->execute([':cname' => $_POST['category']]);

    if (!$result) {
        echo "Error saving the info to the database";
        exit;
    }

    echo "Category successfully saved";
}

?>
