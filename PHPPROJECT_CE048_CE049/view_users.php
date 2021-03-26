<?php

session_start(); 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if($_SESSION["user_type"] == "user") 
{
	header("location: home.php");
    	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="table.css" type="text/css">
</head>
<body>
<ul>
<h4>
  <li style="float: right"><a  href="logout.php"><i class="material-icons">logout</i></a></li>
  <li><a href="admin.php"><i class="material-icons">home</i></a></li>
  <li><a href="displayfile.php">Music List</a></li>
  </h4>
</ul>
<br><br>
<center>
<div class="container" style="width:800px">
<?php
// Include config file
require_once "config.php";

// Attempt select query execution
$sql = "SELECT * FROM users";
if($result = mysqli_query($link, $sql))
{
	if(mysqli_num_rows($result) > 0)
	{
		echo "<table >";
			echo "<thead>";
				echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>Username</th>";
					echo "<th>Name</th>";
					echo "<th>Email</th>";
					echo "<th>Age</th>";
					echo "<th>Mobile</th>";
					echo "<th>Actions</th>";
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			while($row = mysqli_fetch_array($result))
			{
				if($row['user_type'] =="user")
				{
				
					echo "<tr>";
						echo "<td>" . $row['id'] . "</td>";
						echo "<td>" . $row['username'] . "</td>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['email'] . "</td>";
						echo "<td>" . $row['age'] . "</td>";
						echo "<td>" . $row['phone'] . "</td>";
						echo "<td>";
							echo "<a href='admin_update.php?id=" . $row['id'] . "'>Update </a>";
							echo "&nbsp;         ";
							echo "<a href='admin_delete.php?id=" . $row['id'] . "'>Delete</a>";
							echo "&nbsp;";
						echo "</td>";
					echo "</tr>";
				}
			}
			echo "</tbody>";                            
		echo "</table>";
		// Free result set
		mysqli_free_result($result);
	} else{
		echo "<p><em><h1>No records were found.</h1></em></p><br>";
		echo "<a href='create.php'>Create New Record</a>";
	}
} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
	<br>
	</div>
	</center>
</body>
</html>
