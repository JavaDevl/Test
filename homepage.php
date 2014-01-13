<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>

    <head>
                <?php include 'alertify.js0/alertlibrary.html'?>
            <link rel="shortcut icon" href="menubar/logopicture.jpg" type="image/jpg">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
	<link rel="stylesheet" type="text/css" href="fcs/style.css" />

<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="fcs/js/jquery-easing-compatibility.1.2.pack.js"></script> 
	<script type="text/javascript" src="fcs/js/coda-slider.1.1.1.pack.js"></script> 
	<script type="text/javascript" src="fcs/js/jquery-easing-1.3.pack.js"></script> 
	<script type="text/javascript" src="fcs/js/ycodaslider-2.0.pack.js"></script> 
	<!--compressed jquery jquery.easing and other file into one file cfile.js-->
	<script type="text/javascript" src="fcs/js/cfile2.js"> </script>
        <title></title>
        <?php 
        
        session_start();
      $region=$_GET['region'];
//        if(!$region )
//        {     
//            $region="bn&topstories";
//        $_GET['region']="bn&topstories";
//        
//        }
//        
        ?>
        
  <LINK href="css/home.css" rel="stylesheet" type="text/css">
  
  <style>
      body
      {
          background-color: #eee;
          
      }
      #mainpage
      {
          display:inline-block;
          margin-top:30px;
          margin-bottom:30px;
          padding:15px;
          border-radius: 10px;
          border:solid 5px #993333;
          background-color: #fff;
          width:700px;
         
          margin-left: 100px;
      }
      .articles
      {
          color: #333 !important;
                     text-decoration: none;

          
      }
      .articles div:hover
      {
          background-color: #999999 !important;
      }
      .homepagebody{
           padding-bottom:10px; padding-top:10px; border-top:dashed 1px #ccc; width:550px;
      }
      .homepagebody img
      {
          width:60px; height:40px; float:left; border:0 !important; padding:5px;
      }
      .clear
      {
          clear:both;
      }

      .twitter-timeline
      {
          display:inline-block;
          position:absolute;
          width:295px;
          margin-left: 15px;
          margin-top: 250px;
      }
  </style>
    </head>

  
    <body >
         <?php 
         
         include 'menubar/index.php';?>   

        <?php 
            if($_GET['successfullychanged']==1)
        {
           echo "<script>  Alertify.log.success('Password successfully changed!') </script>";
         }   ?>
                <div style="float:left; min-width:1150px">

                     <div style="text-align:left ; border:solid 2px #3B5998; float:right; display:inline-block; margin-top: 30px;">
                         <span style="background-color:#3B5998; padding:3px 0px 3px 5px;font-size: 15px;display:block; font-family: 'Tahoma'; color:#fff">Like us on Facebook </span><br>
                         <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FNewsonFire&amp;width=292&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:auto;" allowTransparency="true"></iframe></iframe></iframe> 

 <?php //include_once 'fileloading/retreivedata.php';

       
//        $time_start2 = microtime(true);
//        $rd=new dataretrieval($region,5);
//                $time_end2 = microtime(true);
//
//        $time2 = $time_end2 - $time_start2;

//echo 'Script for executing dataretrieval function took '.$time2.' seconds to execute';
//     echo $rd->Retrievedatahome(5);
//        $time_end1 = microtime(true);
////Subtract the two times to get seconds
//$time1 = $time_end1 - $time_start1;
//
//echo 'Script took '.$time1.' seconds to execute';
        ?>
        
        </div>
         <div id="mainpage" >
 <?php 
 
 include 'fcs/fcs.php';
 ?> 
        <?php
            $keyword_webpagemiddle = md5($_SERVER['HTTP_HOST']."/PhpProject5/fcs/fcs.php+middle");
            $cache =new phpFastCache("files");
   $html = $cache->get($keyword_webpagemiddle);
   
   
            
   if($html == null) {
        ob_start();
        /*
            ALL OF YOUR CODE GO HERE
            RENDER YOUR PAGE, DB QUERY, WHATEVER
        */

        // GET HTML WEBPAGE
     
   
           echo "<div style='margin-left:75px'>";
 for ($i=7;$i<10;$i++)
 {
   $m1=  preg_replace("/\<img (.*?) \/>|<.+?>/", "" , $fm[$i][3]);
         $m2= implode(' ', array_slice(explode(' ', $m1), 0, 30));
    
        echo "<a class='articles' href='articleread.php?id=".$fm[$i][2]."' title='Click to Read more!'>
           
<div class='homepagebody'><img  ".$fm[$i][0]."/> 
<h4 style='margin-top:-1px;'>".$fm[$i][1]."</h4><p>".$m2." ... Read more.</p>       
    <div class='clear '></div>
</div></a>";
 }
 echo "</div>";
 
    $html = ob_get_contents();
        // Save to Cache 30 minutes
      $cache->set($keyword_webpagemiddle,$html, 1800);
    }
    else{
   echo $html;
    
    }
?>                          



         </div> <a class="twitter-timeline" style="visibility: hidden;" href="https://twitter.com/Sciencegreat" data-widget-id="420631146121023488">Tweets by @Sciencegreat</a>
         <div style="display:inline-block;float:right; margin-top: 600px;"><?php include 'fcs/topfcs.php';?></div>
              </div>
             <?php include 'menubar/footer.php';?>                                   
    <script>
        $(document).ready(function(){
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);
}}(document,"script","twitter-wjs");

$(".twitter-timeline").delay(1000).show(0);
        });
        
        

</script>
<script src="js/storage.js"></script>           
    </body>
    
</html>