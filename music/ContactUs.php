<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="main.css" type="text/css">
    <title>Contact</title>
  </head>
  <body>
    
    <ul>
    <h4>
    	<li style="float: right"><a  href="logout.php"><i class="material-icons">logout</i></a></li>
        <li><a  href="home.php"><i class="material-icons">home</i></a></li>
        <li><a href="displayfile.php">Music List</a></li>
        <li><a href="Feedback.php">Feedback</a></li>
        <li><a href="about.php">About Us</a></li>
       </h4> 
    </ul><br>
    
    <div class='container'>
        <div class='form'>
            <form method='POST'>
            <h1> Contact Us</h1><hr>
            <?php
                require_once "config.php";
                session_start();
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    $username = $_SESSION['username'];
                    $email = $_POST['email'];
                    $subject = $_POST['subject'];
                    $details = $_POST['query'];

                    if(empty($subject) || empty($details) || empty($email))
                    {
                        echo "<font color='red'><h4>Some Field is empty.</h4></font>";
                    }
                    else
                    {
                        $sql = "INSERT INTO query (username, email, subject, query) VALUES (?, ?, ?, ?)";
         
        	            if($stmt = mysqli_prepare($link, $sql)){
            	            // Bind variables to the prepared statement as parameters
            	            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_email, $param_subject, $param_details);
            
            	            // Set parameters
            	            $param_username = $username;
                            $param_email = $email;
            	            $param_subject = $subject;
            	            $param_details = $details;
            	            // Attempt to execute the prepared statement
            	            if(mysqli_stmt_execute($stmt)){
                        	    echo "<font color='green'><h4>Your Query is submitted.</h4></font>";
            	            } else{
	                            echo "<font color='red'><h4>Something went wrong! Please try again after sometime</h4></font>";
                            }
        	            }
                        else{
                            echo "<font color='red'><h4>Something went wrong! Please try again after sometime</h4></font>";
                        }
                    }
                }   
            ?>
            <br><b>Subject For Your Query:</b><br><br> <input type='text' name='subject'><br><br>
            <b>Email:</b> <br><br><input type='email' name='email'><br><br>
            <b>Details:</b><br><br><textarea name="query" rows="4" cols="50"></textarea><br><br>
            <input type='submit' name='submit'></form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>
