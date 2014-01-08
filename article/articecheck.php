<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
include '../db/dbConnector.php';
include '../countrylist.php';
       function stringtoarray($tags)
       {
          $tags= $tags.preg_replace("/\,\s/*", $tags, "&");
           $arr=explode(",", $tags);
           return $arr;
       }
        
        $location=$_POST['location'];
        $category=$_POST['Category'];
        $tags=$_POST['tags'];
        $keywords=$_POST['keyword'];
        $embed=$_POST['embedvideos'];
        $title= addslashes($_POST['title']);
        $description=$_POST['description'];
        $youtube=$_POST['youtube'];
        $word=$_POST['word'];
       
        $keyword=implode("&",explode(",", $keywords));
        
        echo "preg_match: ". preg_match_all( "/\<img (.*?) \/>/", $description, $matches)."<br>";
       $lat=array();
       foreach($matches[1] as $value)
       {
           echo $value."<br>";
          $m= preg_replace("/class.+?\s|style.+?\"$/", "", $value);
          echo $m."<br>"; 
          array_push($lat, $m);
       }
         $imp= implode($lat, "&");       
        
        echo "Embed: ".$imp."<br>";
        echo "tags:". print_r(stringtoarray($tags))."<br>";
        $key = array_search($location, country::$countrylist);
                echo "location: ".$location."<br>";

        echo "Category:".$category."<br>";
        echo "title: ".$title."<br>";
        echo "word: ".$word."<br>";
        echo "keyword: ".$keywords."<br>";
        echo "body: ".$description;
$db=new DbConnector();
$sss=$db->fetchmyArray("Select words, score from users where username='yehiaawad'");
print_r($sss);
$ffr=$db->query("insert into articles(title, body, writer, pubdate, eventlocation, category, images, videoembed, keywords, words) values('".$title."','".$description."', 'yehiaawad',now(),'".$location."','".$category."', '".$imp."', '".$embed."', '".$keyword."', $word)");
  echo $ffr;



?>
    </body>
</html>
