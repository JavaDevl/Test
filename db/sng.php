<?php

include "dbConnector.php";

class Database  {
// A static variable to hold our single instance
private static $_instance = null;
// Make the constructor private to ensure singleton
//private static $PDO;
private function __construct()
{
// Call the PDO constructor
//$this->PDO=new PDO('mysql:host=localhost;dbname=FNDB','Yehiaa', '554927');
}
// A method to get our singleton instance
public static function getInstance()
{
if (!(self::$_instance instanceof PDO)) {
self::$_instance = new PDO('mysql:host=localhost;dbname=FNDB','Yehiaa', '554927');
}
return self::$_instance;
}
}


?>
