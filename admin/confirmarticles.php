<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
                  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
          <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="../ckeditor/ckeditor.js"></script>
        <script src="js/confirmarticles.js"></script>
            <link href="css/confirmarticles.css" rel="stylesheet" />

    </head>
    <body>
        <?php session_start();
        include '../countrylist.php';
include '../menubar/index.php';
        
        $db=new DbConnector();
$fm=$db->fetchmyArray("select title, body, pubdate, writer, eventlocation,images,id category from articles where confirmed=0");
?>
        <div id="articleregistrationwhole">
        <?php 
        if(!is_array($fm))
       echo "<h2> No new articles </h2>";
        else   
        foreach ($fm as $value)
        {
        echo "
            <div class='divider'>"; 
        
                        echo "            <input type='hidden' id='idval' value='$value[6]'/>
<span class='datespanner'>Date Published: ".$value[2]."</span>  By: <b id='writer'>".$value[3]."</b><br>";
        echo "<img class='thumb' href='.' ".$value[5]."/> ";  
  echo "<a class='locationanchor' href='#'><span class='locationspanner'>Location: ".  country::$countrylist[$value[4]]."</span></a><div class='cntr' style='display:none;'><input type='textfield'  id='tags' value='".country::$countrylist[$value[4]]."' /></div><br>" ;
        echo "<span class='titlespanner' contenteditable='true'>".$value[0]."  </span> ";
        echo "<a style='display:none' class='updatetitle' href='#'>update</a>";
        echo "<div id='buttonarticle'><input type='button' class='confirm' value='Confirm' name='confirm' /><input type='button' class='feature' value='Feature' name='feature' /><input type='button' value='Reject' class='reject' name='reject' />";
            echo "</div></div>
              <a href='#?id=$value[6]'> <div class='viewbody'> View body </div></a>
                <div class='editbody' id='editor$value[6]' contenteditable='true'>$value[1] <br></div>";
        }
        ?></div>
       
<script>
    // Turn off automatic editor creation first.
    CKEDITOR.disableAutoInline = true;
</script>

    </body>
</html>
