    <?php
class Fileloader{ 
   //////////////////////////////////////////
    private $file;
    private $countryarr;
    
    
    function __construct($file) {
        $this->file=$file;
        
            $pr=$this->LoadFile();
         
        $this->countryarr=$pr;
        
    }

 
public function LoadFile()
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
        if (preg_match("/\b".$value."\b/", $term))
    {
    $flagcntrarr[$key]="flags/".strtolower($key).".gif";
    }  }
    return $flagcntrarr;
}
//public function searchStringsp($term)
//{
//    $flagcntrarr=array();
//    foreach( $this->countryarr as $key=>$value)
//    {     
//        if (preg_match("/\b(".$value.")\b/i", $term))
//    {
//    $flagcntrarr[$key]="../../flags/".$key.".gif";
//    }  }
//    return $flagcntrarr;
//}
//
//
//private function Securitypass($x,$y)
//{
//foreach($y as $m)
//{
//    if(in_array($x[0], $m))
//    {
//        return true;
//        break;
//    }
//}}
}

//$term = "Sir Elton John postpones a series of summer festival dates, including a show in Hyde Park in London this week, after being diagnosed with appendicitis.";
//
//$time_start = microtime(true);
//$obj=new Fileloader("../PhpLib/newfile.txt");
//echo "<br><br>". print_r($obj->searchString($term));
//
//$time_end = microtime(true);
////Subtract the two times to get seconds
//$time = $time_end - $time_start;
//
//echo 'Script 1 took '.$time.' seconds to execute<br>';



?>
