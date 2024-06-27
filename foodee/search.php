<?php 
try
{
	$pdo=new PDO('mysql:host=localhost;dbname=wt','root','');
}
catch (PDOException $e)
{
	echo "Could Not Connect";
}
try
{
	$sql='SELECT * FROM recipetable WHERE recipename=:searchtext OR author=:searchtext OR categoryname=:searchtext';
	$result=$pdo->prepare($sql);
	$result->bindvalue(':searchtext',$_POST['searchvalue']);
	$result->execute();
}
catch(PDOException $e)
{
	echo "error searching";
}
foreach($result as $row) 
{
?>
Search Results:
Recipename:<?php echo $row['recipename'];?><br>
Author:<?php echo $row['author'];?><br>
Category:<?php echo $row['categoryname'];?><br>
ingredients:<?php echo $row['ingredients'];?><br>
Preparation Method:<?php echo $row['prepmethod'];?><br>
Preparation Time:<?php echo $row['preptime'];?><br>
Cooking Time:<?php echo $row['cookingtime'];?><br>
Servings:<?php echo $row['servings'];?><br>
Image Name:<img src="recipeimages/<?php echo $row['imagename'];?>"/>
<?php
	}
?>