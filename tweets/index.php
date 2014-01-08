<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "880555015-xcTf3Coso6Yc8rJ5ZMthrhD9zTyWa9bY76hKb5mi",
    'oauth_access_token_secret' => "t46F1cNcxibrrbRzzVIQ7g2HdiCfyxUVbKfKNH3s",
    'consumer_key' => "c5YVssi4M4x1qhVZqfhbQ",
    'consumer_secret' => "JlzPN1AvTR6CdS0joI6ATDpXyISERxNBwPhDi1k00EY"
);


/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/followers/ids.json';
$getfield = '?screen_name=J7mbo';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$tweets = json_decode(file_get_contents("http://search.twitter.com/search.json?q=php&rpp=5&include_entities=true&result_type=mixed"));

foreach($tweets->results as $t){

  echo "Username: {$t->Breakingnews}";
  echo "Tweet: {$t->text}" . PHP_EOL;

  $responseJson = file_get_contents('http://api.twitter.com/1/statuses/user_timeline.json?screen_name=take_me_fishing&include_rts=1&count=1');

if ($responseJson) 
{
  $response = json_decode($responseJson);                   
  $status = $response->text;
}

print_r($responseJson);
} 