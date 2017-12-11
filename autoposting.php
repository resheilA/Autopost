<?php 
session_start();

$myfile = fopen("links.txt", "r") or die("Unable to find the file");
$lines = fread($myfile,filesize("links.txt"));
$pieces = explode("\n", $lines);

$linkcounter = fopen("linkcounter.txt", "r") or die("Unable to find the file");
$counter = fread($linkcounter,filesize("linkcounter.txt"));

// $counter = $counter + 100; 

echo $link = $pieces[$counter];


$appid = '1321925394597436';
$secret = 'b49d555e04d085ccccad4b974f45eb92';
$page_id = '849182348567531';
$page_access_token = 'EAASySL2QhjwBABzdhWIRbCQUxGU6QhXUxeVvUCdPyQZC8UekVQq0Gid3L7ZCMe3vAIXVWQYj2x1z3PB0DsvuQLzIBWc9bAgW7kEFQIwbq6p9bX7lnqQXax4xSUbmPomsYwkijMXmqBvudWxniC0gdeZBd0OQbN9VHUK80fGEAZDZD';

$data['link'] = $link;
//$data['message'] = $_POST['message'];

$data['access_token'] = $_SESSION['page_access_token'];
$post_url = 'https://graph.facebook.com/'.$page_id.'/feed';


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $post_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$return = curl_exec($ch);
curl_close($ch);

	
$myfile = fopen("linkcounter.txt", "w") or die("Unable to open file!");
$txt = $counter+1;
fwrite($myfile, $txt);
fclose($myfile);

?>	
