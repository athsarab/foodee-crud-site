<?php
try
{
$pdo=new PDO('mysql:host=localhost;dbname=wt','root','');
//the above code connects php to my sql database
}
catch(PDOException $e)
//returns the message in echo if php fails to connect to the sql database
{
echo "error in connecting to the database";
exit;
}
if(isset($_POST['send']))
	//acknowledges whether the button has been clicked or not 
{
try
{
$sql='INSERT INTO cheftable SET chefid=NULL,chefname=:chef,chefemail=:email,chefaddress=:address';
$f=$pdo->prepare($sql);
$f->bindvalue(':chef',$_POST['chefname']);
//bind value brings together two values , chef is referred to as a container and chefname is the textbox name
$f->bindvalue(':email',$_POST['chefemail']);
$f->bindvalue(':address',$_POST['chefaddress']);
$f->execute();
}
catch (PDOException $e)
{
	echo "chef Not Saved,Try Again";

}
echo "chef successfully saved";
}
?>
