        
                   $(document).ready(function ()
               {      
                $("#unfeature, #reject").click(function(){
                  var  myval= $(this).val();
                      $.ajax({
                          
                          type:"POST",
                          url:"userinteraction/admininteraction.php",
                         data: { id:$("#articleid").val(), command:myval },
                                            
                   success: function(msg){
                       
                      if(myval.slice(-1)=="e")
                          myval=myval.slice(0, -1);
                   
      Alertify.log.success("Successfully "+myval+"ed !");
    },
    error: function (msg)
    {
              Alertify.log.error("Coulnd't "+myval+" this item");

    }             })
          });
                   
                   

                   $(".voteupimg").each(function(){
                       var voteups=$(this).prev().html();
var holder=$(this).prev();
                      $(this).click(function(){
                        
              $(this).css({"opacity":"1"}) 
        $.ajax({
        
        
       type: "POST",
       url: "userinteraction/commentdb.php",
       data: { commentid:$(this).next().val() , command: "voteups" },
       success: function(msg){
      Alertify.log.success("Successfully voted !");
$(holder).html(parseInt(voteups, 10)+1);
    },
    error: function (msg)
    {
              Alertify.log.error("You already voted for this analysis!");
    }
     });
      } );    })

      }  );    