<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $user_type = "";
$username_err = $password_err = $confirm_password_err = "";
$phone_error = $age_error = $image_error =  "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                    if(strpos($username, "admin") !== false)
                    {
                    	$user_type = "admin";
		     } 
		     else{
		     	$user_type = "user";
		     }
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    $email = $_POST['email'];
    $phone = $_POST['mobileno'];
    $name = $_POST['name'];
    $age = $_POST['age'];


    function validate_phone_number($phone)
    {
	     // Check the length of number
        // This can be customized if you want phone number from a specific country
        $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        // Remove "-" from number
        $phone_to_check = str_replace("-", "", $filtered_phone_number);
        // Check the lenght of number
        // This can be customized if you want phone number from a specific country
        if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
            return false;
        } else {
            return true;
         }
    }

    function validate_age($age)
    {
        if(($age <= 0 || $age >= 120) && !empty($age))
        {
            return false;
        }
        else{
            return true;
        }
    }

    if(!validate_phone_number($phone))
    {
        $phone_error = "Invalid Phone Number Format";
    }

    if(!validate_age($age))
    {
        $age_error = "Invalid age given.";
    }

    if($_FILES['image']['type'] != 'image/jpeg' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/png')
    {
	$image_error = "Invalid image file format";
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($age_error) && empty($phone_error) && empty($image_err)){
        
	if(!empty($_FILES['image']['name']))
	{
		$destinationofimagefile = "userimage/".$_FILES["image"]["name"];
		move_uploaded_file($_FILES['image']['tmp_name'],$destinationofimagefile);
        	// Prepare an insert statement
        	$sql = "INSERT INTO users (username, password, user_type, name,  email, age, phone, path_of_user_img) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
         
        	if($stmt = mysqli_prepare($link, $sql)){
            	// Bind variables to the prepared statement as parameters
            	mysqli_stmt_bind_param($stmt, "sssssiss", $param_username, $param_password, $param_user_type, $param_name, $param_email, $param_age, $param_phone, $dest);
            
            	// Set parameters
            	$param_username = $username;
            	$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            	$param_user_type = $user_type;
            	$param_name = $name;
                $param_age = $age;
            	$param_email = $email;
            	$param_phone = $phone;
	    	    $dest = $destinationofimagefile;
            	// Attempt to execute the prepared statement
            	if(mysqli_stmt_execute($stmt)){
                	// Redirect to login page
                	header("location: login.php");
            	} else{
	                echo "Something went wrong. Please try again later.";
        	}

               // Close statement
               mysqli_stmt_close($stmt);
	       }
        }
	else
	{
		$sql = "INSERT INTO users (username, password, user_type, name,  email, age, phone) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        	if($stmt = mysqli_prepare($link, $sql)){
            	// Bind variables to the prepared statement as parameters
            	mysqli_stmt_bind_param($stmt, "sssssis", $param_username, $param_password, $param_user_type, $param_name, $param_email, $param_age, $param_phone);
            
            	// Set parameters
            	$param_username = $username;
            	$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            	$param_user_type = $user_type;
            	$param_name = $name;
                $param_age = $age;
            	$param_email = $email;
            	$param_phone = $phone;
            	// Attempt to execute the prepared statement
            	if(mysqli_stmt_execute($stmt)){
                	// Redirect to login page
                	header("location: login.php");
            	} else{
	                echo "Something went wrong. Please try again later.";
        	}

               // Close statement
               mysqli_stmt_close($stmt);
	}
    }
    
    // Close connection
    mysqli_close($link);
}
}
?>
 
<!DOCTYPE html>
<html lang="en">
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
  <li style="float: right"><a  href="login.php" ><i class="material-icons">login</i></a></li>
  <li><a href="displayfile.php">Music List</a></li>
  <li><a href="about.php">About Us</a></li>
  </h4>
</ul>
<br><br>
<center>

<div class="container">
    <div class="wrapper">
        <h2><b>Sign Up</b></h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype='multipart/form-data'>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group" >
		<label>Your Name</label>
		<input type="text" name="name" class="form-control">
	    </div>
	    <div class="form-group" <?php echo (!empty($phone_error)) ? 'has-error' : ''; ?>>
		<label>Mobile Number:</label>
		<input type="text" name="mobileno" class="form-control">
                <span class="help-block"><?php echo $phone_error; ?></span>
	    </div>
	    <div class="form-group" <?php echo (!empty($email_error)) ? 'has-error' : ''; ?>>
		    <label>Email</label>
		    <input type="email" name="email" class="form-control" >
	    </div>
	    <div class="form-group" <?php echo (!empty($age_error)) ? 'has-error' : ''; ?>>
		    <label>Age</label>
		    <input type="number" name="age" class="form-control" value="<?php echo $age; ?>">
            <span class="help-block"><?php echo $age_error; ?></span>
	    </div>
	    <div class="form-group" <?php echo (!empty($image_error)) ? 'has-error' : ''; ?>>
		<label>Upload Your Image</label>
		<input type="file" name="image" class="form-control" value="<?php echo $image; ?>">
                <span class="help-block"><?php echo $image_error; ?></span>
	    </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
	   
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>   </div>
    </center>
</body>
</html>
