<?php

include "short/db_connection.php";
$actual_link =  "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$get_id = explode("?", $actual_link);
$count = count($get_id);
$source = $get_id[$count-1];

$get_val = "SELECT `long_url` FROM `url_shortner` WHERE `url_id`='" . $source . "' LIMIT 1";

$query = mysqli_query($db,$get_val);
while($details = mysqli_fetch_assoc($query))
{
	$datea = $details['long_url'];
}
header('location:' .$datea);
?>