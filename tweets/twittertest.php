<?php
session_start();
require_once("lib/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "BBCBreaking";
$notweets = 1;
$consumerkey = "c5YVssi4M4x1qhVZqfhbQ";
$consumersecret = "JlzPN1AvTR6CdS0joI6ATDpXyISERxNBwPhDi1k00EY";
$accesstoken = "880555015-xcTf3Coso6Yc8rJ5ZMthrhD9zTyWa9bY76hKb5mi";
$accesstokensecret = "t46F1cNcxibrrbRzzVIQ7g2HdiCfyxUVbKfKNH3s";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;   
}
  
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
var_dump($tweets);
    

 echo $tweets[0]->text;
 
var_dump($tweets)
?>