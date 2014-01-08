<?php
header('Content-Type: text/html; charset=utf-8');
$name = $_GET['url'];
$url = 'http://twitter.com/statuses/user_timeline.xml?screen_name=BBCArabicOnline ';
$url .= $name;
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_HEADER, 0);
ob_start();
curl_exec ($ch);
curl_close ($ch);
$string = ob_get_contents();
$content = ob_end_clean();
echo $string;
?>