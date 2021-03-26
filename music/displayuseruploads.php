<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="css_for_musiclist.css" type="text/css">
</head>
<body>
<ul>
<h4>
  <li style="float: right"><a  href="logout.php"><i class="material-icons">logout</i></a></li>
  <li><a href="home.php"><i class="material-icons">home</i></a></li>
  <li><a href="displayfile.php">Music List</a></li>
  <li><a href="UploadMusic.php"> Upload Music</a></li>
  <li><a href="about.php">About Us</a></li>
  </h4>
</ul>
<div class='container'><div class='row'> 
<?php
require_once "config.php";
$user = $_SESSION["username"];
$query = 'Select * from music_songs where username ="'.$user.'"';
$exe = mysqli_query($link,$query);
$count=0;
while($view = mysqli_fetch_array($exe))
{
	$count = $count+1;
	$id = $view['id'];
	$username = $view['username'];
	$filename = $view['filename'];
	$img = $view['pathofimagefile'];
	$musicpath= $view['pathofmusicfile'];
	echo "<div class='col'>
				<div class='image'><img src='$img' class='center' width='200' height='200'></div>
				<div class='Text'><h2>".$filename."</h2><h4>Artist: ".$username."</h4></div>
				<div class='btns'><audio controls controlsList='nodownload'> <source src='$musicpath' type='audio/mp3'> </audio><a href='downloadmusic.php?id=".$id."'><img src='download.jpg' width='30' height='30'><font color='green'> Download here</font></a></div>
		</div>";
	if($count%3 == 0)
	{
		echo"</div><div class='row'>";
	}
}
?>
</div></div>
<br>
<font color='white'><h1 align='center'><b> The total number of Upload by <?php echo $user; ?> is: <?php echo $count;?></b></h1></font>
<br><br>
</body>
</html>
