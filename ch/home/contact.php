<?php
$name="name: ".$_POST["name"]."\n";
$phone="phone: ".$_POST["phone"]."\n";
$email="email: ".$_POST["email"]."\n";
$client_ip="client_ip: ".$_POST["client_ip"]."\n";
$subject="subject: ".$_POST["subject"]."\n";
$message="message".$_POST["message"]."\n";
$fullmessage="Enquiry from ch.beerinflanders.com.\n\n".$name.$phone.$email.$client_ip.$subject.$message;
//mail("info@visitflanders.com","Enquiry from ch.beerinflanders.com.",$fullmessage,"From: online.enquiries@beerinflanders.com");
mail("zhang.lihui@visitflanders.com","Enquiry from ch.beerinflanders.com.",$fullmessage,"From: online.enquiries@beerinflanders.com");
header("Location: http://www.wenjuan.com/s/eEF3e2/");
exit();
?>