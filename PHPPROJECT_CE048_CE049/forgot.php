<?php
// Initialize the session
session_start();

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = $email = "";
$new_password_err = $confirm_password_err = $email_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{

	$email = $_POST["email"];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	if (!$email) 
	{
		$email_err = "Invalid email address please type a valid email address!";
	} 
	else 
	{
		$sel_query = "SELECT * FROM users WHERE email='" . $email . "'";
		$results = mysqli_query($link, $sel_query);
		$row = mysqli_num_rows($results);
		if ($row == "0") 
		{
			$email_err = "No user is registered with this email address!";
		}
		else
		{
			if(empty(trim($_POST["new_password"])))
    		{
        		$new_password_err = "Please enter the new password.";     
    		} 
    		elseif(strlen(trim($_POST["new_password"])) < 6)
   			 {
        		$new_password_err = "Password must have atleast 6 characters.";
    		} 
    		else
    		{
        		$new_password = trim($_POST["new_password"]);
    		}
    
    		// Validate confirm password
    		if(empty(trim($_POST["confirm_password"])))
    		{
        		$confirm_password_err = "Please confirm the password.";
    		} 
    		else
    		{
        		$confirm_password = trim($_POST["confirm_password"]);
        		if(empty($new_password_err) && ($new_password != $confirm_password))
        		{
            		$confirm_password_err = "Password did not match.";
        		}
    		}
        
    		// Check input errors before updating the database
    		if(empty($new_password_err) && empty($confirm_password_err) && empty($email_err))
    		{
        		// Prepare an update statement
        		$sql = "UPDATE users SET password = ? WHERE email = ?";
        
        		if($stmt = mysqli_prepare($link, $sql))
        		{
            		// Bind variables to the prepared statement as parameters
            		mysqli_stmt_bind_param($stmt, "ss", $param_password, $param_email);
            
            		// Set parameters
            		$param_password = password_hash($new_password, PASSWORD_DEFAULT);
            		$param_email = $email;
            
            		// Attempt to execute the prepared statement
            		if(mysqli_stmt_execute($stmt))
            		{
                		// Password updated successfully. Destroy the session, and redirect to login page
                		session_destroy();
                		header("location: login.php");
                		exit();
            		} 
            		else
            		{
                		echo "Oops! Something went wrong. Please try again later.";
            		}

            		// Close statement
            		mysqli_stmt_close($stmt);
        		}
    		}
		}
	}
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="main.css" type="text/css">
</head>
<body>
<br><br>
<center>
<div class="container">
    <div class="wrapper">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
        	<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="login.php">Cancel</a>
            </div>
        </form>
    </div> 
    </div>
    </center>   
</body>
</html>
