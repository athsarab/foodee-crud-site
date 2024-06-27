<?php 
$pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '');

$sql = 'DELETE FROM authortable WHERE authorid=:id';
$result = $pdo->prepare($sql);
$result->bindvalue(':id', $_GET['did']);
$result->execute();

echo '<script language="javascript">';
echo 'alert("Successfully Deleted")';
echo '</script>';
echo "<script> location.href='displayauthors.php';</script>";
?>
