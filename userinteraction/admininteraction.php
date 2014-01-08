
        <?php session_start();
include "DBstatistics.php";
$id=$_POST['id'];
$command=strtolower($_POST['command']);
      new DBstatistics($_SESSION["username"], $id, $command);
              ?>

