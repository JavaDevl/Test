<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
      
        <LINK href="css/css.css" rel="stylesheet" type="text/css">
      
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
            <link rel="stylesheet" type="text/css" href="../../messagebox/css/wowwindow.css">
    <script type="text/javascript" src="../../messagebox/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../messagebox/js/jquery.wowwindow.min.js"></script>

    <script>
         $(document).ready(function() {
            $('#postfather a').wowwindow({
                draggable: true
            })});
    </script>
    </head>
    <body>
        
        <?php
        
        
       //****************line 66 and 75 Change the  month 7 to another value that can be computed /////////////
        
        
        
        include_once 'fileloading/fileloader.php';
        include_once 'countrylist.php';
        include_once 'db/dbConnector.php';
        include_once 'tools/img.php';

        
       function timezoneconverter($tzc)
        {
            $tzc=  substr($tzc,0, -2);
            return $tzc*60*60;
        }
        
        
        
        
        function timeregulator($timezone)
        {
            switch ($timezone) {
                case "GMT": return 0;    break;
                case "EDT": return +4*60*60;    break;
                case "EST": return +5*60*60;    break;
                case "PDT": return +7*60*60;    break;
                
                default: return timezoneconverter($timezone);
                    break;
            }}

            
            
       function converttosecondsunix($time)
        {
             $datearr=explode(" ", $time);
            $timearr=explode(":",$datearr[4]);
            date_default_timezone_set("GMT");
            $times= mktime($timearr[0],$timearr[1],$timearr[2], 7,$datearr[1],$datearr[3]);
            return $times+timeregulator($datearr[5]);  }
        
function ago($time)
        {
            $datearr=explode(" ", $time);
            $timearr=explode(":",$datearr[4]);
            date_default_timezone_set("GMT");
            $date = date('m/d/Y h:i:s a', time());
           $times= mktime($timearr[0],$timearr[1],$timearr[2], 7,$datearr[1],$datearr[3]);
        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
   $lengths = array("60","60","24","7","4.35","12","10");
   $now = time();
   
       $tense         = "ago";

       $difference=$now-$times-timeregulator($datearr[5]);
       if($difference<0)return 0;
       
   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
   }

   $difference = round($difference);
   if($difference != 1) {
       $periods[$j].= "s";
   }
   return "$difference $periods[$j] ago ";

        }
   
        
 function aasort (&$array, $key) {
    $sorter=array();
    $ret=array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii]=$va[$key];
    }
    arsort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii]=$array[$ii];
    }
    $array=$ret;
}

        
        function Retrievedataarray($url)
        {
            $rss = new DOMDocument();
$feed = array();
foreach ($url as $value) {
    
    $rss->load($value[2]) or die(error_log(" couldn't load the URL ".$url."\n", 3, "error/Error.log"));
   $m=0;
    foreach ($rss->getElementsByTagName('item') as $node) {
	$item = array ( 
		'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
		'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
		'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
		'dateencoded' => converttosecondsunix($node->getElementsByTagName('pubDate')->item(0)->nodeValue),
		'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
		'srcname' => $value[0],
                'srcurl' => $value[4],
                'srcimg'=>$value[3]
            
		);

	array_push($feed, $item);
        
       $m++;
       if($m==20)break;
}

}
      aasort($feed,"dateencoded");
return $feed;
}
        
        
        
    function Retrievedata($feed, $limit){
                            $obj=new Fileloader("PhpLib/newfile.txt");     
$m=0;
           $date = date('m/d/Y h:i:s a', time());
$imgobj = new img();

$post= '<div id="postfather" >';

$i=0;
foreach ($feed as $x => $value) {
                        $countries=  country::$countrylist;

	$title =  $feed[$x]['title'];
	$link = $feed[$x]['link'];
	$dateenc = $feed[$x]['dateencoded'];
        $srcname= $feed[$x]['srcname'];
        $srcurl= $feed[$x]['srcurl'];
        $srcimg= $feed[$x]['srcimg'];
              $regexp='/\<a href.+/';
              $regexp1='/<(.*?)>/';
              	$date = $feed[$x]['date'];

              $ago=ago($date);
if($ago==0)continue;
              $descr = $feed[$x]['desc'];
                      $description= preg_replace($regexp, " ", $descr);
                      $description= preg_replace($regexp1, " ", $description);

        $srch=  $obj->searchString($title." ".$description);

        


        
        
	$post.='            <a href="#idstat'.$x.'" title="'.$title.'">

<div class="post" id="id'.$x.'">
    

            <div class="title"><strong>
            
                '.$title.'  ';
        $keyexist=false;
                    foreach ($srch as $key=>$value) {
                    if($keyexist) $post.=" | ";
            $post.='<img title="'.$countries[$key].'" src="'.$value.'"/>';
            
          $keyexist=true;
        }

$post.='</strong>'. '<br>
                    <small><em>Posted 
                    '.$ago;
  
        $post.='</em></small> </div></div></a>

<div style="display:none;">
                <div id="idstat'.$x.'">
                    <div style="max-height:400px; overflow:auto;" class="window-inner">
<div class="title"><strong> ';

        $keyexist=false;
                    foreach ($srch as $key=>$value) {
                                if($keyexist) $post.=" | ";

            $post.='<img title="'.$countries[$key].'" src="'.$value.'"/>';
            
            $keyexist=true;
          
        }
$post.='</strong>'. '
                    <small><em>Posted 
                    '.$ago;
        $post.='</em></small></div><hr><p class="description">
                '.$description.'<a target="_Blank" style="margin-left:15px;" href="'.$link.'">Read more... @ </a></p> 
    </div></div></div>';

       $m++;
       if ($m==$limit) break;
}

//$post.= $m ."times</div>";

return $post;


        }
        
       $db=new DbConnector();
       
//$time_start4 = microtime(true);

       $myfetch=$db->fetchmyArray("select newsdetails.name,country,url_RSS,url from newsdetails, newsreference  where region='topstories'and newsdetails.name=newsreference.name order by statistics desc;");
//$time_end4 = microtime(true);
//Subtract the two times to get seconds
//$time4 = $time_end4 - $time_start4;
//echo 'Script 1 took '.$time4.' seconds to execute<br>';



//       $time_start3 = microtime(true);

     $retreiveddata= Retrievedataarray($myfetch);
//$time_end3 = microtime(true);
////Subtract the two times to get seconds
//$time3 = $time_end3 - $time_start3;
//echo 'Script 2 took '.$time3.' seconds to execute<br>';
//       $time_start5 = microtime(true);

       echo Retrievedata($retreiveddata,20);
//       $time_end5 = microtime(true);
//Subtract the two times to get seconds
//$time5 = $time_end5 - $time_start5;
//echo 'Script 3 took '.$time5.' seconds to execute<br>';
?>

    </body>
</html>
