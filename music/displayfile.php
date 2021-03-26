<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width,initial-scale=1.0'>
	<title>Playlist</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="css_for_musiclist.css" type="text/css">
</head>

<body>
	<ul>
		<h4>
			<?php

			// Check if the user is logged in, if not then redirect him to login page
			if ($_SESSION['user_type'] == "user") {
				echo '<li style="float: right"><a  href="logout.php"><i class="material-icons">logout</i></a></li>';
				echo '<li><a href="home.php"><i class="material-icons">home</i></a></li>';
				echo '<li><a href="UploadMusic.php"> Upload Music</a></li>';
				echo '<li><a href="displayuseruploads.php"> Your Music</a></li>';
				echo '<li><a href="about.php">About Us</a></li>';
				echo '<li style="float: right">
						<form class="example" action="search.php" method="POST">
							<input type="text" placeholder="Song Name.." name="search">
							<button type="submit"><i class="material-icons">search</i></button>
			  			</form>
			  
  						</li>';
			} else {
				echo '<li><a href="admin.php"><i class="material-icons">home</i></a></li>';
				echo '<li style="float: right"><a  href="logout.php"><i class="material-icons">logout</i></a></li>';
				echo '<li><a href="view_users.php">See users</a></li>';
				echo '<li style="float: right">
						<form class="example" action="search.php" method="POST">
							<input type="text" placeholder="Song Name.." name="search">
							<button type="submit"><i class="material-icons">search</i></button>
			  			</form>
			  
  						</li>';
			}
			?>

		</h4>
	</ul>

	<div class='container'>
		<div class='row'>

			<?php
			require_once "config.php";
			$query = "Select * from music_songs";
			$exe = mysqli_query($link, $query);
			$count = 0;
			while ($view = mysqli_fetch_array($exe)) {
				$count++;
				$id = $view['id'];
				$username = $view['username'];
				$filename = $view['filename'];
				$img = $view['pathofimagefile'];
				$musicpath = $view['pathofmusicfile'];
				echo "<div class='col'>
				<div class='image'><img src='$img' class='center' width='200' height='200'></div>
				<div class='Text'><h3>" . $filename . "</h3><h5>Artist: " . $username . "</h5></div>
				<div class='btns'><audio controls controlsList='nodownload'> <source src='$musicpath' type='audio/mp3'> </audio><a href='downloadmusic.php?id=" . $id . "'><img src='download.jpg' width='30' height='30'><font color='green'> Download</font></a></div>
		</div>";
			}
			?>
		</div>
	</div>
</body>

</html>