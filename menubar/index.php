

 	<!--[if lt IE 8]>
		<script src ="http://ie7-js.googlecode.com/svn/version/2.1(beta2)/IE8.js"></script>
	<![endif]-->	
      
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script> 
  <script>
   
  
     function getURLParameter(name) {
    return decodeURI(
        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
    );
}
 var s=getURLParameter("region");
 
                    </script>     
                    	<link rel="stylesheet" href="http://localhost/PhpProject5/menubar/css/style.css" type="text/css" />
                        <style>
                             body{
            background-image:url('http://localhost/PhpProject5/menubar/back1.jpg');
            background-repeat: repeat-x;      }
                            #menu1{
    margin-top: 80px;
             background-image:url('http://localhost/PhpProject5/menubar/back3.jpg');
            background-repeat: repeat-x; 
}
                            #menu11{
                                                               

    margin-top: -10px;
             background-image:url('http://localhost/PhpProject5/menubar/back3.jpg');
            background-repeat: repeat-x; 
}
#welcomemessage
{
    
    color:#fff; text-align: right; font-size:18px; line-height: 130px; position:absolute;
}
.welcome{
    
    display:block; position:relative;
 float:right ; font-size:14px; font-weight: bold;   
}
.welcome .welcomeoptions
{
    color:#888;
}
.welcome .welcomeoptions:hover{
    color:#fff;
}
                   </style>

    <div style=" margin-left:20px; margin-top:8px;  min-width:850px;"> <a href="http://localhost/PhpProject5/homepage.php">
            <img id="logo1" src="http://localhost/PhpProject5/menubar/logopicture.jpg" />
                <img id="logo2" src="http://localhost/PhpProject5/menubar/newsonfire.jpg" />
        </a>  
        <?php     
        
include $_SERVER["DOCUMENT_ROOT"] .'\PhpProject5\phpfastcach\php_fast_cache.php';
include $_SERVER["DOCUMENT_ROOT"] .'\PhpProject5\ranks\sortlvl.php';
include ($_SERVER["DOCUMENT_ROOT"] .'\PhpProject5\db\dbConnector.php');

$srtlvl=new SortLvl();
        $username=$_SESSION['username'];
        $userlevel=$_SESSION['user_level'];
        
        $dbc=  phpFastCache::get("dbcach");
        
        if(!$dbc)
        {
            $db=new DbConnector();
            phpFastCache::set("dbcach",$db);
                    $dbc=  phpFastCache::get("dbcach");
                                $dbcach =new $dbc;


        }
        else
        {
            $dbcach =new $dbc;
        }
        $sc=$dbcach->fetchmyArray("select score from users where username='$username'");
?>
     <?php 
include ($_SERVER["DOCUMENT_ROOT"] .'\PhpProject5\fileloading\fileloader.php');
     $fl=new Fileloader($_SERVER["DOCUMENT_ROOT"] ."/PhpProject5/ranks/level.txt");
$level=$fl->LoadFile();
     if(!is_null($username)){?>    <span id="welcomemessage">Welcome, <b><?php echo$username ?></b> 
            
        
        </span>
        <div style="">
        <span class="welcome" style="">
            <a class="welcomeoptions" href="http://localhost/PhpProject5/login/settings.php"> Settings </a> | <a class="welcomeoptions" href="http://localhost/PhpProject5/menubar/underconstruction.php">My Account</a>| <a class="welcomeoptions" href="http://localhost/PhpProject5/menubar/underconstruction.php">Points: <?php echo number_format($sc[0][0]);?></a> </span><br>
 <span class="welcome" style="">
     <a class="welcomeoptions" href="http://localhost/PhpProject5/ranks/level.php"> Level: <?php echo $srtlvl->sortmemberlevel($sc[0][0]) ?></a> | <a class="welcomeoptions" href="http://localhost/PhpProject5/login/logout.php"> Logout</a></span>
        </div>
            <div style="margin-bottom:-30px">
                </div><br></div>
    
      <div id="menu1">
        <?php } else {?>
            <br></div>
      <div  id="menu11">
            <?php } ?>
      
        
        <div id="menu2">
    <div  style="position:absolute;">
<ul  id="nav">
	<!--<li  ><a style="height:19px;" class="homepage" href="#"><img style=" margin:-6px -6px -6px -6px;" src="menubar/newsonfire3.jpg" name=""/></a></li>-->

       <li  id="topstories"><a  href="<?php echo $_SERVER['SERVER_NAME'] ?>/Category/page.php?category=topstories">Top Stories</a></li>
       <li  id="bn" ><a  href="http://<?php echo $_SERVER['SERVER_NAME'] ?>/Category/page.php?category=politics">Politics</a>
 </li>

	<li id="world"><a  href="<?php echo $_SERVER['SERVER_NAME'] ?>/PhpProject5/Category/page.php?category=entertainement">Entertainment</a></li>
	<li  id="business"><a  href="<?php echo $_SERVER['SERVER_NAME'] ?>/PhpProject5/Category/page.php?category=bus">Business</a></li>
	<li  id="sport"><a  href="<?php echo $_SERVER['SERVER_NAME'] ?>/PhpProject5/Category/page.php?category=sprt">Health</a></li>
	<li  id="tech"><a  href="<?php echo $_SERVER['SERVER_NAME'] ?>/PhpProject5/Category/page.php?category=tech">Technology</a></li>
     <?php 
     if(is_null($username)){?>    <li  id="login" ><a  href="http://localhost/PhpProject5/login/login.php">Login</a></li>
     <?php }
     else{?>   <li   id="addarticle" ><a  href="http://localhost/PhpProject5/article/articleregistration.php">Add article</a></li>
     <li  ><a  href="http://localhost/PhpProject5/article/articleregistration.php">Admin Console</a>
         <ul>
             <li><a href="http://localhost/PhpProject5/admin/confirmarticles.php">Confirm Article</a></li>
             <li><a href="http://localhost/PhpProject5/admin/complain/viewcomplains.php">Complaints</a></li>
             <li><a href="http://localhost/PhpProject5/ranks/adminlvlmanager.php">Level Manager</a></li>
             
             
         </ul>
     </li>
     <?php }
     
     ?>
</ul></div></div></div>
    <script>
        document.getElementById(s).className="current";

          $( document ).ready(function() {
          $("#nav  #topstories.current a").css({"background": "-webkit-gradient(linear, 21% 51%, 0% 0%, from(#00558d), to(#8d3600))","padding-top": "15px"});
      $("#nav  #business.current a").css({"background": "-webkit-gradient(linear, 0% 50%, 79% 96%, from(#4b216c), to(#bfbfbf))","padding-top": "15px"});
      $("#nav  #sport.current a").css({"background": "-webkit-gradient(linear, 0% 50%, 79% 96%, from(#b3b39a), to(#666633))","padding-top": "15px"});
      $("#nav  #tech.current a").css({"background": "-webkit-gradient(linear, 0% 50%, 79% 96%, from(#9ab3cc), to(#336699))","padding-top": "15px"});
  $("#nav  #bn.current a").css({"background": "-webkit-gradient(radial, 165 124, 0, 309 -243, 648, from(#790000), to(#bd8080))","padding-top": "15px"});
$("#nav  #world.current a").css({"background": "-webkit-gradient(linear, left top, left bottom, from(#003300), to(#669966))","padding-top": "15px"});}
  )
     

    </script>
 <!-- it affects the adminlvlmanager-->
<script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js" type="text/javascript"></script>
    <script src="js/scripts.js"></script>

