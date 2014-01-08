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
$string = str_repeat('a', 1000);
$maxChars = 500;

// with function call
$start = microtime(true);
for ($i = 0; $i < RUNS; ++$i) {
    strlen($string) <= $maxChars;
}
echo 'with function call: ', microtime(true) - $start, "\n";

// without function call
$start = microtime(true);
for ($i = 0; $i < RUNS; ++$i) {
    !isset($string[$maxChars]);
}
echo 'without function call: ', microtime(true) - $start;?>
    </body>
</html>
