
        <?php
include "../db/dbConnector.php";     
$db=new DbConnector();
$lvl=$_POST['lvl'];
$uname=$_POST['uname'];
$res=$db->query("update users set level=$lvl where username='".$uname."'");
if($res) 
header( 'Location: http://localhost/PhpProject5/ranks/adminlvlmanager.php' ) ;
?>
  