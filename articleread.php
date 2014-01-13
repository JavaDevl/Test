<!DOCTYPE html>

<?php
        $id=$_GET['id'];

if(is_null($id))
     header( 'Location: http://localhost/PhpProject5/homepage.php' ) ;
else
session_start(); ?>
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

          <?php include 'menubar/index.php';
                  $userlevel=$_SESSION['user_level']
           +3;
?> 
           <div id="wholepage">

             <?php
             if($userlevel>5){
             ?>
               <div  id="adminfeature"> 
                   <input type="button" id="unfeature" value="Unfeature"/> 
                   <input type="button" id="reject" value="Reject"/> </div>

               
        <?php
             }
        include "countrylist.php";

        $db=$dbcach;
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
            
            
                 <?php
                if($userlevel>5)
                    echo '<div id="body"  contenteditable="true">';
                else
                    echo '<div>';
                echo  $fc[0][1]."</div>"; 
               
                $deckeyword=  explode("&", $fc[0]["keywords"]);
               ?>
                   <div class="clearfix"></div>
                   <div id="detailarticle">
                    
                <div class="detailinsider" >    <b>Keywords:</b> <?php 
                    
     $i=0;
                    foreach ($deckeyword as $value) {
     if($i!=0)
         echo ", ";
        echo $value;
     $i++;
} ?>
                   </div>    <b>Status: </b><?php 
                   $conf= $fc[0]["confirmed"] ;
                   if($conf==1)
                       echo "Confirmed";
                   else if($conf==2)
                       echo "Featured";
                   ?>

                   <br>
                  <div class="detailinsider">  <b>Event Location: </b><?php echo  country::GetCountryFlagbyKey($fc[0]["eventlocation"]) ?>
               </div > <b >Category: </b><?php echo $fc[0]["category"] ?><br>
               <div class="detailinsider">  <b >Date: </b>   <?php echo $fc[0][3]; ?>
               </div >  <b>Poster: </b><?php echo $fc[0][2] ?>
                   </div> 
                   <?php
                    include 'userinteraction/getanalysis.php'; ?>
                         <div class="clearfix"></div>
     <?php
        include 'userinteraction/comments.php'; ?>
        </div>
      <script src="userinteraction/js/getanalysis.js"></script>
           <?php include 'menubar/footer.php';?>
    </body>
</html>
