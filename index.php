<!DOCTYPE html>
<html lang="en">
<head>
    <title>MyCollege Attendance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="table3.css">
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
            </ul>
        </div>
    </nav>
    <div class="container">
        <div  style="width: 50%;margin: 0 auto; ">
            Stream:         <select id="stream" name="stream" style="width:150px; height:30px;"></select>
            Year:           <select id="year" name="year" style="width:150px; height:30px;"></select><br /><br />
            Section:        <select id="section" name="section" style="width:150px; height:30px;"></select>
            Roll Number:    <input type="text" name="sid" placeholder="Enter Roll No." style="width:100px;height:30px"><br /><br />
            <div  style="width: 60%;margin: 0 auto; ">
                <input type="submit" value="View Attendance" style="padding:6px; "><br><br>                 
                <input type="submit" value="View Time Table" style="padding:6px;" id="submit-time-table">
            </div>
        </div>
        <hr>
        <div class="container">
            <div id="timetable"></div>
            <script type="text/javascript"> 
                var years = ["1", "2", "3", "4"];
                var sections = ["A", "B"];
                var depts = ['CSE', 'ECE', 'IT'];
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
                for(var i = 0; i < depts.length; i++)
                {
                    option1 += "<option value='"+depts[i]+"'>"+depts[i]+"</option>";
                }
                $("select#section").html(option3);
                $("select#year").html(option2);
                $("select#stream").html(option1);
                $('input#submit-time-table').on('click', function(){
                    var subArray = new Array();
                    var teachArray = new Array();
                    var cid = $("select#stream").val().substr(0,2)+$("select#year").val()+$("select#section").val();
                    $.ajax({
                        type:"POST",
                        url:"getTT.php",
                        data:{
                            cid:cid
                        },
                        dataType:"json",
                        success: function(data){
                            $("#timetable").html(data);
                            var s = "";
                            var count = 0;
                            subArray = data[0];
                            teachArray = data[1];
                            var periods = [1,2,3,4,5,6];
                            var days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
                            s = s +("<table width='100%'><tr><thead><td width = '10%'>"+cid+"</td>")
                            for(var p = 0; p < periods.length; p++){
                                s = s + ("<td width = '15%' bgcolor='#99CCFF'>" + (p+1) + " Period</td>");
                            }
                            s = s + ("</thead></tr>");   
                            for(var i = 0; i < days.length; i++){
                                s = s + ("<tr><td width:'10%' bgcolor='#FFCC99'>" + days[i] + "</td>");
                                for(var j = 0; j < periods.length; j++){
                                    s = s + "<td width:'15%' bgcolor='#CCFF99'>"+subArray[count]+"<br>("+teachArray[count]+")</td>";
                                    count++;
                                }
                                s = s + ("</tr>")
                            }
                            s = s + ("</table>");
                            $("#timetable").html(s);
                            s="";
                        }
                    });
                });
            </script>
        </div>
    </div>
    
</body>
</html>