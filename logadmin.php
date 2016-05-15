

<!DOCTYPE html>
<?php

require 'connect.php';

session_start();
$error = "";
if(isset($_POST['username']) && isset($_POST['password']))
{
    $password_hash = ($_POST['password']);
    $username = $_POST['username']; 
    if(!empty($username) && !empty($password_hash))
    {
        $query = "SELECT username FROM admin WHERE username = '$username' AND password = '$password_hash'";
        
         if($query_run = mysql_query($query))
         {
             $query_num_rows = mysql_num_rows($query_run);
             if($query_num_rows == 0)
             {
                 $error = "USERNAME or PASSWORD donot MATCH";
             }
             else
             {
                 $name = mysql_result($query_run, 0, 'username');
                 $_SESSION['name'] = $name;
                 header('Location: admin.php');
             }
         }
    }
}
?>
<html lang="en">
<head>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body style="margin:10px;">
    <div  style="width: 50%;margin: 0 auto; ">
        <h1> RAMDEV COLLEGE OF ENGINEERING</h1>
    </div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href = "index.php">Home</a>
                <li><a href="logadmin.php">admin login</a></li>
                <li><a href="logteacher.php">Teacher login</a></li> 
            </ul>
        </div>
    </nav>
    <form class="form-signin" action="logadmin.php" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="username" class="form-control" placeholder="username" required autofocus name = "username">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name = "password">
        <?php echo $error; ?>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</body>
</html>

