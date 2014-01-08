<?php
include "db\dbConnector.php";

$db=new DbConnector();
    $fm1=$db->fetchmyArray("select name, password from person ");
    $num1=$db->numrows;

while(true)
{
    // Headers must be processed line by line.

    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
    // Set data line
    $fm2=$db->fetchmyArray("select name, password from person ");
    $num2=$db->numrows;
    if($num1!=$num2){
echo "data: ".$num2."\n\n";


    flush();            // Unless both are called !
    }
    // Wait one second.
    sleep(3);
}
?>