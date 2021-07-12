<?php
$to = 'amirghafoorcss@gmail.com';
$subject = 'This is subject';
$message = 'This is body of email';
$from = "From: students.riphah.lhr@gmail.com";
if(mail($to,$subject,$message,$from)){
echo "mail send";
}else{
echo "error";
}
?>