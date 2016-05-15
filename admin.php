<!DOCTYPE html>

<?php
session_start();
if(!(@$name = $_SESSION['name']))
{
    //die("Please Login To Continue");
    //echo "back";
    header('Location: logadmin.php');
}
    

?>
<html lang="en">
<head>
  <title>ADMIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <script language = "javascript" type="text/javascript">
        function add_teacher()
        {
            window.location.href = "add_teacher.php";
        }
        function add_student()
        {
            window.location.href = "add_student.php";
        }
        function change_routine()
        {
            window.location.href = "edit_routine.php";
        }
        function edit_teacher()
        {
            window.location.href = "view_teacher.php";
        }
        function edit_student()
        {
            window.location.href = "view_student.php";
        }
    </script>
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
    Welcome <?php echo $name; ?>!<hr>
    <input type="button" value="ADD TEACHER" name="a_teacher" onclick="add_teacher()">
    <input type="button" value="ADD STUDENT" name = "a_student"onclick="add_student()">
    <input type="button" value="CHANGE/ADD ROUTINE" name = "routine"onclick="change_routine()">
    <input type="button" value="EDIT STUDENT" name="e_student" onclick="edit_student()">
    <input type="button" value="EDIT TEACHER" name="e_teacher" onclick="edit_teacher()">
</body>
</html>