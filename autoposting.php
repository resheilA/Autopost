<?php 
session_start();

$myfile = fopen("links.txt", "r") or die("Unable to find the file");
$lines = fread($myfile,filesize("links.txt"));
$pieces = explode("\n", $lines);

$linkcounter = fopen("linkcounter.txt", "r") or die("Unable to find the file");
$counter = fread($linkcounter,filesize("linkcounter.txt"));

// $counter = $counter + 100; 

echo $link = $pieces[$counter];


$appid = 'your appid here';
$secret = 'your secreat here';
$page_id = 'your page id here';
$page_access_token = 'your access token here';

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
