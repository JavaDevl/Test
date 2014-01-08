<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
                <script src="../../alertify.js0/dist/alertify.min.js"></script>
        <script src="../../alertify.js0/dist/alertify.js"></script>
        <link rel="stylesheet" href="../../alertify.js0/dist/themes/alertify.css" />
        <link rel="stylesheet" href="../../alertify.js0/dist/themes/alertify.bootstrap.css" />
        <link rel="stylesheet" href="../../alertify.js0/dist/themes/alertify.default.css" />
        <script src="parsley.js"></script>
          <?php
session_start();        
         
          ?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    <style>
        #z{
position:absolute;

}
        body
        {
            background-color:#eee;
        }
       #mainpage{
           background-color: #fff;
            margin-left: auto;
                margin-right:auto;
      margin-top:30px;
      border:solid 5px #993333;
      width:500px;
       border-radius: 10px;
       padding:10px;
       
       }
       #mainpage h3
        {
            padding:5px 5px 5px 5px;
            display:inline-block;
            position:absolute;
            background-color:#fff;
            border-radius: 10px;
          color:#993333; 
          border:solid 1px #993333;
          margin-top:-30px;
        }
        #mainpage label
        {
            padding-left:40px;
            margin-top: 5px;
            margin-left: auto;
            margin-right: auto;
            display:block;
        }
        #mainpage b
        {
            color:#993333;
            font-size: 18px;
        }
        #mainpage span
        {
            font-size:17px;
            margin-right: 10px;
            color:#993333;
            display:inline-block;
            float: left;
            width:50px;
        }
         #mainpage .clolumn2
        {
            display:inline-block;
            float: left;
        }
        #mainpage #title
        {
            width:350px;
        }
        #mainpage textarea
        {
            max-width:350px;
           min-width:350px;
            width:350px;
            max-height:100px;
        }
        #mainpage #sendbutton
        {
            margin-left: 98px;
            color:#993333;
            background-color: #eee;
        }
        #mainpage #sendbutton:hover
        {
            color:#eee;
            background-color: #993333;
            border:solid 1px #993333;
            border-radius: 3px;
        }
        #mainpage select
        {
            font-weight: bold;
            color:#993333;
            padding:2px;
            
        }
    </style>
    </head>
    
    <body>
        
        <?php 
          session_start();
          
        include "../../menubar/index.php";
        ?>
        
        <div id="mainpage">
            <h3>Contact Us</h3>
            <label style="margin-top:30px;">
                <span  class="column1">From:</span><b><?php echo $_SESSION['username']?></b><br>
            </label> 
                        <label>
                <span class="column1">Reason:</span><select id="reason" class="column2">
                    <option value="Support">Support</option >
                    <option value="Complaint">Complaint</option >
                    <option value="Feedback">Feedback</option >
                    <option value="Advertising">Advertising</option >
                    <option value="Press">Press</option >
                </select>
            </label> 
                        <label>
                <span class="column1">Title:</span><input id="title" name="title" type="input" />
            </label> 
                                    <label>
                <span class="column1">Text:</span><textarea id="text" name="text"  ></textarea>
            </label> 
            <input id="sendbutton" value="Send" type="button">
        </div>
        <img id="z" src="icons/ajax-loader.gif">
        <script>
          $("#z").hide();   
var showajaximage=function(elem)
{
         $(document).hover(function(){
    $(elem).show(); //Show tooltip
    }, function() {
        $(elem).hide(); //Hide tooltip
    })

$(document).mousemove(function(e){
    $(elem).css({left:e.pageX-(-30), top:e.pageY-(-30)});
});
}
 $(document).ajaxStart(function(){
     
     
   showajaximage("#z");
 
     $('body').css('cursor', 'wait');
     $("#z").show();
 })
 .ajaxStop(function() {
    $("#z").hide();
         $('body').css('cursor', 'auto');

});
 ;
           
        $("#sendbutton").click(function(){

            
            if(!$("#title").val() || !$("#text").val())
            {
                Alertify.dialog.alert("Please fill all your fields");
                return false;
            }
            $.ajax(
            {
                type:"post",
                url:"contactd.php",
                data:{title:$("#title").val(), text:$("#text").val(),reason:$("#reason").val()},
                success:function(msg)
                {
                    Alertify.log.success(msg, 4000)
                },
                error:function(msg)
                {
                                        Alertify.log.error("Error message sending!", 4000)
                                        
                                        

                }
                
            }
        )
        })
    </script>
        
      
    </body>
</html>
