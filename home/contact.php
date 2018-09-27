<?php
$name="name: ".$_POST["name"]."\n";
$phone="phone: ".$_POST["phone"]."\n";
$email="email: ".$_POST["email"]."\n";
$message="message: ".$_POST["message"]."\n";
$subject="subject ".$_POST["subject"]."\n";
$fullmessage="Enquiry from Beer in Flanders Page.\n\n".$name.$phone.$email.$message.$subject;
mail("dheera@mileage.in","Enquiry from Beer in Flanders Page",$fullmessage,"From: online.enquiries@beerinflanders.com");
header("Location:../home/");
?>