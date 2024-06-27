<?php
$pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '');

if (!$pdo) {
    echo "error in connecting to the database";
    exit;
}

if (isset($_POST['send'])) {
    $authorname = isset($_POST['authorname']) ? $_POST['authorname'] : '';
    $authoremail = isset($_POST['authoremail']) ? $_POST['authoremail'] : '';
    $authoraddress = isset($_POST['authoraddress']) ? $_POST['authoraddress'] : '';

    if ($authorname === "" || $authoremail === "" || $authoraddress === "") {
        echo "All fields must be filled out";
        exit;
    }

    $sql = 'INSERT INTO authortable (authorname, authoremail, authoraddress) VALUES (:authorname, :authoremail, :authoraddress)';
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':authorname', $authorname, PDO::PARAM_STR);
    $stmt->bindParam(':authoremail', $authoremail, PDO::PARAM_STR);
    $stmt->bindParam(':authoraddress', $authoraddress, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo '<script language="javascript">';
        echo 'alert("Chef Successfully Sent")';
        echo '</script>';
        echo "<script> location.href='displayauthors.php';</script>";
    } else {
        echo "Chef Not Saved, Try Again";
    }
}
?>
