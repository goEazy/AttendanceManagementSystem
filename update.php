<?php
require 'connect.php';
$msg="";
$datex = $_POST['datex']; 
$roll = $_POST['roll'];
$present = $_POST['rbc'];
$tid=$_POST['tid'];
$sub_name = $_POST['sub_name'];
$query = "SELECT subid FROM subject WHERE sub_name='".$sub_name."' AND tid='".$tid."'";
if($query_run=mysql_query($query))
{
    $rows = mysql_num_rows($query_run);
    $subid = mysql_result($query_run,0,'subid');
}
for($x=0;$x<count($present);$x++)
{
    if($present[$x] == 'Y')
    {
        $query2 = "INSERT INTO atten VALUES('$datex','$subid','$roll[$x]')";
        if(mysql_query($query2))
        {
            $msg = "Updated";
        }
        else
        {
            $msg = "Cannot be Updated Now.. Please Contact Administrator..".$subid;
            break;
        }
    }
}
echo ($msg);
exit();
?>