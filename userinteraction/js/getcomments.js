   
    
   $(document).ready(function(){
        
        var articleid=$("#articleid").val();
      
        
        
        $(".commentiter .thumbs").each(function() {
                var parthumb=$(this);
                var userclass=parthumb.children(".userclass").val();
              
                
                var childrenthumbdown=parthumb.children(".athumbsdown");
                var childrenthumbup=parthumb.children(".athumbsup");
                var feedbackscore=parthumb.children(".feedbackscore");
                var reportanchor=parthumb.children(".reportanchor");
                var feedbackscorevalue=feedbackscore.html();
                
                var commentid=$(this).prev().val();
                var replyanchor=$(this).prev().prev().prev();
                
                $(this).children(".deleteanchor").click(function(){
                    deletecomment(commentid);
                });
                
                
                reportanchor.click(function()
            {
                        $(this).replaceWith('<select onchange=reportcomplain(this,'+commentid+') \n\
        style="margin-left:255px; position:absolute;margin-top:-21px; padding:2px; font-size:15px;"> \n\
<option value="">Select:</option><option value="abuse">Abuse</option>\n\
<option value="spam">Spam</option>\n\
     </select>')
            });
                
                replyanchor.click(function(){
                    var cid=$("#replyid"+commentid).val();
                    if(!cid)
                $('<div style="position:relative; \n\
     margin-top:10px; margin-bottom:30px;" >\n\
<textarea style="width:587px; max-width:587px; margin-left:108px; min-width:587px; max-height:120px;"></textarea>\n\
<input type="button" id="replyid'+commentid+'" onclick="addreplycomment(this,'+commentid+')" style="float:right; border:inherit; background-color:#993333; color:white; margin-right:-1px; padding:2px; margin-top:-5px" value="Add Reply"/></div>')
                .appendTo($(this).closest(".commentiter")) });
                
                childrenthumbup.click(
        function(){
            $(this).unbind('click');
            
            $(this).children(".thumbsup").css({"opacity":"1"})
            childrenthumbup.click(function(){ return false})
         
         childrenthumbdown.css({"display":"none"})
         thumbs(articleid,commentid,"thumbsup",feedbackscore, feedbackscorevalue, parthumb, userclass);
        }    
        )
                            childrenthumbdown.click(
        function(){
            $(this).unbind('click');
            $(this).children(".thumbsdown").css({"opacity":"1"})
            childrenthumbup.css({"display":"none"})
            thumbs(articleid,commentid,"thumbsdown",feedbackscore, feedbackscorevalue, parthumb, userclass);
        }    
        )
        });
        
        function colorfeedback(number,elem)
        {
            if(number>0)
                {
                   elem.css({"color":"green"}); 
                }
               else if(number==0)
                {
                   elem.css({"color":"#999"}); 
                }
                else
                    {
                        elem.css({"color":"red"}); 
                    }
        }
        
           function thumbs(articleid, commentid, direction,f,fs,cu,uc){
               var currentuser=$("#usernameid").val();
              
               if(uc.toUpperCase()==currentuser.toUpperCase())
                   {
                       Alertify.log.error("You can't vote your own comment!");
                       return false;
                   }
              var artid= document.getElementById("articleid").value;
        $(this).css({"background-color":"#93b993",
                    "color":"#1b551b"
                        });

            $.ajax({
        
       type: "POST",
       url: "userinteraction/commentdb.php",
       data: { id: articleid, commentid:commentid, command:direction },
       success: function(){
           if(direction=='thumbsup')
        f.html(++fs);
    else if(direction=='thumbsdown'){
        f.html(--fs);
    }
    
    colorfeedback(fs,f) 
    Alertify.log.success("Sucssefully voted !");
},
    error: function()
    { 
        Alertify.log.error("You already voted on this comment !");
        }
     });
        
           };
    
 
}
    );
    function gotopage(a)
          {
                  $.ajax({
        
       type: "POST",
       url: "userinteraction/getcomments.php?page="+a,
       data: { paging:a, id:$("#articleid").val()},
       success: function(msg){
    $("#allcomments").show().html(msg);
    $("#page"+a).css({"color":"#993333",
                       "border-bottom":"solid 1px #993333",
                        "padding-left":"5px"});
    }
     });
          }
          function deletecomment(cid)
         {
             Alertify.dialog.labels.cancel = "No";
Alertify.dialog.labels.ok = "Yes, please";
Alertify.dialog.buttonFocus = "cancel";
 Alertify.dialog.confirm("Are you sure you \n want to delete this comment?", function () {

                             $.ajax({
        
       type: "POST",
       url: "userinteraction/commentdb.php",
       data: { command:"deletecomment", commentid:cid},
       success: function(msg){
   
Alertify.log.success("Comment Successfully deleted!");
  $("#viewcomments").trigger('click');
  },
error: function(msg)
{
   Alertify.log.error("Couldn't delete this comment!");
}
     });

}, function () {
return false;});        
     
 } 
          function reportcomplain(a, cid)
          {
           
          var myval= $(a).val();
           $(a).hide();
                             $.ajax({
        
       type: "POST",
       url: "userinteraction/commentdb.php",
       data: { content:myval, command:"report", commentid:cid},
       success: function(msg){
   
Alertify.log.success("Complaint reported!");  },
error: function(msg)
{
   Alertify.log.error("Complaint already submitted");
}
     });
          }
          
             function addreplycomment(a, cid)
          {
              
              var valuecontent=$(a).prev().val()
                  $.ajax({
        
       type: "POST",
       url: "userinteraction/commentdb.php",
       data: { content:valuecontent, id:$("#articleid").val(), command:"insertcommentreply", commentid:cid},
       success: function(msg){
    $("#allcomments").show().html(msg);
    $("#page"+a).css({"color":"#993333",
                       "border-bottom":"solid 1px #993333",
                        "padding-left":"5px"});
    }
     });
          }
          
         
