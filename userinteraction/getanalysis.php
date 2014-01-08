<link href="userinteraction/css/getanalysis.css" rel="stylesheet" />
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author Yasha
 */
include "tools/timing.php";
$db =new DbConnector();
$fma=$db->fetchmyArray("select voteups, analysis_content, analysis.username, analysispost,
    country, words, commentpost,  avatar,  date_added, score, articlespost, analysis_id from analysis, users where article_id=$id
    and users.username=analysis.username order by voteups desc");

if($db->numrows!=0){
echo '<div id="analysisdiclvl1" > 
                <div id="analysisdiclvl2" >Analysis</div>';
for($j=0;$j<$db->numrows;$j++)
{echo "
 <a href='javascript:void(0)' class='mainanchor'><div style='border-top:dashed 1px #257272; color:#333; padding:10px'> 
<div class='voteupdiv'> ".$fma[$j][0]." </div> <img src='userinteraction/icons/arrowup.png' class='voteupimg' title='Vote up!' style='' /> <input type='hidden' value='".$fma[$j][11]."' class='analid'/>
<img class='avatar' src='menubar/logopicture.jpg'>
<div class='username'>".$fma[$j][2]." ". country::GetCountryFlagbyKey($fma[$j][4])."  ( <font style='color:black; font-weight:normal;'>".$fma[$j][9]." Points </font> ) 
    </div> 
   <div style='display:inline-block'> 
 <img src='userinteraction/icons/analysis4.png' style=' margin-left:15px; height:13px;' title='Analyses' /> ( ".$fma[$j][3]." )  
 <img src='userinteraction/icons/article.png' style=' margin-left:15px; height:13px;' title='Articles' /> ( ".$fma[$j][10]." )       
</div> 
   <i style='display:block; margin-top:8px;'> Posted ".ago($fma[$j][8])."</i>
    <hr><div class='contentanalysis'>".$fma[$j][1]." </div><div style='clear:both'>
     
</div>  </div>
</a>
";}echo "</div>";
}

?>

