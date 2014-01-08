<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <style>
             .editareatt:focus
            {
                float:left; background:#fff; display:inline-block; width:580px;
                    
            }
        </style>
      
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <?php                 session_start();
?>
        <script src="userinteraction/js/getcomments.js">

    </script>
        <link href="userinteraction/css/getcomments.css" rel="stylesheet"/>
        <script>
            
            content="";
                        function setvalue(val) 
            {
                
            
content=$(val).html();
}
    function updatecomm(m,a)
{
    var val=$(m).html();
        if(content==val)
return false;
    var val2=val.replace(/ *\<[^)]*\>|\s|&nbsp; */g, "")
    if (val2.length<3)
       { Alertify.log.error("Error Comment at least 3 characters!");
return false;
}
    $.ajax({
        type:"POST",
        url:"userinteraction/commentdb.php",
        data:{commentid:a, content:val,command:"updatecomment" },
        success:function(msg)
        {
            Alertify.log.success("Comment successfully updated !");
        }
    })
}
    </script>
    </head>
    <body>
        <?php

       $username=$_SESSION['username'];
          
        function ago($dt)
        {
            $times=strtotime($dt);
                    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
   $lengths = array("60","60","24","7","4.35","12","10");
 $now = time();
       $difference=$now-$times+3600;
if($difference<0)return 0;
   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
   }
   $difference = round($difference);
   if($difference != 1) {
       $periods[$j].= "s";
   }
 return "$difference $periods[$j] ago ";
        }
        include 'commentdb.php';
               $rec_limit=5;

        if( isset($_GET{'page'} ) )
{
   $page = $_GET{'page'} ;
   $offset = $rec_limit * $page ;
}
else
{
   $page = 0;
   $offset = 0;
}
include '../countrylist.php';
                $db=new DbConnector();

       $db->query("select  comment_id from comments where article_id =$id");
$recount=$db->numrows;
    

        $sql = "select comment_content, comments.username, date_added, comment_id, feedbacksum, reply, avatar, country, level, score from comments, users  where users.username=comments.username and article_id =$id  order by date_added desc LIMIT $offset, $rec_limit";
       $sql1= "
SELECT c.comment_id,  r.comment_id as reply, c.date_added,r.date_added,u.username, v.username
FROM comments c
JOIN users u ON c.username = u.username
LEFT JOIN comments r ON c.comment_id = r.reply
LEFT JOIN users v ON r.username = v.username
where 
 c.comment_id not in (select comment_id from comments where reply is not null and r.comment_id is null) 
 order by c.comment_id desc, reply desc

";
        $fm=$db->fetchmyArray($sql);
        if($db->numrows==0)
            echo "<div style='text-align:center; font-size:20px; font-weight:bold; margin:auto;'>No Comments</div>";
        else{
       ?> <?php
       include '../ranks/sortlvl.php';
$strt=new SortLvl();
            for($i=0;$i<$db->numrows;$i++)
        { if($i==0){  ?>    
       
<div class="commentiter" style='padding-top: 5px; '>
   <?php }else{?>
<div class="commentiter" style='margin-top:15px; border-top: solid 2px #993333; padding-top: 5px '>
    <?php }?>
    <img <?php if($fm[$i][6]){?>style="border:2px solid #333;width:102px; height:105px; float:left; padding:2px; margin-left: 0px;margin-right: 5px; margin-bottom: 5px; opacity:1" 
                 src="data:image/png;base64,<?php echo base64_encode($fm[$i][6]) ?>"
                 <?php } else{?> style="width:105px; height:105px; float:left; padding:5px; opacity:0.3" 
                 src="menubar/logopicture.jpg"                 <?php } ?>
                 />
<b style='color:#993333;  display: block;'> 
    <?php echo $fm[$i][1] ?><span style="margin-left:15px"></span><?php echo country::GetCountryFlagbyKey($fm[$i][7]) ?> 
    
    ( <font style='color:#999; font-weight:normal;'> <?php echo "<b>".number_format($fm[$i][9])."</b>" ?> </font> )

  
</b>
      <?php $rank= $strt->Loadllevelfile("../ranks/rank.txt",(int)$fm[$i][9]);
           if((int)$fm[$i][9]>=7500 && (int)$fm[$i][9]<100000)
      echo "<img style='   margin-right:20px; margin-top:-20px; height:30px; float:right;' src='ranks/icons/".strtolower($rank[0]).".png' title='$rank[1]' />";
else
               
      echo "<img style='width:40px;   margin-right:20px; margin-top:-26px; height:50px; float:right;' src='ranks/icons/".strtolower($rank[0]).".png' title='$rank[1]' />";
            ?>
    
    
    <i style='color:#999 ; display: block;'><?php echo "Posted ".ago($fm[$i][2]) ?></i>
  <hr>
  <div class="editareatt" <?php if(strtolower($username)==strtolower($fm[$i][1]))
  { 
      echo 'contenteditable="true" onfocus=setvalue(this) onblur=updatecomm(this,'.$fm[$i][3].')';  } ?>
       >
  <?php echo $fm[$i][0] ?></div> 


   
    
<br>
  <div style="clear:both">
  <div <?php if (is_null($username) ) {echo "style='display:none'";}?>>
  <img style=" border-top: solid 2px #993333; border-right: solid 2px #993333; " src='userinteraction/icons/feedback.gif'/>
  <div style="position:absolute; margin-top: -30px; margin-left: 120px;">  

      <a class='replyanchor' href='javascript:showreply()'>Reply</a> <span style="margin-left:20px;">|</span> 
            <input type="hidden" class="commentid" value="<?php echo $fm[$i][3] ?>"/>    

      <div class="thumbs">
           <a class='athumbsup' href='javascript:thumbs("thumbsup")'>
          <img class='thumbsup'  src='userinteraction/icons/thumbsup.png' /></a>
      <div id='<?php echo $fm[$i][3] ?>' style="
           <?php $fs= $fm[$i][4];
           if($fs>0)
           {echo "color:green";}   else if($fs==0)
                                       {echo "color:#999";}  else
                                                             {echo "color:red";}
           ?>
           "class="feedbackscore"><?php echo $fs ?></div>
      <a class='athumbsdown' href='javascript:void(0)'><img class='thumbsdown' src='userinteraction/icons/thumbsdown.png' /></a>
      <span style=" position:absolute; margin-top:-21px; margin-left:225px;">|</span>
      <a style="margin-left:255px; position:absolute;margin-top:-21px; color:red; font-weight:bold; padding:1px; border:solid 1px red;" class='reportanchor' href='javascript:void(0)'>Report</a>   <a href="javascript:void(0)" title="delete" class="deleteanchor" style=" text-decoration: none; border:dashed 1px #993333; color:#993333; float:right;margin-top: -25px; margin-left:500px; padding:5px;">Delete</a>
      <input type="hidden" class="userclass" value="<?php echo $fm[$i][1] ?>" />
      </div></div>

  <div class="locator" style="clear: both ; margin-bottom: -15px"></div>
    </div></div>
</div></div>


       <?php } ?>
       
       <div id='paging' style='margin-top:20px; border-top:solid 1px;  border-bottom:solid 1px; padding:5px;  text-align:center'> 
          
       <?php for($i=0; $i<ceil($recount/$rec_limit);$i++)
       {
           ?><a href='javascript://' onclick='gotopage("<?php echo $i ?>")' id="page<?php echo $i ?>" 
              style='margin-left:10px; color:black; text-decoration:none; margin-right:10px; font-weight:bold;'>
                  <?php echo ($i+1) ?>
           </a>
      <?php }?>
    
      </div> 
       <?php
       }
       ?>

    </body>
</html>
