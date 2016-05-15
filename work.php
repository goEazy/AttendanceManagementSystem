<?php
require "connect.php";
$pqr = array();
$year = $_POST['year'];
$section = $_POST['section'];
$branch = $_POST['branch'];
$cid = $branch.$year.$section;
$query="SELECT sname,sid FROM student WHERE cid = '$cid'";
if($query_run = mysql_query($query))
{
    $rows = mysql_num_rows($query_run);
    for($x = 0; $x < $rows; $x++)
    {
        $pqr[0][$x] = mysql_result($query_run, $x, 'sid');
        $pqr[1][$x] = mysql_result($query_run, $x, 'sname');
    }
    
}
echo json_encode($pqr);
exit();
?>

