<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of updatedb
 *
 * @author Yasha
 */
include '../countrylist.php';
include '../userinteraction/DBstatistics.php';

$db=new DbConnector(); 
$id=$_GET['id'];
$id1=$_POST['id'];
$writer=$_GET['writer'];
$buttons=$_GET['buttons'];
$body=$_POST['body'];
$country=$_GET['country'];
$title=$_GET['title'];
$country=country::GetCountryKey($country);
if($country!=null){
$db->query("update articles set eventlocation='$country' where id=$id");
    

}else if($body!=null)
{
          
    $db->query("update articles set body='$body' where id=$id1");
}
else if($title!=null)
{ 
    $db->query("update articles set title='$title' where id=$id");
}
else if($buttons!=null)
{
    new DBstatistics($writer, $id, $buttons);
       
}

?>
