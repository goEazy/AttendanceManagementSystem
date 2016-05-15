<?php

require 'connect.php';
$sub = array();
$fid = array();
$sub = $_POST['subn'];
$fid = $_POST['fid'];
$year = $_POST['year'];
$section = $_POST['section'];
$dept = $_POST['dept'];
$day = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
$cid = substr($dept,0,2).$year.$section;
$msg = "";
$m = 0;
for($i = 0; $i < 5; $i++)
{
    for($j = 0; $j < 6; $j++)
    {
        $p = $j+1;
        $query = "INSERT INTO time_table(cid, day, period, sub_name, tid ) VALUES ('$cid','$day[$i]','$p','$sub[$m]','$fid[$m]')";  
        $m++;
        if(mysql_query($query))
        {
            $msg = "Updated";
        }
        else
        {
            $msg = "Error! Try After Some time!!";
        }
    }
}
echo $msg;

?>