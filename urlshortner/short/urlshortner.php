<?php

$myfile = fopen(".htaccess", "w");
include "db_connection.php";
$site = "http://localhost/urlshortner";
$long_url = $_POST["long_url"];
	$long_url = mysqli_real_escape_string($db, $long_url);
	 
	$sql="SELECT long_url FROM url_shortner WHERE long_url = '$long_url'";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	 
	if(mysqli_num_rows($result) == 0)
	{
		
	}
	
	
	if (!filter_var($_POST['long_url'], FILTER_VALIDATE_URL) === false)
	{
	$url_id = generateRandomString();
	$short_url = $site . "/?" . $url_id;
	 
	$query = mysqli_query($db, "INSERT url_shortner (url_id, long_url, short_url) VALUES ('$url_id','$long_url','$short_url')");
	 
	if($query)
	{
	$msg = $short_url;
	}
	else
	{
	$msg = "there is some problem";
	}
	}
	else
	{
	$msg = $_POST['long_url'] ."is not a valid URL";
	}


 



function generateRandomString() 
{
	$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$charactersLength = strlen($characters);
	$randomString = '';
	 
	for ($i = 0; $i < 5; $i++) 
	{
	$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
 
	return $randomString;
}
echo $short_url;
?>
