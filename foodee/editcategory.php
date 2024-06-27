<?php
try
{
	$pdo=new PDO('mysql:host=localhost;dbname=wt','root','');
}
catch (PDOException $e)
{
	echo "error connecting to database";

}
try
{
$sql='SELECT * FROM categorytable WHERE categoryid=:id';
$value=$pdo->prepare($sql);
$value->bindvalue(':id',$_GET['editid']);
$value->execute();
}
catch (PDOException $e)
{
	echo "error querying the category";
}
foreach($value as $row)
{
	?>
	<form action="editcategories2.php" method="post">
		Category ID
		<input type="text" name="categoryid" value="<?php echo $row['categoryid'];?>"><br>
	     Category Name
	<input type="text" name="categoryname" value="<?php echo $row['categoryname'];?>"><br>
	<input type="submit" name="update" value="update">
</form>
<?php 

}
?>