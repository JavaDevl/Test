<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="../css/regres.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
        include_once '../db/dbConnector.php';
$username=$_GET['U'];
$password=$_GET['P'];
$email=$_GET['E'];

$sql='update user set confirmed=1 where username="'.$username.'" and password="'.$password.'" and email="'.$email.'"';
$db=new DbConnector;
if($db->query($sql))
{
  echo "<div id='mydiv'><center><h3>Congratulation <b>$username</b> !</h3> <h4>You have been successfully registered !</h4></center></div>";
}
?>
    </body>
</html>
