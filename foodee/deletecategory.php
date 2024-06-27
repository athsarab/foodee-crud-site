<?php 
$pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '');

$sql = 'DELETE FROM categorytable WHERE categoryid=:id';
$result = $pdo->prepare($sql);
$result->bindvalue(':id', $_GET['deleteid']);
$result->execute();

echo '<script language="javascript">';
echo 'alert("Successfully Deleted")';
echo '</script>';
echo "<script> location.href='categoriesdisplay.php';</script>";
?>
