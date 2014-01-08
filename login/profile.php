<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
 session_start();
 $db=new DbConnector();
 $user=$_SESSION["username"];
 $dbprof=$db->fetchmyArray("select Username, birthdate, country, words, avatar where username='$user'");
 $dbprof=$db->fetchmyArray("select id, title, body, writer, pubdate, eventlocation, category, images where username='$user' where confirmed=2 ");



 ?>
    </body>
</html>
