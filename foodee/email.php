<?php

$message=$_POST['message'];
$receiver = "faiselabdi21@gmail.com";
$subject = "Email Test via PHP using Localhost";
$sender = "From:faisel.abdi97@gmail.com";
if(mail($receiver, $subject, $message, $sender)){
    echo '<script language="javascript">';
echo 'alert("Email Successfully Sent")';
echo '</script>';
echo "<script> location.href='contact.html';</script>";
}else{
    echo "Sorry, failed while sending mail!";
}
?>
