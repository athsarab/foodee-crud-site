<?php 
$pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '');

$sql = 'DELETE FROM recipetable WHERE recipeid=:id';
$result = $pdo->prepare($sql);
$result->bindvalue(':id', $_GET['dd']);
$result->execute();

echo '<script language="javascript">';
echo 'alert("Successfully Deleted")';
echo '</script>';
echo "<script> location.href='displayrecipes.php';</script>";
?>
