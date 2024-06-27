<?php

$message="Our latest and greatest recipes, articles, and cooking tips, plus weekly letters from RB editors.";
$receiver = $_POST['reciever'];
$subject = "Dont miss out ";
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