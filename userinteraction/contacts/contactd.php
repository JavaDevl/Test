<?php 
session_start();



include "../../db/dbConnector.php";

$db=new DbConnector();

$user=$_SESSION['username'];
$f=$_POST;
$m=$db->query("insert into contact (sender, reasons, title, body, date_added) values
                                ('$user','".$f['reason']."','".$f['title']."','".$f['text']."',now())");
$db->checkquery($m, "Message Successfully sent!", "Error Message sending !");
        

?>