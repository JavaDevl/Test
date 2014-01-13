         <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <link href="userinteraction/css/comments.css" rel='stylesheet' />
        <script>
//            $("#body").blur(function(event){
//                alert(1);
//                
//                alert(event.body.getData());
//                
//                $.ajax(
//                 {
//                     type: "POST",
//       url: "admin/updatedb.php",
//       data: { page:$(this).val() ,id:26  },
//       success: function(msg){
//      
//
//    }
//                 }   
//                )
//                
//            })    
    </script>
  <script src="userinteraction/js/comments.js"> 

</script>         
        <?php

        $db=$dbcach;
$myquer=$db->query("select comment_content, feedbacksum, date_added, username from comments where article_id=$id");
    
echo "<div id='writingfeedbacks'>";
    echo "<div id='buttons'><a href='javascript:void(0)'><div id='viewcomments'><span>View Comments ( $db->numrows )</span>
        </div></a>";
      if (!is_null($username)){
    echo "<a href='javascript:void(0)'><div id='comment'/><span  >Add Comment </span></div></a>";    
        if ($userlevel>=0){
        echo "<a href='javascript:void(0)'><div id='analysis'/><span>Add Analysis </span>";
        }
        echo "</div>
            </a></div>";
    }
    else{
        echo "</div>";
    }
    echo "<div  id='inputcomment'><span>Not more than 500 Characters</span><br><textarea name='mmm'></textarea><br>
            <span id='charleft' >500 Characters</span><input id='addcoment' type='button' value='Add comment'/></div>
<div id='inputanalysis'><span style='background-color:#ccc; padding:4px;' > Not Less than 300 Characters </span>
<textarea  id='editor' name='mmm'></textarea>
<input id='addanalysis' type='button' value='Add Analysis'/>        
</div>
     <div id='cleardiv'></div>
               <div  id='allcomments'>
                </div>
</div>";
        ?>
<script>
        CKEDITOR.replace('editor');
    </script>
     <script src="userinteraction/js/comments2.js"></script>   
        
 
