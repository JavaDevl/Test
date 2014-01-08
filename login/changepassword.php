<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
                  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
           <link  href="css/changepassword.css" rel="stylesheet" />

        <script src="http://code.jquery.com/jquery-latest.js"></script>
         <script type="text/javascript" src="parsley.js"></script>
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>      
           
           <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            

        </style>
        <title></title>
    </head>
    <body>
                 <?php include '../menubar/index.php';?>   

        <form method="post" action="postchangepassword.php" data-validate="parsley">
       
            
            <div id="changepassword">
                <div <?php 
                
                if (!$_GET['error']) 
                    {echo "style='display:none'";}
                else{echo "style='color:red; font-size:12px;   text-align:center'";}
                    ?> > Wrong password provided !<br>
                         Please type the correct old Password.</div>
                <label style="margin-top:20px;"><div class="texti">Old Password:</div><input id="passwordold" type="password" data-trigger="change" data-minlength="6"  data-required="true"  name="oldpassword" /></label>
            
            <label><div class="texti">New Password: </div><input type="password" data-minlength="8"  data-trigger="change" data-required="true"  id="np1" name="newpassword1" /></label>
            <label><div class="texti">Confirm New Password: </div><input type="password" data-minlength="8" data-trigger="change" data-required="true"  data-equalto="#np1" name="newpassword2" /></label>
        <input id="sb" type="submit" value="Change">
        <div style="clear:both"></div>
        </div>
        </form>  </body>
</html> 