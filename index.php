<?php 
session_start();

if($_POST)
{
$myfile = fopen("data.txt", "w") or die("Unable to open file!");
$txt = $_POST['appid'].','.$_POST['secret'].','.$_POST['pageid'].','.$_POST['accesstoken'];
fwrite($myfile, $txt);
fclose($myfile);

header("Location:message.php");
}

$file_exist = file_exists("data.txt");

if($file_exist == 1)
{
	
$myfile = fopen("data.txt", "r") or die("Unable to find the file");
$lines = fread($myfile,filesize("data.txt"));
$pieces = explode(",", $lines);


$appid = $pieces[0];
$secret = $pieces[1];
$pageid = $pieces[2];
$page_access_token = $pieces[3];

$_SESSION['appid'] = $appid;
$_SESSION['secret'] = $secret;
$_SESSION['pageid'] = $pageid;
$_SESSION['page_access_token'] = $page_access_token;
	
fclose($myfile);
}
else
{
//echo "No old data exist";	
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
<br>Appid<br>
<input type='text' name='appid' value='<?php if(isset($appid)){echo $appid;} ?>' placeholder='Enter application id'><br>
<br>Secret<br>
<input type='text' name='secret' value='<?php if(isset($secret)){echo $secret;} ?>' placeholder='Enter application secret'><br>
<br>Page id<br>
<input type='text' name='pageid' value='<?php if(isset($pageid)){echo $pageid;} ?>' placeholder='Enter your page id'><br>
<br>Access token<br>
<input type='text' name='accesstoken' value='<?php if(isset($page_access_token)){echo $page_access_token;} ?>' placeholder='Enter your page access token'>

<input type='submit'>

</form>