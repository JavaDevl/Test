<?php
include("../db/dbConnector.php");
$connector = new DbConnector();
$username = trim(strtolower($_POST['username']));
$username = mysql_real_escape_string($username);


$query = "SELECT username FROM users WHERE username = '$username' LIMIT 1";
$result = $connector->query($query);
echo $connector->numrows;
mysql_close();
?>