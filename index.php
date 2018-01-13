<?php
session_start();
require_once("config.php");

$ch = curl_init();
//for Login to twitter.com use
//twitterCURL($ch,$username,$password);
//for send tweets to your twitter.com account use
sendtweetCURL($ch, $username, $password, $msg);
//execute login oder send tweets
curl_exec($ch);

//disconnecting
curl_close($ch);

?>
