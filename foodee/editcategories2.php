<?php
try
{
	$pdo=new PDO('mysql:host=localhost;dbname=wt','root','');
}
catch (PDOException $e)
{
	echo "error connecting to database";

}
if (isset($_POST['update'])){
	try 
	{
	$sql='UPDATE categorytable SET categoryname=:category WHERE categoryid=:id';
	$info=$pdo->prepare($sql);
	$info->bindvalue(':category',$_POST['categoryname']);
	$info->bindvalue(':id',$_POST['categoryid']);
	$info->execute();
}
catch (PDOException)
{
	echo "error updating category";
}
echo '<script language="javascript">';
echo 'alert("Category successfully edited")';
echo '</script>';
echo "<script> location.href='categoriesdisplay.php';</script>";
}
?>