<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
 <script type="text/javascript" src="js/jquery2-0.js"/>
 
    </head>
    <body>
        <script>
 jQuery(function($){
$("#ticker").tweet({
join_text: "auto",
username: "ITlaquepaque",
retweets: true,
count: 10,
loading_text: "buscando tweets ..."
})
});

$(document).ready(function() {
var ul = $(this).find(".tweet_list");
var ticker = function() {
setTimeout(function() {
ul.find('li:first').animate( {marginTop: '-8em'}, 500, function() {
$(this).detach().appendTo(ul).removeAttr('style');
});
ticker();
}, 8000);
};
ticker();
});
   </script>
    </body>
</html>
