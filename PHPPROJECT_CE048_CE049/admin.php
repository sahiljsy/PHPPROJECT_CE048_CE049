<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
if ($_SESSION["user_type"] == "user") {
    header("location: home.php");
    exit;
}

require_once "config.php";
$query = "Select * from users where username='" . $_SESSION['username'] . "'";
$exe = mysqli_query($link, $query);
while ($view = mysqli_fetch_array($exe)) {
    $path = $view['path_of_user_img'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HOME</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="home.css" type="text/css">
</head>

<body>
    <ul>
        <h4>
            <li style="float: right"><a href="logout.php"><i class="material-icons">logout</i></a></li>
            <li><a href="admin.php"><i class="material-icons">home</i></a></li>
            <li><a href="displayfile.php">Music List</a></li>
            <li><a href="view_users.php">Manage users</a></li>
            <li style="float: right">
                <form class="example" action="search.php" method="POST">
                    <input type="text" placeholder="Song Name.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>

            </li>
        </h4>
    </ul>
    <center>
        <div class="page-heade" style="background-color:white">
            <table width="100%">
                <tr>
                    <td rowspan="2" align="center"><a href="update.php"> <img src='<?php echo $path; ?>' class="circular" width="180" height="180"></a></td>
                    <td width="85%">
                        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]) ?></b></h1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h1></b>WELCOME TO MUSIC 🎵️ SHARING SITE🤩️</h1>
                    </td>
                </tr>
            </table>
        </div>
    </center>
    <div class="footer">
        <!--<h1 style="text-shadow:2px 2px red"> Life is one grand, sweet song, so start the music.🎶️</h1>-->
        <h1 style="text-shadow:2px 2px red"> One good thing about music, when it hits you, you feel no pain.🎶️</h1>
    </div>
</body>

</html>