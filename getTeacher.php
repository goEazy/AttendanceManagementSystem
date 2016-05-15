<?php

require 'connect.php';
$dept = $_POST['dept'];
$query = "SELECT tid FROM teacher WHERE dept = '$dept'";
$tarray = array();
if($query_run = mysql_query($query))
{
    
    $rows = mysql_num_rows($query_run);
    if($rows > 0)
    {
        for($x = 0; $x < $rows; $x++)
        {
            $tarray[$x] = mysql_result($query_run, $x, 'tid');
        }
    }
    echo json_encode($tarray);
}
exit();
?>