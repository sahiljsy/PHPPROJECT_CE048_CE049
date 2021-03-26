<?php
require_once "config.php";
$id=$_GET['id'];
$query = "Select * from music_songs where id='$id'";
$exe = mysqli_query($link,$query);
while($view = mysqli_fetch_array($exe))
{
	$path = $view['pathofmusicfile'];
	echo $path;
	$name = $view['filename'];
	header('content-Disposition: attachment; filename ='.$name.'.mp3');
	header('content-type: audio/mpeg');
	header('Pragma: no-cache');
	header('Expires: 0');
	readfile($path);
}
