<!DOCTYPE html>
<?php
$error = "";
require 'connect.php';
session_start();
if(!(@$name = $_SESSION['name']))
{
    //die("Please Login To Continue");
    //echo "back";
    header('Location: index.php');
}
    
?>
<html lang="en">
<head>
    <title>Student List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="table.css">
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
                <li><a href="logout.php">logout</a></li>
            </ul>
        </div>
    </nav>
    Welcome <?php echo $name; ?>!!<br>
    <a href="admin.php"><-back</a>
    <hr>
    <div class="container">
        <div  style="width: 50%;margin: 0 auto; ">
            <form action="view_student.php" method = "post">
                Select Department <input type="text" name = "cid"> <br><br>
                <div  style="width: 50%;margin: 0 auto; ">
                    <input type="submit" value="View" style="padding:6px; "><br><br>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="container">
    <table border = "1" style="width:20%; pading:15px; text-align:center;">
        <?php
        
        if(isset($_POST['cid']))
        {
            $cid = $_POST['cid'];
            if(!empty($cid))
            {
                $query = "select sname,sid FROM student WHERE cid = '$cid'";
                if($query_run = mysql_query($query))
                {
                     $query_num_rows = mysql_num_rows($query_run);
                     if($query_num_rows == 0)
                     {
                         $error = "NO records found!!";
                         echo $error;
                     }
                    else
                    {
                        
                        for($x = 0; $x < $query_num_rows; $x++)
                        {
                            echo "<tr>";
                            $sid = mysql_result($query_run, $x, 'sid');
                            $sname = mysql_result($query_run, $x, 'sname');
                            
                            echo "<td>".$sid."</td>";
                            echo "<td>".$sname."</td>";
                            echo "</tr>";
                        }
                        
                    }
                }
            }
        }
        ?>
    </table>
        </div>
</body>
</html>