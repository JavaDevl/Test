<?php
include '../phpfastcach/php_fast_cache.php';
include'../retreivedata.php';

function LoadFile()
{
  $cntr=array();
   $file=fopen("../PhpLib/newfile.txt","r") or exit("Unable to open file!");
   while(!feof($file))
  {
                   $m=fgets($file);
          $divideval=  explode(":", $m);
             $cntr[$divideval[0]]=substr($divideval[1], 0, -2);
  }
fclose($file);
return $cntr;   
}

phpFastCache::$storage="pdo";
phpFastCache::debug(phpFastCache::systemInfo());
        $rd=new dataretrieval("topstories",10);
        $lf=  LoadFile();
phpFastCache::debug($rd);
phpFastCache::debug($lf);

if((isset(phpFastCache::$sys['drivers'][$st]) && phpFastCache::$sys['drivers'][$st] == true) || $st=="auto") {

    phpFastCache::set("RSSRegiontopstories", $rd);
    phpFastCache::set("LoadFile", $lf);
    
}
?>
