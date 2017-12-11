<?php 
session_start();

if($_POST)
{
$page_access_token = $_SESSION['page_access_token'];
$page_id = $_SESSION['pageid'];

$data['link'] = $_POST['link'];
$data['message'] = $_POST['message'];

$data['access_token'] = $_SESSION['page_access_token'];
$post_url = 'https://graph.facebook.com/'.$page_id.'/feed';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $post_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$return = curl_exec($ch);
curl_close($ch);
	
}

?>	
<style>

input[type=text]
{
	margin-top:10px;
	height:45px;
	font-size: 30px;
	width:90%;
	padding:5px;
}	

input[type=submit]
{
	margin-top:10px;
	height:45px;
	font-size: 30px;
	width:90%;
	padding:5px;
}

h1
{
font-family:arial;
height:10px;
}

</style>
<h1>Facebook Post As Page</h1>
<form method='post'>
<br>Link<br>
<input type='text' name='link' placeholder='Enter your link'><br>
<br>Message<br>
<input type='text' name='message' placeholder='Enter your message'><br>
<input type='submit'>

</form>