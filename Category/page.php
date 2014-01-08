<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
      <?php 
      $cat=$_GET['category'];
      ?>
        <script>
            
            var usefulfct=(function(){
                var getcategory=function(){
                    var prmstr = window.location.search.substr(1);
var prmarr = prmstr.split ("&");

var prmarr1 = prmarr.split ("=");

                }
            }());
            
var prmstr = window.location.search.substr(1);
var prmarr = prmstr.split ("&");
var prmarr1 = prmarr.split ("=");

alert(prmarr1);
        </script>
          <LINK href="style/<?php echo $cat ?>.css" rel="stylesheet" type="text/css">

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
                include "../countrylist.php";

      include "../menubar/index.php";
        
        $sql="select title, body, writer, date(pubdate), eventlocation, category, images from articles where  confirmed>=1 order by pubdate desc limit 10";
     $db=new DbConnector();
    $fma= $db->fetchmyArray($sql);
    
    
        ?>
        <div class="container">
            
            <?php
            foreach($fma as $record){
       $m1=  preg_replace("/\<img (.*?) \/>|<.+?>/", "" , $record[1]);
         $m2= implode(' ', array_slice(explode(' ', $m1), 0, 50));
            ?>
            <div class="row main-row">
                <div class="col-lg-12">
           <div class="well container-well">
                    <div class="row secondary-row">
                    <div class="col-xs-2 ">
                         <img style=""<?php echo $record[6] ?> class="img-responsive"> 
                   </div>
                    
                        
                        <div class="col-xs-10">
                            
                    <div class="col-xs-8 title">
                        <?php echo $fma[0][0] ?>
                     </div>
                            <div class="col-xs-3 date ">
                        <?php echo $fma[0][3] ?>
                    </div>
                             <div class="col-xs-1 flag">
                     
                        <?php echo  country::GetCountryFlagbyKey($record["eventlocation"]) ?>
                     </div>
                          <div class="col-xs-12 description">
                   
                        <?php echo $m2 ?> <b><em> Read more...</em></b>
                    </div> 
                        </div>
                    </div>
           </div >
                </div>
            </div>
            <?php } ?>
         
                </div>
        
<?php
include "../menubar/footer.php";
?>
    </body>
   <l
</html>
