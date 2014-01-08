<?php

class Fileloader{ 
   //////////////////////////////////////////
    private $file;
    private $countryarr;
    
    
    
    function __construct($file) {

        
        $this->file=$file;
        $this->countryarr=$this->LoadFile();
    
    }
    
    
private function LoadFile()
{
  $cntr=array();
   $file=fopen($this->file,"r") or exit("Unable to open file!");
   while(!feof($file))
  {
                   $m=fgets($file);
          $divideval=  explode(":", $m);
             $cntr[$divideval[0]]=substr($divideval[1], 0, -2);
  }
fclose($file);
return $cntr;   
}

public function searchString($term)
{
    $flagcntrarr=array();
    foreach( $this->countryarr as $key=>$value)
    {     
        if (preg_match("/\b(".$value.")\b/i", $term))
    {
    $flagcntrarr[$key]="../../flags/".$key.".gif";
    }  }
    return $flagcntrarr;
}}



function Securitypass($x,$y)
{
foreach($y as $m)
{
    if(in_array($x[0], $m))
    {
        return true;
        break;
    }
}}

/////////////// 0.05 second ////////////////////    



//function countryarrays($file)
//{
//      $cntr=array();
//$fl=new Fileloader();
//foreach($fl->LoadFile($file) as $val)
//{  
//     $divideval=  explode(":", $val);
//    $cntr[$divideval[0]]=substr($divideval[1], 0, -2);
//}
//return $cntr;
//}

//////////////////////////////////////////////////




///////////////////Very Expensive 3.36seconds//////////////////////// 3 seconds
function SearchCountryInString($term)
{
    
    $cntr=array();
$fl=new Fileloader();
foreach($fl->LoadFile("PhpLib/newfile.txt") as $val)
{
    $divideval=  explode(":", $val);
    $str=substr($divideval[1], 0, -2);//remove latest charachter of string because the string is always ending with space
    if (preg_match("/\b(".$str.")\b/i", $term))
    {
    array_push($cntr,array($divideval[0], "../../flags/".$divideval[0].".gif"));
    }}
//foreach($fl->LoadFile("PhpLib/CaseSensitive.txt") as $val)
//{
//    $divideval=  explode(":", $val);
//   if(Securitypass($divideval, $cntr))
//   { 
//       break;}
//    $str=substr($divideval[1], 0, -2);//remove latest charachter of string because the string is always ending with space
//
//    if (preg_match("/".$str."/", $term))
//    {
//        array_push($cntr,array($divideval[0], "../../flags/".$divideval[0].".gif"));
//    }}
return $cntr;
}
/////////////////////////////End Very Expensive////////////////////////////////////





/////////////////////////////// Testing ... //////////////////////



$term = "Sir Elton John postpones a series of summer festival dates, including a show in Hyde Park in London this week, after being diagnosed with appendicitis.";




$time_start = microtime(true);
$obj=new Fileloader("PhpLib/newfile.txt");
echo "<br><br>". $obj->searchString($term);

$time_end = microtime(true);
//Subtract the two times to get seconds
$time = $time_end - $time_start;

echo 'Script 1 took '.$time.' seconds to execute<br>';


$time_start = microtime(true);
echo "<br><br>". SearchCountryInString($term);

$time_end = microtime(true);
//Subtract the two times to get seconds
$time = $time_end - $time_start;

echo 'Script 2 took '.$time.' seconds to execute<br>';

?>
