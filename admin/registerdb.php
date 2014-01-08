<?php
include_once '../db/dbConnector.php';
$name=$_POST['username'];
$country=$_POST['country'];
$url=$_POST['url'];
$statistics=$_POST['statistics'];
echo $name;
echo $url;
echo $country;
echo $statistics;
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) { 

  // Temporary file name stored on the server
  $tmpName  = $_FILES['image']['tmp_name'];  

  // Read the file 
  $fp      = fopen($tmpName, 'r');
  $data = fread($fp, filesize($tmpName));
  $data = addslashes($data);
  fclose($fp);
$query = "INSERT INTO newsdetails(name, country, url, statistics,image) values('$name','$country','$url',$statistics,'$data')";
echo $query;
$db=new DbConnector();
$results=$db->query($query);
echo $results;
// Close our MySQL Link
print "Thank you, your file has been uploaded.";

}
else {
print "No image selected/uploaded";
}
?>
