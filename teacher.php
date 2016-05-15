<!DOCTYPE html>
<?php 
    require 'connect.php'; 
    session_start();
    $subjects = array();
    if(!(@$name = $_SESSION['t_name'] && $_SESSION['d_name']))
    {
        //die("Please Login To Continue");
        //echo "back";
        header('Location: logteacher.php');
    }
    $t_name = $_SESSION['t_name'];
    $d_name = substr($_SESSION['d_name'], 0 ,2);
    $tid = $_SESSION['tid'];
    $query = "SELECT sub_name FROM subject WHERE tid = '$tid'";
    if($query_run = mysql_query($query))
    {
        $rows = mysql_num_rows($query_run);
        for($x = 0; $x < $rows; $x++)
        {
            $subjects[$x] = mysql_result($query_run,$x,'sub_name');
        }
    }
?>
<html lang="en">
    <head>
        <title>Teacher</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="table.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
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
                <li><a href="logout.php">logout</a></li>
            </ul>
        </div>
        </nav>
        <div class="container">
            <h4>Welcome <?php echo $t_name;?>!!</h4><br>
            <div id="branch" style="visibility:hidden"><?php echo $d_name; ?></div>
            <div style="width: 50%;margin: 0 auto; ">
                <div  style="width: 40%;margin: 0 auto; ">
                    <input type="submit" value="View My Routine" id="view-routine">
                </div>
                <div id = "routine-disp"></div>
                <script>
                    $('input#view-routine').on('click',function(){
                        
                        $("#routine-disp").html("Routine Clicked<hr>");
                    });
                </script>
                <br>
                Year            <select style="width:180px; height:30px" id="year"></select>
                Section         <select style="width:180px; height:30px" id="section"></select><br><br>
                Subject         <select style="width:180px; height:30px" id="subject"></select>
                Date            <input type="date" id="datex" style="width:180px;" value="<?php echo date("Y-m-d");?>">
                <script>
                    var years = ["1", "2", "3", "4"];
                    var sections = ["A", "B"];
                    
                    var option1 = "";
                    var option2 = "";
                    var option3 = "";
                    for(var i = 0; i < years.length; i++)
                    {
                        option2 += "<option value='"+years[i]+"'>"+years[i]+"</option>";
                    }
                    for(var i = 0; i < sections.length; i++)
                    {
                        option3 += "<option value='"+sections[i]+"'>"+sections[i]+"</option>";
                    }
                    var subjectArr = <?php echo json_encode($subjects); ?>;
                    for(var i = 0; i < subjectArr.length; i++)
                    {
                        option1 += ("<option value = '"+subjectArr[i]+"'>"+subjectArr[i]+"</option>");
                    }
                    $("select#section").html(option3);
                    $("select#year").html(option2);
                    $("select#subject").html(option1);
                </script>
                <br><br>                
                <div  style="width: 50%;margin: 0 auto; ">
                    <input type="submit" value="MARK ATTENDANCE" id="submit-atten">
                </div>
            </div>        
            <hr>
        <div  style="width: 50%;margin: 0 auto; ">
        <div id="loop"></div>
        <script>
            var yy = new Array();
            $('input#submit-atten').on('click',function(){
                var year = $('select#year').val();
                var section = $('select#section').val();
                var branch = $('#branch').html();
                var sub_name = $('select#subject').val();
                var datex = $('input#datex').val();
                 $("#lap").html("");
                $.ajax({
                    type:"POST",
                    url:"work.php",
                    data: {
                        year:year,
                        section:section,
                        branch:branch
                    },
                    dataType:"json",
                    success: function(data)
                    {
                        yy = data;
                        var s="<table><tr><th>Roll No</th><th>Student Name</th><th>Present</th><th>Absent</th></tr>";
                        var naam = new Array();
                        var roll = new Array();
                        naam = yy[1];
                        roll = yy[0];
                        for(var i=0; i < naam.length; i++)
                        {
                            s = s + "<tr><td>" + roll[i] + "</td><td>" + naam[i] + "</td>"+
                                "<td><input type='radio' value='Y' name='atten"+i+"' id='rb1"+i+"' checked></td>"+
                                "<td><input type='radio' value='N' name='atten"+i+"' id='rb2"+i+"'></td></tr>";
                        }
                        s = s + "</table><br><div  style='width: 25%;margin: 0 auto; '>"+
                            "<input id='mark-submit' type='submit' value='Update'></div>";
                        $("#loop").html(s);
                       
                        var rbc = [];
                        var teach = <?php echo json_encode($tid); ?>;
                        $('input#mark-submit').on('click', function(){
                            for(var j = 0; j < naam.length; j++)
                            {
                                var bb = "input[name='atten"+j+"']:checked";
                                rbc[j] = $(bb).val();
                                
                            }
                            $.ajax({
                                type:"POST",
                                url:"update.php",
                                data: {
                                    datex:datex,
                                    roll:roll,
                                    rbc:rbc,
                                    tid:teach,
                                    sub_name:sub_name
                                },
                               // dataType:"json",
                                success: function(data){
                                    $("#loop").html("");
                                    $("#lap").html(data);
                                }
                            });
                        });
                    }
                });
            });
        </script>
        <div id="lap"></div>
        </div>
        </div>
    </body>
</html>