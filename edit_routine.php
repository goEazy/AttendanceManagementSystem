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
            Stream 
            <select style="width:180px; height:30px" id="stream">
                <script>
                    var streams = ["CSE","ECE","IT"];
                    for(var i = 0; i < streams.length; i++)
                    {
                        document.write("<option value = '"+streams[i]+"'>"+streams[i]+"</option>");
                    }
                </script>
            </select>
            Year
            <select style="width:180px; height:30px" id="year">
                <script>
                        var years = ["1", "2", "3", "4"];
                        for(var i=0; i < years.length; i++)
                        {
                            document.write("<option value = '"+years[i]+"'>"+years[i]+"</option>");
                        }
                </script>
            </select>
            Section 
            <select style="width:180px; height:30px" id="section">
                <script>
                    var sections = ['A','B'];
                    for(var i=0; i < sections.length; i++)
                    {
                        document.write("<option value = '"+sections[i]+"'>"+sections[i]+"</option>");
                    }
                </script>
            </select>
            <input type="submit" id="submit-branch">
            <br><br>
            <div id="routine-div"></div>
                <script>
                    var tids= new Array();
                    var s = "";
                    $("input#submit-branch").on('click',function(){
                        var brch = $('select#stream').val();
                        var year = $('select#year').val();
                        var section = $('select#section').val();
                        $.ajax({
                            type:"POST",
                            url:"getTeacher.php",
                            data:{dept:brch},
                            dataType:"json",
                            success:function(data){
                                tids = data;    
                                var periods = [1,2,3,4,5,6];
                                var days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
                                s = s +("<table><tr><thead><td width = '15%'>"+brch+"</td>")
                                for(var p = 0; p < periods.length; p++){
                                    s = s + ("<td width = '15%' bgcolor='#99CCFF'>"+(p+1) + " Period</td>");
                                }
                                s = s + ("</thead></td>");   
                                for(var i = 0; i < days.length; i++){

                                    s = s + ("<tr><td bgcolor='#FFCC99'>" + days[i] + "</td>");
                                    for(var j = 0; j < periods.length; j++){
                                        s = s + ("<td bgcolor='#CCFF99'><input type='text' placeholder = 'Subject' style = 'width:150px' id='s"+i+""+j+"'>");
                                        s = s + ("<select style='width:150px' id='t"+i+""+j+"'>");
                                        for(var k=0; k<tids.length;k++){
                                            s = s + ("<option value='"+tids[k]+"'>"+tids[k]+"</option>");
                                        }
                                        s = s + ("</select></td>");
                                    }
                                    s = s + ("</tr>")
                                }

                                s = s + ("</table><br><input type='button' value='Update' id='submit-update'>"); 
                                $("#routine-div").html(s);
                                s="";
                                var q="";
                                var flag = 1;
                                $('input#submit-update').on('click', function(){
                                    var sn = new Array();
                                    var fi = new Array();
                                    var count = 0;
                                    for(var x = 0; x < days.length; x++){
                                        for(var y = 0; y < periods.length; y++){
                                            var sb = "input#s"+x+""+y;
                                            var tt = "select#t"+x+""+y;
                                            sn[count] = $(sb).val();
                                            if((sn[count])==""){
                                                flag=0;
                                            }
                                            fi[count] = $(tt).val();
                                            count++;
                                        }
                                    }
                                    if(flag == 0){
                                        alert("Fill in all details!!");
                                    }
                                    else{
                                        $.ajax({
                                            type:"POST",
                                            url:"rUpdate.php",
                                            data:{
                                                dept:brch,
                                                section:section,
                                                year:year,
                                                subn:sn,
                                                fid:fi
                                            },
                                            //dataType:"json",
                                            success:function(data){
                                                $("#routine-div").html(data);
                                                }
                                        });
                                    }
                                    
                                });
                            }
                        });
                    });


                </script>
        </div>
    </body>
</html>