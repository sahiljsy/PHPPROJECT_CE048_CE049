<?php
	
	require_once "config.php";
	session_start();
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    		header("location: login.php");
    		exit;
	}
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$id = $_SESSION['id'];
		$sql = "DELETE FROM users WHERE id=?"; 
		if($stmt = mysqli_prepare($link, $sql))
        	{
            		// Bind variables to the prepared statement as parameters
            		mysqli_stmt_bind_param($stmt, "i", $param_id);
            		$param_id = $id;
            
            		// Attempt to execute the prepared statement
            		if(mysqli_stmt_execute($stmt))
            		{
            			session_destroy();
            			header("location:login.php");
            		} 
            	}
	}
?>
<html>
<head>
    <title>Delete Account</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<center>
<h2>
<p>Are you sure want to delete your Account?</p>
</h2>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
	<table  width="20%">
	<tr>
		<td>
		<input type="submit" name="submit" value="DELETE" class="btn btn-danger">
		</td>
		<td>
		<?php 
			if($_SESSION["user_type"] == "user") 
			{
				echo '<a href="home.php" class="btn btn-primary">Cancel</a>';
			}
			else
			{
				echo '<a href="admin.php" class="btn btn-primary">Cancel</a>';
			}
		?>
		</td>
	</tr>
	</table>
	</form>
</center>
</body>
</html>
