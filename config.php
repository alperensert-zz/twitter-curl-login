<?php 
	$username = "your USERNAME or EMAIL";
	$password = "PASSWORD";	
	
function ara($ilk, $son, $text) {
    @preg_match_all('/' . preg_quote($ilk, '/') .
    '(.*?)'. preg_quote($son, '/').'/i', $text, $m);
    return @$m[1];}
	
function twitterCURL($ch,$username,$password) {
	$rand = rand(1,99999);
	$cookie =  $_SERVER['DOCUMENT_ROOT'] . "/cookie-$rand.txt";
	$sTarget = "https://twitter.com/login";
	curl_setopt($ch, CURLOPT_URL, $sTarget);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
	curl_setopt($ch, CURLOPT_REFERER, "https://twitter.com/");
	$html = curl_exec($ch);
	$baslik = ara("<input type=\"hidden\" value=", "\" name=\"authenticity_token\">", $html);
	$degerim = $baslik[1];
	$gerekli = explode("\"", $degerim);
	$authtoken = $gerekli[1];
	$sPost = "session[username_or_email]=$username&session[password]=$password&return_to_ssl=true&scribe_log=&redirect_after_login=%2F&authenticity_token=$authtoken";
	$sTarget = "https://twitter.com/sessions";
	curl_setopt($ch, CURLOPT_URL, $sTarget);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $sPost);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
	curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));}