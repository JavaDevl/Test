            $.fn.scrollTo = function( target, options, callback ){
  if(typeof options == 'function' && arguments.length == 2){ callback = options; options = target; }
  var settings = $.extend({
    scrollTarget  : target,
    offsetTop     : 50,
    duration      : 500,
    easing        : 'swing'
  }, options);
  return this.each(function(){
    var scrollPane = $(this);
    var scrollTarget = (typeof settings.scrollTarget == "number") ? settings.scrollTarget : $(settings.scrollTarget);
    var scrollY = (typeof scrollTarget == "number") ? scrollTarget : scrollTarget.offset().top + scrollPane.scrollTop() - parseInt(settings.offsetTop);
    scrollPane.animate({scrollTop : scrollY }, parseInt(settings.duration), settings.easing, function(){
      if (typeof callback == 'function') { callback.call(this); }
    });
  });
}
$(document).ready(function() {

$.urlParam = function(name){
    var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
    return results[1] || 0;
}


$("#articleregistrationwhole .divider").each(function() {
var myid=$(this).children("#idval").val();
var writer=$(this).children("#writer").html();

var confbutton=$(this).children('#buttonarticle').children('.confirm');
        var featbutton=$(this).children('#buttonarticle').children('.feature');
        var rejbutton=$(this).children('#buttonarticle').children('.reject');

            confbutton.click(
            
    function()
{
    
    $.ajax({
        
       type: "GET",
       url: "updatedb.php",
       data: "buttons=approve&id="+myid+"&writer="+writer,
       success: function(msg){
         //Anything you want
         featbutton.hide();
         rejbutton.hide();
         confbutton.replaceWith("<span>Confirmed!</span>");
       }
     });
}    
    )
            featbutton.click(
    function()
{
    
    $.ajax({
        
       type: "GET",
       url: "updatedb.php",
       data: "buttons=feature&id="+myid+"&writer="+writer,
       success: function(msg){
         //Anything you want
         confbutton.hide();
         rejbutton.hide();
         featbutton.replaceWith("<span style='color:red'>Featured!</span>");
       }
     });
}    
    )
        
                 rejbutton.click(
    function()
{
    
    $.ajax({
        
       type: "GET",
       url: "updatedb.php",
       data:"buttons=reject&id="+myid+"&writer="+writer,
       success: function(msg){
         //Anything you want
         confbutton.hide();
         rejbutton.hide();
         featbutton.replaceWith("<span style='color:green'>Rejected!</span>");
       }
     });
}    
    )

$(this).children('.locationanchor').click(
function(){
               var myinput= $(this).next()
               
               myinput.show();
               $.getJSON(' ../test.php', function(data) {
                myinput.children("#tags").autocomplete({
                    source: data
                });
            });
            $('body').scrollTo($(this).parent());



            $(this).next().children("input").blur
               (
        function(){
            var a=$(this).val(); 
$.ajax({
       type: "GET",
       url: "updatedb.php",
       data: "country="+a+"&id="+myid,
       success: function(msg){
         alert( "Data Saved !!!!" );
         //Anything you want
         location.reload();
       }
     });  }    
        );
}
);


$(this).children('.titlespanner').blur(


function(){
var a=$(this).html();
var anc=$(this).next('a');
               anc.show();
              
            anc.click(
    function()
{   
       $.ajax({
       type: "GET",
       url: "updatedb.php",
       data: "title="+a+"&id="+myid,
       success: function(msg){
         alert( "Data Saved !!!!" );
         //Anything you want
         location.reload();
       }
     });
       
})}
);
     
$(this).next('a').click(
function(){

    var editbody=$(this).next(".editbody");

                      var myid=$(this).prev().children("#idval").val();

   $(this).next(".editbody").toggle();
   var id= editbody.attr('id');
   CKEDITOR.disableAutoInline = true;
   
    CKEDITOR.inline(id,  {
        customConfig : 'config_1.js',
        on: {
        blur: function( event ) {
            var data = event.editor.getData();
   

     $.ajax({
       type: "POST",
       url: "updatedb.php",
       data: { body: data , id: myid },
       success: function(msg){
         alert( "Data Saved !!!!" );
         //Anything you want
         location.reload();
       }
     });        }
    }
    });
//    editbody.blur(
//function()
//{
//     $.ajax({
//       type: "POST",
//       url: "updatedb.php",
//       data: "body="+editbody.html() ,
//       success: function(msg){
//         alert( "Data Saved !!!!" );
//         //Anything you want
//         location.reload();
//       }
//     });
//})

});

});



});