<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<html>
<head>
	<title> Upload Your Music Here </title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  	 <link rel="stylesheet" href="main.css" type="text/css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<ul>
<h4>
  <li><a href="home.php"><i class="material-icons">home</i></a></li>
  <li><a href="displayfile.php">Music List</a></li>
  <li><a href="displayuseruploads.php">Your Music</a></li>
  <li><a href="about.php">About US</a></li>
  <li style="float: right"><a href="logout.php"><i class="material-icons">logout</i></a></li>
 </h4>
</ul>
	<h1 align="center" style="color:white"> Want to upload Music? Get it here right a way</h1>

<div class="container">
<?php	
require_once "config.php";
if(isset($_POST["submit"]))
{
	if(!empty($_POST['nameoffile'] && isset($_FILES['mp3']) && isset($_FILES['imageoffile'])))
	{
		if($_FILES['mp3']['type'] != 'audio/mpeg')
		{
			echo "<center><h4>*Invalid music file format</h4></center>";
		}
		else if($_FILES['imageoffile']['type'] == 'image/jpeg' || $_FILES['imageoffile']['type'] == 'image/jpg' || $_FILES['imageoffile']['type'] == 'image/png')
		{
			$username = htmlspecialchars($_SESSION["username"]);
			$musicfilename = $_POST['nameoffile'];
			$imgfilename = $_FILES['imageoffile']['name'];
			$fnm = $_FILES['mp3']['name'];
			$destinationofmusicfile = "musicfiles/".$_FILES["mp3"]["name"];
			$destinationofimagefile = "imagefiles/".$_FILES["imageoffile"]["name"];
			move_uploaded_file($_FILES['mp3']['tmp_name'],$destinationofmusicfile);
			move_uploaded_file($_FILES['imageoffile']['tmp_name'],$destinationofimagefile);
			$query = "insert into music_songs (username,filename,name,pathofmusicfile,pathofimagefile) values ('$username', '$musicfilename', '$fnm' , '$destinationofmusicfile', '$destinationofimagefile')";
			$exe = mysqli_query($link,$query);
			if($exe == true)
			{
				echo "<center><h3>Your Music Has Been Added</h3></center>";
			}
			else
			{
				echo "<center><h4>*Sorry! Some error occured.Please try again later.</h4></center>";
			}
		}
		else
		{
			echo "<center><h4>*Invalid image file format</h4></center>";
		}
	}
	else
	{
		echo "<center><h4>*Some field is empty</h4></center>";
	}	
}
?>
	<form method="POST" enctype='multipart/form-data'>
		
		<h5>Choose Your Music File From Here:</h5> <input type='file' name='mp3'><br>
		<h5>Name Of File:</h5>
		<input type='text' name='nameoffile'><br><br>
		<h5>Choose The Image For Your Music File From Here:</h5>
		<input type='file' name='imageoffile'><br>
		<input type="submit" name="submit" value="Upload">
	</form>

</div>
</body>
</html>
