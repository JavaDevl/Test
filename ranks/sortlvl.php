<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SortLvl
 *
 * @author Yasha
 */
class SortLvl {
function __construct() {
   
}

public function sortrank($rank)
{
    switch($rank)
    {
 case 0: return "member"; break;     
 case 1: return "Moderator"; break;         
 case 2: return "Advanced Moderator"; break;         
 case 3: return "Administrator"; break;         
 case 4: return "Super Administrator"; break;  
 default: return "invalid member"; break;
    }
}
 
public function Loadllevelfile($filetxt, $score)
{
  $cntr=array();
   $file=fopen($filetxt,"r") or exit("Unable to open file!");
   
   while(!feof($file))
  {
                   $m=fgets($file);
          $divideval=  explode(":", $m);
          $range= explode("-",$divideval[3] );
          
          if($score>=$range[0] && $score<=$range[1])
          {
          
              $cntr=[$divideval[1],$divideval[2],$range[0],$range[1]];
              return $cntr;
              break;
                    }
             
  }
fclose($file);
return $cntr;   
}


function sortmemberlevel($score)
{
    if($score<25)
    {
        return "Limited Member";
    }
    else if($score>=25 && $score<50)
    {
        return "Member";
    }
     else if($score>=50 && $score<100)
    {
        return "Advanced Member";
    }
         else if($score>100)
    {
        return "Super Member";
    }
}
}
?>
