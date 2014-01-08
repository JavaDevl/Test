
            

<html>
    <head><link href="css/regres.css" rel="stylesheet" type="text/css" />
        <script>
        
     window.onload=function()
   {
       setTimeout(function(){
  window.location = "http://localhost/PhpProject5/homepage.php";
}, 7000);
   }  
    </script>
</head>
    <body>  <?php
               include_once '../db/dbConnector.php';
                    include_once '../countrylist.php';
                   $username= $_POST['username'];
                   $email= $_POST['mail'];
                   $birth= $_POST['birth'];
                   $password= $_POST['password'];
                   $country= $_POST['country'];
$converted_array = array_map("strtoupper", country::$countrylist);
$key = array_search(strtoupper($country), $converted_array);


$sql= "insert into users (username, birthdate, password, country, email) values ('$username','$birth','".md5($password)."','$key','$email');";
$dbc =new DbConnector();
$resul=$dbc->query($sql);
echo $resul;    
//if(! $resul )
//{ die('Could not enter data ');}
echo "Entered data successfully\n";
     
            
            $to      = 'yehia.awad@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: the.7a7a@gmail.com' . "\r\n" .
    'Reply-To: the.7a7a@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers))
echo "mail succefully sent";
            
        echo '<div id="mydiv">';
 echo '<center><b>Welcome '.$username.'.</b></center><br>
     You will receive a verification email as soon as possible!<br>'; 
 echo '<small>Don\'t forget to check Spam and junk folders.</small>';?>
        </div>
    </body>
</html>