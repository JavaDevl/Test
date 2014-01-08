$(document).ready(function(){
 
    
       var anal=$("#analysis");
    var comm=$("#comment");
    var viewcomm=$("#viewcomments");
    var commspan=$("#comment span");
    var analspan=$("#analysis span");
    var inputcom=$("#inputcomment");
    var inputcomtextarea=$("#inputcomment textarea");
    var inputcomaddcoment=$("#inputcomment #addcoment");
    var userwriter=$("#userwriter").val();
    var articleid=$("#articleid").val();
    var inputanal=$("#inputanalysis");
    var allcomments=$("#allcomments #paging")
    allcomments.click(function(){alert("fuck yo")});
    
    
    
//    $('.editable_textarea').editable('http://www.example.com/save.php');
    

    
    
    
    allcomments.children("#paging a").each(function() {
        alert("1")
        $(this).click(function()
    {
        $.ajax({
        
       type: "GET",
       url: "userinteraction/getcomments.php",
       data: { page:$(this).html() ,id: articleid },
       success: function(msg){
       $("#allcomments").show().html(msg);

    }
     });
    })
    });
    
    viewcomm.click(function(){
      
        $(this).css({"background-color":"#93b993",
                    "color":"#1b551b"
                        });

            $.ajax({
        
       type: "POST",
       url: "userinteraction/getcomments.php",
       data: { id: articleid },
       success: function(msg){
           $("#allcomments").show().html(msg);
               $("#page0").css({"color":"#993333",
                       "border-bottom":"solid 1px #993333"
                        });
    }
     });
        
    });
    
    $("#commentsuccess a").click(function(){
         $("#commentsuccess").hide();
            });
    inputcomaddcoment.click(function(){
            var val=inputcomtextarea.val();
if(val.length<3)
{
    
    Alertify.log.error("Your comment should have at least 3 characters");
    return false;
}
    $.ajax({
        
       type: "POST",
       url: "userinteraction/commentdb.php",
       data: { content: val , id: articleid, command:'insertcomment' },
       success: function(msg){
           $(viewcomm).trigger('click');
           Alertify.log.success("Comment successfully added !", 3000);
inputcomtextarea.val("");
$("#inputcomment #charleft").html("500");
    }
     });
    });
    
    inputcomtextarea.keyup(function()
{
    var myval=$(this);
var    length=500-$(this).val().length;
if(length<50)
    $("#inputcomment #charleft").css({"color":"#cc9a9a"});
    else
            $("#inputcomment #charleft").css({"color":"#fff"});
if(length<0)
    myval.val(myval.val().slice(0, 500));
$("#inputcomment #charleft").html(length+" Characters");
});
  $("#comment").click(function(){
$("#wholepage").css({"border-bottom":"#ffffff"});
        comm.animate({width:'150px',opacity:'1'},"slow");

    anal.animate({width:'103px',opacity:'1'},"slow");
    commspan.css({ "background-color":"#e5cccc"});
           analspan.css({ "background-color":"#ffffff"});

    comm.css({"background":"url('userinteraction/icons/commenthover.png') no-repeat right",
         
                "background-color":"#e5cccc",               
                
                "color":"#993333",
              "background-size":"20px 20px",
          "background-position":"95% 50%"});
      anal.css({"background":"url('') no-repeat right",
      "color":"#ab9999"});
  $("#wholepage").css({"border":"solid 2px #993333"});

  inputanal.hide(200);

inputcom.show(0);

  });
    $("#analysis").click(function(){

    anal.animate({width:'140px',opacity:'1'},"slow");
    comm.animate({width:'115px',opacity:'1'},"slow");
     commspan.css({ "background-color":"#ffffff"});
        comm.css({"background":"url('') no-repeat right", "background-color":"#FFFFFF",
      "color":"#ab9999"});
       analspan.css({ "background-color":"#99cccc"});
inputcom.hide(200);
inputanal.show(0);

            anal.css({"background":"url('userinteraction/icons/analysis4.png') no-repeat right",
                "color":"#257272",
                "background-color":"#99cccc",
              "background-size":"20px 20px",
          "background-position":"95% 50%"});
      
  });
});