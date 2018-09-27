<?php
$con=mysql_connect('localhost', 'beerinfl_user', 'gzw@#bk22Uc)');
mysql_select_db("beerinfl_database",$con);
$sql = "Insert into tbl_forms (name, email, tel, subject, message,active)VALUES('".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['subject']."','".$_POST['message']."','Y')";
mysql_query($sql);
header("Location../home/");
?>