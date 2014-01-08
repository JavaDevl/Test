<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of settingdb
 *02
 * @author Yasha
 */
session_start();


function bytesToSize($bytes, $precision = 2)
{  
    $kilobyte = 1024;
    $megabyte = $kilobyte * 1024;
    $gigabyte = $megabyte * 1024;
    $terabyte = $gigabyte * 1024;
   
    if (($bytes >= 0) && ($bytes < $kilobyte)) {
        return $bytes . ' B';
 
    } elseif (($bytes >= $kilobyte) && ($bytes < $megabyte)) {
        return round($bytes / $kilobyte, $precision) . ' KB';
 
    } elseif (($bytes >= $megabyte) && ($bytes < $gigabyte)) {
        return round($bytes / $megabyte, $precision) . ' MB';
 
    } elseif (($bytes >= $gigabyte) && ($bytes < $terabyte)) {
        return round($bytes / $gigabyte, $precision) . ' GB';
 
    } elseif ($bytes >= $terabyte) {
        return round($bytes / $terabyte, $precision) . ' TB';
    } else {
        return $bytes . ' B';
    }
}



include '../db/dbConnector.php';

class settingdb {
    private  $db;
    public $username;
    function __construct() {
$this->db=new DbConnector();
$this->username=$_SESSION['username'];
}
    
   function update($command, $value)
    {
       if($command=='soura')
       {
             $fp      = fopen($value, 'r');
  $value = fread($fp, filesize($value));
  $value = addslashes($value);
       }
       $translated=  trscommand($command);
       $this->db->query("update users set $translated = '$value' where username='$this->username'");
                                     
    }
    
}
$command=$_POST['pk'];
$value=$_POST['value'];
echo $value;

function trscommand($command)
{
switch($command)
{
    case "balad": return "country"; break;
    case "barid": return "email"; break;
    case "sana": return "birthdate"; break;
    case "kalimetelser":return  "password"; break;
    case "khscountry":return  "country_display"; break;
    case "khssana": return "birth_display"; break;
    case "khsjens":return  "sexe_display"; break;
    case "soura":return  "avatar"; break;
    default:return "fuckyou";break;
}
}
echo $command;
echo "<br>";
  echo $value;
       
if(!is_null($command)){
    $sdb=new settingdb();

$sdb->update($command, $value);
}



?>
