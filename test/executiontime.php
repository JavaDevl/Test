<?php
//Create a variable for start time
$time_start = microtime(true);

// Place your PHP/HTML/JavaScript/CSS/Etc. Here
$needle = "to";
$haystack = "I go to school";
if(strpos($haystack, $needle))
        echo "yes found <br>";
//Create a variable for end time
$time_end = microtime(true);
//Subtract the two times to get seconds
$time = $time_end - $time_start;

echo 'Script took '.$time.' seconds to execute<br>';


$time_start1 = microtime(true);

// Place your PHP/HTML/JavaScript/CSS/Etc. Here
$regex = "to";
$term = "I go to school";
if (preg_match("/\b(".$regex.")\b/i", $term))
        
        echo "yes found <br>";
//Create a variable for end time
$time_end1 = microtime(true);
//Subtract the two times to get seconds
$time1 = $time_end1 - $time_start1;

echo 'Script took '.$time1.' seconds to execute';
?>
