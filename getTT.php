<?php
require 'connect.php';
$cid = $_POST['cid'];
$query = "SELECT sub_name, tid FROM time_table WHERE cid = '$cid'";
if($query_run = mysql_query($query)){
    $msg = array();
    $rows = mysql_num_rows($query_run);
    for($x = 0; $x < $rows ; $x++){
        $msg[0][$x] = mysql_result($query_run, $x, 'sub_name');
        $msg[1][$x] = mysql_result($query_run, $x, 'tid');
    }
    echo json_encode($msg);
}
else
{
    $msg = "Some problem in Server.. Contact Administrator..";
    echo $msg;
}

?>