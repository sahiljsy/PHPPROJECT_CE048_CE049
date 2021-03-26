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
        <li><a href="about.php">About Us</a></li>
       </h4> 
    </ul><br>
    
    <div class='container'>
        <div class='form'>
            <form method='POST'>
            <h1> Feedback Form</h1><hr>
            <?php
                require_once "config.php";
                session_start();
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    $username = $_SESSION['username'];
                    $ratings = $_POST['ratings'];
                    $suggestion = $_POST['suggestion'];

                    if(empty($ratings))
                    {
                        echo "<font color='red'><h4>Some Field is empty.</h4></font>";
                    }
                    else if($ratings < 0 || $ratings > 5)
                    {
                        echo "<font color='red'><h4>Ratings should be integer between 0 to 5</h4></font>";
                    }
                    else
                    {
                        $sql = "INSERT INTO feedback (username, ratings, suggestion) VALUES (?, ?, ?)";
         
        	            if($stmt = mysqli_prepare($link, $sql)){
            	            // Bind variables to the prepared statement as parameters
            	            mysqli_stmt_bind_param($stmt, "sis", $param_username, $param_ratings, $param_suggestions);
            
            	            // Set parameters
            	            $param_username = $username;
            	            $param_ratings = $ratings;
            	            $param_suggestions = $suggestion;
            	            // Attempt to execute the prepared statement
            	            if(mysqli_stmt_execute($stmt)){
                        	    echo "<font color='green'><h4>Your Feedback is submitted.</h4></font>";
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
            <br><b>Ratings</b><br> <br><input type='number' name='ratings'><br><br>
            <b>Suggestions:</b><br><br><textarea name="suggestion" rows="4" cols="50"></textarea><br><br>
            <input type='submit' name='submit'></form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>
