<?php
// Include config file
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
// Define variables and initialize with empty values
$name = $emial = $mobile = $age = "";
$update_msg = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $mobile = trim($_POST["mobile"]);
    $age = trim($_POST["age"]);
    $id = trim($_POST['id']);
        // Prepare an insert statement
        $sql = "UPDATE users SET name=?,email=?,mobile=?,age=? where id=?"; 
         
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssii",  $param_name, $param_email, $param_mobile, $param_age, $param_id);
            
            // Set parameters
            $param_name =  $name;
            $param_email = $email;
            $param_mobile = $mobile;
            $param_age = $age;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $update_msg = "PROFILE IS UPDATED😎️";
            } 
            else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="main.css" type="text/css">
</head>
<body>
<ul>
<h4>
  <li style="float: right"><a  href="logout.php"><i class="material-icons">logout</i></a></li>
  <li><a href="admin.php"><i class="material-icons">home</i></a></li>
  <li><a href="displayfile.php">Music List</a></li>
  </h4>
</ul>

<center>
		<h1 style="color:white"><?php echo "user's PROFILE 🎵️ ";?>
 <?php echo $update_msg;?>    
	</h1>
	<?php
		// Attempt select query execution
		$sql = "SELECT * FROM users where id=".$id;
		if($result = mysqli_query($link, $sql))
		{
			if(mysqli_num_rows($result) > 0)
			{
						while($row = mysqli_fetch_array($result))
						{
							$name = $row['name'];
							$username = $row['username'] ;
							$age = $row['age'];
							$mobile = $row['mobile'] ;
							$email = $row['email'] ;
								
						}
						echo "<br>";
			// Free result set
			mysqli_free_result($result);
			}
		}
 		else
		{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}

		// Close connection
		mysqli_close($link);
	?>
	<div class="container">
	<div class="wrapper">
	</h3>
	<form action="<?php echo $_SERVER["PHP_SELF"] ; ?>" method="POST">    
            	<div class="form-group">
                	<label>name</label>
                	<input type="text"  class="form-control" name="name" value="<?php echo $name; ?>">
            	</div>
            	<div class="form-group">
                	<label>email</label>
                	<input type="text"  class="form-control" name= "email" value="<?php echo $email; ?>">
            	</div>
            	<div class="form-group ">
                	<label>age</label>
                	<input type="text"  class="form-control" name="age" value="<?php echo $age; ?>">
            	</div>
            	<div class="form-group">
                	<label>mobileno</label>
                	<input type="text"  class="form-control" name="mobile" value="<?php echo $mobile; ?>">
            	</div>
            	<div class="form-group">
                	<input type="submit"  class="btn btn-primary" value="update">
                	<a href="view_users.php" class="btn btn-primary">BACK</a>  
            	</div>
            	<input type="hidden" name ="id" value = "<?php echo $id; ?>">
        </form>
        </div>
        </div>
</center>							
</body>
</html>
	
