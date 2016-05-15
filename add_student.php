<!DOCTYPE html>
<?php

require 'connect.php';
session_start();
if(!(@$name = $_SESSION['name']))
{
    //die("Please Login To Continue");
    //echo "back";
    header('Location: index.php');
}
    $error = "";
$success = "";
if(isset($_POST['sname']) && isset($_POST['sex']) && isset($_POST['dob']) && isset($_POST['cid']))
{
    $sname = $_POST['sname'];
    $cid = $_POST['cid'];
    $sex= $_POST['sex'];
    $dob= $_POST['dob'];
    if(!empty($sname)  && !empty($dob) && !empty($cid) && !empty($sex))
    {
        $query = "INSERT INTO student(sname, dob, cid, sex) VALUES('$sname','$dob','$cid','$sex')";
        if($query_run = mysql_query($query))
        {
            $success = "Database inserted. Fill to add New!!<br><br>";
        }
        else
        {
            $error = "Entry cannot be added.. Some problem in server";
        }

    }
    else
    {
        $error = "*ALL fields MUST be FILLED<br><br>";
    }
}
?>
<head>
  <title>Add Student</title>
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
    Welcome <?php echo $name; ?>!!<br   >
    <a href="admin.php"><-back</a>
    <hr>
    <div class = "container">
    <h2>Add Student</h2>
        <?php echo $success; ?>
    <form action="add_student.php" method="post">
        Name : <input type="text" name="sname"><br><br>
        Date of Birth : <input type="date" name="dob"><br><br>
        Sex : <input type="text" name="sex"><br><br>
        CID : <input type="text" name="cid"><br><br>
        <?php echo $error; ?>
        <input type="submit" value="ADD">
    </form>
    </div>
</body>
</html>