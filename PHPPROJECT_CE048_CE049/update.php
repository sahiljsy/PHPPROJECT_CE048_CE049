<?php
// Include config file
require_once "config.php";
 session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: login.php");
    exit;
}
 $id = $_SESSION['id'];
// Define variables and initialize with empty values
$name = $email = $mobile = $age =  "";
$update_msg="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{

	if(!empty($_FILES["image"]["name"]))
	{
		//echo "Present";
		$destinationofimagefile = "userimage/".$_FILES["image"]["name"];
		//echo "<br>".$destinationofimagefile;
		$name = trim($_POST["name"]);
   		$email = trim($_POST["email"]);
    	$mobile = trim($_POST["mobile"]);
    	$age = trim($_POST["age"]);
	
    
        // Prepare an insert statement
        $sql = "UPDATE users SET name=?,email=?,phone=?,age=?,path_of_user_img=? where id=?"; 
         
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssisi",  $param_name, $param_email, $param_mobile, $param_age, $dest, $param_id);
            
            // Set parameters
            $param_name =  $name;
            $param_email = $email;
            $param_mobile = $mobile;
            $param_age = $age;
            $param_id = $id;
	    	$dest = $destinationofimagefile;
			move_uploaded_file($_FILES['image']['tmp_name'],$destinationofimagefile);
            //echo $param_name."<br>".$param_email."<br>".$param_mobile."<br>".$param_age."<br>".$param_id."<br>";
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $update_msg = "YOUR PROFILE IS UPDATED😎️";
            } 
            else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
	}
	else{
		//echo "empty";
		$name = trim($_POST["name"]);
    	$email = trim($_POST["email"]);
    	$mobile = trim($_POST["mobile"]);
    	$age = trim($_POST["age"]);
    
        // Prepare an insert statement
        $sql = "UPDATE users SET name=?,email=?,phone=?,age=? where id=?"; 
         
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
                $update_msg = "YOUR PROFILE IS UPDATED😎️";
            } 
            else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
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
<?php
 
// Check if the user is logged in, if not then redirect him to login page
if($_SESSION['user_type'] == "user")
{
   	echo '<li style="float: right"><a  href="logout.php"><i class="material-icons">logout</i></a></li>';
  	echo '<li><a href="home.php"><i class="material-icons">home</i></a></li>';
  	echo '<li><a href="displayfile.php">Music List</a></li>';
  	echo '<li><a href="UploadMusic.php"> Upload Music</a></li>';
  	echo '<li><a href="displayuseruploads.php"> Your Music</a></li>';
  	echo '<li><a href="about.php">About Us</a></li>';
  	echo '<li style="float: right"><a href="delete.php">Delete Account</a></li>';
}
else
{
	echo '<li><a href="admin.php"><i class="material-icons">home</i></a></li>';
	echo '<li style="float: right"><a  href="logout.php"><i class="material-icons">logout</i></a></li>';
	echo '<li><a href="view_users.php">See users</a></li>';
	echo '<li style="float: right"><a href="delete.php">Delete Account</a></li>';
}
?>
  </h4>
</ul>
<center>
		<h1 style="color:white"><?php echo htmlspecialchars($_SESSION["username"]); ?>'s PROFILE 🎵️<br> 
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
							$mobile = $row['phone'] ;
							$email = $row['email'] ;								
						}
						echo "<br>";
			// Free result set
			mysqli_free_result($result);
			} else{
				echo "<p><em><h1>No records were found.</h1></em></p><br>";
				echo '<a href="update.php" class="btn btn-warning">update your profile</a>';
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
	<form action="<?php echo $_SERVER["PHP_SELF"] ; ?>" method="POST" enctype='multipart/form-data'>    
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
                	<label>User Image</label>
                	<input type="file" name="image" class="form-control">
            	</div>
            	<div class="form-group">
                	<input type="submit"  class="btn btn-primary" value="update">
            	</div>
        </form>
        </div>
        </div>
</center>							
</body>
</html>
	
