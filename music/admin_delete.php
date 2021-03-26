<?php
	
	require_once "config.php";
	session_start();
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    		header("location: login.php");
    		exit;
	}
	if($_SESSION["user_type"] == "user") 
	{
		header("location: home.php");
    		exit;
	}
	$id = $_GET['id'];
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$id = $_POST['id'];
		$sql = "DELETE FROM users WHERE id=?"; 
		if($stmt = mysqli_prepare($link, $sql))
        	{
            		// Bind variables to the prepared statement as parameters
            		mysqli_stmt_bind_param($stmt, "i", $param_id);
            		$param_id = $id;
            
            		// Attempt to execute the prepared statement
            		if(mysqli_stmt_execute($stmt))
            		{
            			header("location:view_users.php");
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
<h2>
<center>
<p>Are you sure want to delete this Account?</p>
</h2>
	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
	<table  width="30%">
	<tr>
		<td>
		<input type="submit" name="submit" value="DELETE" class="btn btn-danger">
		</td>
		<td>
		<a href="view_users.php" class="btn btn-primary">Cancel</a>
		</td>
	</tr>
	</table>
	<input type="hidden" name="id" value=<?php echo $id;?>">
	</form>
</center>
</body>
</html>
