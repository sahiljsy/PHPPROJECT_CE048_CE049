
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="main.css" type="text/css">
</head>
<body>
<ul>
<h4>

<?php
 session_start();
// Check if the user is logged in, if not then redirect him to login page
if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
   	echo '<li style="float: right"><a  href="logout.php"><i class="material-icons">logout</i></a></li>';
  	echo '<li><a href="home.php"><i class="material-icons">home</i></a></li>';
  	echo '<li><a href="ContactUs.php">Contact Us</a></li>';
  	echo '<li><a href="Feedback.php">Feedback</a></li>';
}
else
{
	echo '<li style="float: right"><a  href="logout.php"><i class="material-icons">login</i></a></li>';
  	echo '<li><a href="ContactUs.php">Contact Us</a></li>';
  	echo '<li><a href="Feedback.php">Feedback</a></li>';
}
?>
  </h4>
</ul>
  <center><h1 style="color:white"> Music Sharing Site</h1></center>
  <div class='container' style="width: 900px"><p>
      <p><b><h2>Hello Everyone,</h2></b></p><br>
      <p><b><h3>Introduction:</h3></b></p>
      <p>This is a Music Sharing Site prepared by roll number CE048 and CE049, Sem 4, Department Of Computer Engineering, Faculty Of Technology, Dharmsinh Desai University as a submission
       of lab for the subject of Discrete Mathematics under the guidance of Prof. Apurva A. Mehta.</p>
      <p><b><h3>Languages Used:</h3></b></p>
      <p>This website is designed mainly using PHP, HTML and CSS.</p>
      <p><b><h3>About the website:</h3></b></p>
      <p>FOR ADMIN:</p>
      <p>Here are some features provided by this website to admins:</p>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;=> User's Registration</p>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;=> See all Users</p>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;=> Manage User Accounts</p>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;=> See Music List</p>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;=> Delete Account</p>
      <p>FOR USERS:</p>
      <p>Here are some features provided by this website to users:</p>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;=> Registration And Login</p>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;=> Update Profile</p>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;=> Upload Music</p>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;=> View Music List</p>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;=> View All Creations</p>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;=> Give Feedback</p>
      <p><b><h3>Basic Concepts:</h3></b></p>
      <p>For preparing the website we used some concepts of sessions, HTML audio tags, handling mp3 files, content dispositions for mp3 file download, MYSQL database management.</p>
      <p><b><h3>Contact Us Using Email:</h3></b></p>
      <p>Aakarsh Inamdar (CE048) : inamdaraakarsh@gmail.com</p>
      <p>Sahil Jariwala (CE049) : sahiljariwala6@gmail.com</p>
  </div><br>
</body>
</html>
