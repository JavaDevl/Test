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
        <script type="text/javascript" src="http://voap.weather.com/weather/oap/UPXX0016?template=ALERV&par=3000000007&unit=1&key=twciweatherwidget"></script>
        <?php

        $strreg = "Great Britain|United Kingdom|British|Britain|London|GBP|asda|ds|ret|trey|ertgr|ertegfd|sdgfdsg|sdgfsg|sdgfdsf|sdfsdfsd|gsdhdf|gfdhdh|hteRT|ertterrt|ewrtgsdhfh|sdgsgdfdf| dsada|trdfg|fgdhdfg|fdghdjdf|fdhdfghgfhj|uiyuoukjh|kjhgfhhfhf|Jfghgk|GFHhgfgfhgfh|fghjfj|jhg| etertre|tregfd|retggdf|rgdgde|regregre|greger|grege|ertry|sdfs|yry|gfdge|retrey|hd|dgfdhd|Dhr|sett|sgtretew|twtw|rtwet";
        
        $str = "Sir Elton John postpones a series of summer festival dates, including a show in Hyde Park in London this week, after being diagnosed with appendicitis.";
        
        $time_start = microtime(true);
$isExists = preg_match("/$strreg/", $str);

if ($isExists){

    echo "Its exists";
} else {

 echo "Not exixts" ;

} ;
$time_end = microtime(true);
//Subtract the two times to get seconds
$time = $time_end - $time_start;

echo 'Script took '.$time.' seconds to execute<br>';

        $strreg1 = array("Great Britain","United Kingdom","British","Britain","London","GBP","asda","ds","ret","trey","ertgr","ertegfd","sdgfdsg","sdgfsg","sdgfdsf","sdfsdfsd","gsdhdf","gfdhdh","hteRT","ertterrt","ewrtgsdhfh","sdgsgdfdf","dsada","trdfg","fgdhdfg","fdghdjdf","fdhdfghgfhj","uiyuoukjh","kjhgfhhfhf","Jfghgk","GFHhgfgfhgfh","fghjfj","jhg","etertre","tregfd","retggdf","rgdgde","regregre","greger","grege","ertry","sdfs","yry","gfdge","retrey","hd","dgfdhd","Dhr","sett","sgtretew","twtw","rtwet");
        

        $time_start = microtime(true);
$isExists1 = preg_match("/$str/", $strreg1);

if ($isExists1){
    echo "Its exists";
} else {
 echo "Not exixts" ;
} ;
$time_end = microtime(true);
//Subtract the two times to get seconds
$time = $time_end - $time_start;

echo 'Script took '.$time.' seconds to execute<br>';

$time_start = microtime(true);
if (see($strreg1,$str)){
    echo "Its exists";
} else {
 echo "Not exixts" ;
} ;
$time_end = microtime(true);
//Subtract the two times to get seconds
$time = $time_end - $time_start;

echo 'Script took '.$time.' seconds to execute<br>';


function see($words, $string){
foreach ($words as $value)
            if(stripos($string, $value) !== false);
        return "found";
}
?>
    </body>
</html>
