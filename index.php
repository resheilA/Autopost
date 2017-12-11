<?php 
if($_POST)
{
$myfile = fopen("data.txt", "w") or die("Unable to open file!");
$txt = $_POST['appid'].','.$_POST['secret'].','.$_POST['pageid'].','.$_POST['accesstoken'];
fwrite($myfile, $txt);
fclose($myfile);
}

$myfile = fopen("data.txt", "r") or die("Unable to open file!");
$lines = fread($myfile,filesize("data.txt"));
$pieces = explode(",", $lines);


$appid = $pieces[0];
$secret = $pieces[1];
$pageid = $pieces[2];
$page_access_token = $pieces[3];
	
fclose($myfile);

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
<br>Appid<br>
<input type='text' name='appid' value='<?php if($appid){echo $appid;} ?>' placeholder='Enter application id'><br>
<br>Secret<br>
<input type='text' name='secret' value='<?php if($secret){echo $secret;} ?>' placeholder='Enter application secret'><br>
<br>Page id<br>
<input type='text' name='pageid' value='<?php if($pageid){echo $pageid;} ?>' placeholder='Enter your page id'><br>
<br>Access token<br>
<input type='text' name='accesstoken' value='<?php if($page_access_token){echo $page_access_token;} ?>' placeholder='Enter your page access token'>

<input type='submit'>

</form>