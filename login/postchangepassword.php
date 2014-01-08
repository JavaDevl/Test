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
            <input type="hidden" name="pk" value=""/>

        <?php
                session_start();

                include 'settingdb.php';
               $old=$_POST['oldpassword'];
               $new=$_POST['newpassword1'];
               $user=$_SESSION['username'];
             
               
              
              
               
       $db= new DbConnector();
$db->fetchmyArray("select username from users where username = '$user' and password='$old' limit 1");


if($db->numrows!=0)
{
    $sdb=new settingdb();
    $sdb->update("kalimetelser", md5($new));
     header( 'Location: ../homepage.php?successfullychanged=1' ) ;
}
else
{
    
  header( 'Location: changepassword.php?error=wrongpassword' ) ;
}
?>
    </body>
</html>
