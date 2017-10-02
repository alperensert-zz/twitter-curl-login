<?php
session_start();
require_once("config.php");

$ch = curl_init();
twitterCURL($ch,$username,$password);
curl_exec($ch);
curl_close($ch);
?>
