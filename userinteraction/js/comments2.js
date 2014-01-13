            $("#addanalysis").click( function (){
            
                var articleid=$("#articleid").val();
                var anal=CKEDITOR.instances.editor.getData();
alert($("#wordcounters").val())
alert($("#charcounters").val())
           $.ajax({
                      type: "POST",
                     data:{ content: anal , id: articleid, command:'insertanalysis'  },
                         url:"userinteraction/commentdb.php",
                         success:function (msg)
                         {
                             location.reload();
Alertify.log.success("Analysis successfully submitted");                         }
                   ,
                   error:function(msg)
                   {
                Alertify.error.success("Error submitting analysis!");                         }
       
                   }
               )}
            
    );
   
          CKEDITOR.disableAutoInline = true;
    CKEDITOR.inline( 'body',
{
         on: {
        blur: function( event ) {
            var data = event.editor.getData();
   var id=$("#articleid").val();

     $.ajax({
       type: "POST",
       url: "admin/updatedb.php",
       data: { body: data , id: id },
       success: function(msg){
         alert( "Data Saved !!!!" );
         //Anything you want
         location.reload();
       }
     });        }
    }
});


