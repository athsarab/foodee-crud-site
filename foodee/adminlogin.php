<?php
session_start();

$username=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];

$contentadminusername="contentadmin";
$contentadminpassword="contentpass";

$accountadminusername="accountadmin";
$accountadminpassword="accountpass";

$siteadminusername="siteadmin";
$siteadminpassword="sitepass";

?>

<?php

if (($username==$contentadminusername) AND ($password==$contentadminpassword) AND ($role=="contentadmin")) {

	$_SESSION['sessioncontentadmin']="1";
	
	echo ("<script LANGUAGE='JavaScript'> window.alert('Welcome Content Admin.');window.location.href='contentadmin.html';</script>");
	;
}

else if (($username==$accountadminusername) AND ($password==$accountadminpassword) AND ($role=="accountadmin")) {

	$_SESSION['sessionaccountadmin']="2";

	echo ("<script LANGUAGE='JavaScript'> window.alert('Welcome Account Admin.');window.location.href='accountadmin.html';</script>");
}

else if (($username==$siteadminusername) AND ($password==$siteadminpassword) AND ($role=="siteadmin")) {

	$_SESSION['sessionsiteadmin']="3";

	echo ("<script LANGUAGE='JavaScript'> window.alert('Welcome Site Admin.');window.location.href='siteadmin.html';</script>");
}

else
{
	echo ("<script LANGUAGE='JavaScript'> window.alert('You are not an registered admin .');window.location.href='login-user.php';</script>");
}

?>