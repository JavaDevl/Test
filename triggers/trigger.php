<?php
        $id=$_GET['id'];

if(is_null($id))
     header( 'Location: http://newsonfire.com' ) ;
else
session_start(); ?>
<!DOCTYPE html>
<html>
    <head>

        <script src="ckeditor_fine/ckeditor.js"></script> 

                    <?php include 'alertify.js0/alertlibrary.html'?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="css/articleread.css" rel="stylesheet"/>
<title></title>
    </head>
    <style>
#detailarticle
{
    margin:0px 10px 30px 250px;
   border:solid 2px #cecece;
   display:inline-block;
   padding:10px;
}
    </style>
      
    <body>

          <?php include 'menubar/index.php';?> 
           <div id="wholepage">
               <div id="adminfeature"> 
                   <input type="button" id="unfeature" value="Unfeature"/> 
                   <input type="button" id="reject" value="Reject"/> </div>

               
        <?php
        include "countrylist.php";

        $db=$dbcach;
        $userlevel=$_SESSION['user_level'];
        $username=$_SESSION['username'];

        $fc=$db->fetchmyArray("select title, body, writer, date(pubdate), eventlocation, category, confirmed, keywords from articles where id=$id");
        ?>
               <?php $db->query("update articles set hits=hits+1 where id=$id "); ?>
            <input type="hidden" id="userwriter" value="ksega"/>
            <input type="hidden" id="usernameid" value="<?php echo $username ?>"/>
            <input type="hidden" id="wordcounters"/>
            <input type="hidden" id="charcounters" />
            <input type="hidden" id="articleid" value="<?php echo $id; ?>"/>
            <div id="title"> <?php     echo  $fc[0][0];?></div>
            <div id="posttitle"><?php echo "By ".$fc[0][2]." the ".$fc[0][3] ?></div>
                <div id="body" contenteditable="true"> <?php     echo  $fc[0][1];?></div>
                <?php
               
                $deckeyword=  explode("&", $fc[0]["keywords"]);
               ?>
                   
                   <div id="detailarticle">
                    
                <div style=" display:inline-block; width: 350px">    <b style="color: #993333">Keywords:</b> <?php 
                    
     $i=0;
                    foreach ($deckeyword as $value) {
     if($i!=0)
         echo ", ";
                        echo $value;
     $i++;
                        

     
} ?>
                   </div>    <b style="color: #993333">Status: </b><?php 
                   $conf= $fc[0]["confirmed"] ;
                   if($conf==1)
                       echo "Confirmed";
                   else if($conf==2)
                       echo "Featured";
                   ?>          


    <?php
echo "<br>";
?>
                  <span style="  width: 350px; display:inline-block">  <b style="color: #993333">Event Location: </b><?php echo country::GetCountry($fc[0]["eventlocation"])." ". country::GetCountryFlagbyKey($fc[0]["eventlocation"]) ?>
               </span>    <b style="color: #993333">Category: </b><?php echo $fc[0]["category"] ?>
                   </div> 
                   <?php
                    include 'userinteraction/getanalysis.php'; ?>
                
                    
                
                         <div class="clearfix"></div>
     <?php
        include 'userinteraction/comments.php'; ?>
        </div>  
      <script src="userinteraction/js/getanalysis.js"></script>
               <br><br><br>
 <div style="clear:both">et4g5g5t5tg5t</div>
    </body>       

</html>