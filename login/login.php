<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link href="css/login.css" rel="stylesheet" />
    </head>
    <body>
                 <?php         session_start();
                 if(!is_null($_SESSION['username']))   
            header( 'Location: ../homepage.php' ) ; 
include '../menubar/index.php';?>   


        <form id="loginform" method="post" action="postlogin.php">
              <?php 
        
        if($_GET['error']==1)
                echo "<div id='info'>Error: Wrong Username/Password combination \n </br>
                                        </div>";
            ?>      
        <div  >
                
                       
            <label><span>Username: </span><input name="user" type="text"/></label>
            <label><span>Password: </span><input name="pwd" type="password"/> <input id="submitlogin" type="submit" value="Login"/></label>
            <label ><span style="margin-left:50px;width:300px">Don't have an account ? <a style="  padding:2px; text-decoration:underline; color:#888" href='../Registeration/RegisterPage.php'> Create a new one</a></span></label>
          <?php 
        
        if($_GET['error']==1)
                echo "<label>if you forgot your password click <a href=''>here </a></br>
                                        </label>";
            ?>     
        </div></form>
    </body>
</html>
