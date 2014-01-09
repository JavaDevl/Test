
<div id="wrapbody">
	<?php
            if($fm==null){

       $db=$dbcach;
       $reg=$_GET['region'];                           
            
$fm=$db->fetchmyArray("select images, title, id, body from articles where  confirmed=2 order by pubdate desc limit 10");
    
phpFastCache::set("mainpage".$reg,$fm);
               
    }  
    $fsc=  new phpFastCache();
            $keyword_webpageup = md5("/PhpProject5/fcs/fcs.php+upper");
            $cache =new phpFastCache("files");
   $html = $cache->get($keyword_webpageup);
            
   if($html == null) { //to change to $html==null when finish work
        ob_start();
        ?>
	<div id="page-wrap">
											
	<div class="slider-wrap">
		<div id="main-photo-slider" class="csw">
			<div class="panelContainer">
					<?php for($i=0;$i<7;$i++){ ?>
                                 
                            <div class="panel" id="Panel<?php echo $i ?>">
					<div  class="wrapper">
                                            <a href="articleread.php?id=<?php echo $fm[$i][2] ?>"><img   style="width:483px;height:295px;" <?php echo $fm[$i][0] ?> />
                                            </a>
					</div><div class="photo-meta-data">
							<span class="credit" id="credit<?php echo $i?>"> </span >
							<span  ><?php echo $fm[$i][1] ?></span>
						</div>
				</div>	

<?php
                                        }
?>


			</div>
		</div>

		<a href="#1" style="margin-left: 2px; margin-top:-7px; position:absolute;  " class="cross-link first-cross-link "><img <?php echo $fm[0][0] ?>  class="nav-thumb" alt="temp-thumb" /></a>
		<div id="movers-row">
			<div><a href="#2" class="cross-link"><img <?php echo $fm[1][0] ?> class="nav-thumb" alt="temp-thumb" /></a></div>
			<div><a href="#3" class="cross-link"><img <?php echo $fm[2][0] ?>  class="nav-thumb" alt="temp-thumb" /></a></div>
			<div><a href="#4" class="cross-link"><img <?php echo $fm[3][0] ?> class="nav-thumb" alt="temp-thumb" /></a></div>
			<div><a href="#5" class="cross-link"><img <?php echo $fm[4][0] ?> class="nav-thumb"  alt="temp-thumb" /></a></div>
			<div><a href="#6" class="cross-link"><img <?php echo $fm[5][0] ?> s class="nav-thumb" alt="temp-thumb" /></a></div>
			<div><a href="#7" class="cross-link"><img <?php echo $fm[6][0] ?>   class="nav-thumb" alt="temp-thumb" /></a></div>
		</div>

	</div>
	</div>
<?php
 $html = ob_get_contents();
        // Save to Cache 30 minutes
     // $cache->set($keyword_webpageup,$html, 1800);
    }   
$cache->set($keyword_webpageup,$html, -5);
  // echo $html;
?>
</div>

