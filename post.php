<?php
$appid = '1321925394597436';
$secret = 'b49d555e04d085ccccad4b974f45eb92';
$pageid = '849182348567531';

//echo $token = file_get_contents('https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id='.$appid.'&client_secret='.$secret);
//$shot_token = 'EAACEdEose0cBAPSuZC4SeUNit5GO5APQs1GTt8S3LK2okLq7cIZCo42YCfINCXUQVLLhqZBs7UKHZBnGzxZAwjUre8jkegx9nrDfS8QSmZCYINNdux2ddf2mlRZAOQZBSkiQZACmAvZAPYFdXHyiE7IGmZBIhKVux3MHqYaIzG4oe1woCq3BXIr1DttQ7kIK4nWTXfL13g67A36kgZDZD';
//$feed = file_get_contents('https://graph.facebook.com/mooseweb/feed?access_token='.$appid.'|'.$secret);
//print_r(json_decode($feed));
//echo $longtoken = file_get_contents('https://graph.facebook.com/v2.10/oauth/access_token?grant_type=fb_exchange_token&client_id='.$appid.'&client_secret='.$secret.'&fb_exchange_token='.$shot_token);


$page_access_token = 'EAASySL2QhjwBABzdhWIRbCQUxGU6QhXUxeVvUCdPyQZC8UekVQq0Gid3L7ZCMe3vAIXVWQYj2x1z3PB0DsvuQLzIBWc9bAgW7kEFQIwbq6p9bX7lnqQXax4xSUbmPomsYwkijMXmqBvudWxniC0gdeZBd0OQbN9VHUK80fGEAZDZD';
$page_id = '849182348567531';

$data['link'] = "http://www.webportal.in/";
$data['message'] = "We design your dreams...";

$data['access_token'] = $page_access_token;

$post_url = 'https://graph.facebook.com/'.$page_id.'/feed';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $post_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$return = curl_exec($ch);
curl_close($ch);


?>