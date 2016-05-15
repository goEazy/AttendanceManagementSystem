<?php
require 'connect.php';
session_start();
$stream = $_SESSION['stream'];
$section = $_SESSION['section'];
$year = $_SESSION['year'];
$sid = $_SESSION['sid'];
$sname = $_SESSION['sname'];
?>
<html lang="en">
<head>
    <title>MyCollege Attendance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="table2.css">
</head>
    <body>
        <div  style="width: 50%;margin: 0 auto; ">
            <h1> RAMDEV COLLEGE OF ENGINEERING</h1>
        </div>
        <hr>
        <h3>Welcome <?= $sname.", ".$stream.", ".$year." year, Section ".$section ?> </h3>
        <div class="container">
            <table style="font-size: small; color: #000000;" border="1" align="center">
                <tr align="center">
                    <td rowspan="2">
                        <span lang="en-us">SUBJECT</span></td>
                    <td colspan="2" >
                        <span lang="en-us">JANUARY </span></td>
                    <td colspan="2">
                        <span lang="en-us">FEBRUARY </span></td>
                    <td colspan="2" >
                        <span lang="en-us">MARCH </span></td>
                    <td colspan="2" >
                        <span lang="en-us">APRIL </span></td>
                    <td colspan="2">
                        <span lang="en-us">MAY </span></td>
                    <td colspan="2">
                        <span lang="en-us">JUNE </span></td>    
                    <td colspan="2"><span lang="en-us">TOTAL</span></td>     
                </tr>
                <tr>
                    <td align="center">
                        <span lang="en-us">A/D</span></td>
                    <td  align="center">
                        <span lang="en-us">Perc</span></td>
                    <td align="center">
                        <span lang="en-us">A/D</span></td>
                    <td align="center">
                        <span lang="en-us">Perc</span></td>
                    <td  align="center">
                        <span lang="en-us">A/D</span></td>
                    <td  align="center">
                        <span lang="en-us">Perc</span></td>
                    <td  align="center">
                        <span lang="en-us">A/D</span></td>
                    <td  align="center">
                        <span lang="en-us">Perc</span></td>
                    <td  align="center">
                        <span lang="en-us">A/D</span></td>
                    <td  align="center">
                        <span lang="en-us">Perc</span></td>
                    <td  align="center">
                        <span lang="en-us">A/D</span></td>
                    <td  class="style4">
                        <span lang="en-us">Perc</span></td>
                    <td  align="center">
                        <span lang="en-us">A/D</span></td>
                    <td  class="style4">
                        <span lang="en-us">Perc</span></td>    
                </tr>
                <tr>    
                    <td>OPERATING SYSTEM&nbsp</td>
                    <td align ="center">4/10&nbsp</td>
                    <td align ="center">40&nbsp</td>
                    <td align ="center">5/11&nbsp</td>
                    <td align ="center">45 &nbsp</td>
                    <td align ="center">13/13&nbsp</td>
                    <td align ="center">100&nbsp</td>
                    <td align ="center">4/4&nbsp</td>
                    <td align ="center">100&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">26/37&nbsp</td>
                    <td align ="center">70&nbsp</td>
                </tr>
                <tr>    
                    <td>COMPUTER NETWORKS&nbsp</td>
                    <td align ="center">1/3&nbsp</td>
                    <td align ="center">33&nbsp</td>
                    <td align ="center">5/8&nbsp</td>
                    <td align ="center">62&nbsp</td>
                    <td align ="center">4/4&nbsp</td>
                    <td align ="center">100&nbsp</td>
                    <td align ="center">1/1&nbsp</td>
                    <td align ="center">100&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">11/15&nbsp</td>
                    <td align ="center">73&nbsp</td>
                </tr>
                <tr>    
                    <td>DATABASE MANAGEMENT SYSTEM&nbsp</td>
                    <td align ="center">2/5&nbsp</td>
                    <td align ="center">40&nbsp</td>
                    <td align ="center">4/6&nbsp</td>
                    <td align ="center">66&nbsp</td>
                    <td align ="center">7/7&nbsp</td>
                    <td align ="center">100&nbsp</td>
                    <td align ="center">1/1&nbsp</td>
                    <td align ="center">100&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">14/19&nbsp</td>
                    <td align ="center">73&nbsp</td>
                </tr>
                <tr>    
                    <td>MULTIMEDIA TECHNOLOGY&nbsp</td>
                    <td align ="center">6/13&nbsp</td>
                    <td align ="center">46&nbsp</td>
                    <td align ="center">10/17&nbsp</td>
                    <td align ="center">58&nbsp</td>
                    <td align ="center">12/13&nbsp</td>
                    <td align ="center">92.31&nbsp</td>
                    <td align ="center">2/3&nbsp</td>
                    <td align ="center">66.67&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">30/45&nbsp</td>
                    <td align ="center">66.67&nbsp</td>
                </tr>
                <tr>    
                    <td>COMPUTER GRAPHICS&nbsp</td>
                    <td align ="center">8/13&nbsp</td>
                    <td align ="center">61.54&nbsp</td>
                    <td align ="center">5/15&nbsp</td>
                    <td align ="center">33.33&nbsp</td>
                    <td align ="center">16/17&nbsp</td>
                    <td align ="center">94.12&nbsp</td>
                    <td align ="center">3/3&nbsp</td>
                    <td align ="center">100&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">32/48&nbsp</td>
                    <td align ="center">66.67&nbsp</td>
                </tr>
                <tr>    
                    <td>OPERATING SYSTEM(LAB)&nbsp</td>
                    <td align ="center">4/10&nbsp</td>
                    <td align ="center">40&nbsp</td>
                    <td align ="center">6/12&nbsp</td>
                    <td align ="center">50&nbsp</td>
                    <td align ="center">15/15&nbsp</td>
                    <td align ="center">100&nbsp</td>
                    <td align ="center">3/3&nbsp</td>
                    <td align ="center">100&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">28/40&nbsp</td>
                    <td align ="center">70&nbsp</td>
                </tr>
                <tr>    
                    <td>COMPUTER NETWORKS(LAB)&nbsp</td>
                    <td align ="center">2/10&nbsp</td>
                    <td align ="center">20&nbsp</td>
                    <td align ="center">5/13&nbsp</td>
                    <td align ="center">38.46&nbsp</td>
                    <td align ="center">14/14&nbsp</td>
                    <td align ="center">100&nbsp</td>
                    <td align ="center">3/3&nbsp</td>
                    <td align ="center">100&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">24/38&nbsp</td>
                    <td align ="center">63.16&nbsp</td>
                </tr>
                <tr>    
                    <td>DATABASE MANAGEMENT SYSTEM(LAB)&nbsp</td>
                    <td align ="center">4/10&nbsp</td>
                    <td align ="center">40&nbsp</td>
                    <td align ="center">6/16&nbsp</td>
                    <td align ="center">37.5&nbsp</td>
                    <td align ="center">12/12&nbsp</td>
                    <td align ="center">100  &nbsp</td>
                    <td align ="center">4/4&nbsp</td>
                    <td align ="center">100 &nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center"> &nbsp</td>
                    <td align ="center">&nbsp</td>
                    <td align ="center">  &nbsp</td>
                    <td align ="center">26/42&nbsp</td>
                    <td align ="center">61.9&nbsp</td>
                </tr>
                <tr bgcolor="#99CCFF">
                    <td align="center">TOTAL</td>
                    <td align="center">31/74 </td>
                    <td align="center">41.89 </td>
                    <td align="center">46/98 </td>
                    <td align="center">46.94  </td>
                    <td align="center">93/95 </td>
                    <td align="center">97.89 </td>
                    <td align="center">21/22 </td>
                    <td align="center">95.45 </td>
                    <td align="center"></td>
                    <td align="center"></td>
                    <td align="center"></td>
                    <td align="center"></td>
                    <td align="center">191/289</td>
                    <td align="center">66.09</td>
                </tr>
            </table>
            Note: A is Attended, D is Delivered, Perc is Percentage
            <div  style="width: 000%;margin: 0 auto; ">
                <br><a href="index.php">Back</a>
            </div>
        </div>
    </body>
</html>