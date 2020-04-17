<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <title>Issue New Notice</title>
</head>
<body>
    <?php 
        require "../header.php";
        require "../admin_dashboard/cms-nav_admin.php";
    ?>
    <div class="container">
        <h3 class="heading"> Issue New Notice </h3>
            <section class="entry" id="issue_notice">
                <form action="../includes/issue_notice.inc.php" method="post" enctype="multipart/form-data" class="left">
                    Notice Details:<br><textarea name="details" rows="5" cols="30"></textarea><br><br> 
                    <input type="checkbox" id="attach" name="attach">&nbsp;Attach File (Optional):<br>
                    <input type="file" name="notice" id="notice-file"><br><br>
                    Notice Visibility:<br>
                                        <select onchange="myFunction();myFunctionfaculty();" name="visibility" id="visibility">
                                            <option value="open">OPEN</option>
                                            <option id="req_auth" value="requires authentication">REQUIRES AUTHENTICATION</option>
                                        </select>
                                    <br><br>
                    <div id = "select">
                        <p>STUDENTS</p>
                        <input type="checkbox" value="STUDENT_ALL" name="STUDENT_ALL" id="check_student" checked onchange="myFunction();">&nbsp;ALL<br>
                        <?php
                            require "../includes/dbh.inc.php";
                            $result = mysqli_query($conn, "SELECT course_code FROM batch_info WHERE status_course=1");
                            $count=0;
                            foreach ($result as $row){
                                $count++;
                                $val = $row['course_code'];
                                echo "&emsp;<input type='checkbox' onchange='changebox();' value=".$val.
                                " name='".$val."' id=".$val.">&nbsp;".$val."<br>";
                            }
                        ?><br><br>
                        <p>FACULTY</p>
                        <input type="checkbox" value="FACULTY_ALL" name="FACULTY_ALL" id="check_faculty" checked onchange="myFunctionfaculty();">&nbsp;ALL<br>
                        <?php
                            require "../includes/dbh.inc.php";
                            $result = mysqli_query($conn, "SELECT uname FROM users_staff WHERE staff_role='faculty'");
                            $fcount=0;
                            foreach ($result as $row){
                                $fcount++;
                                $val = $row['uname'];
                                $val_name = strtolower(trim($val));
                                $val_name = str_replace(' ','',$val_name);
                                echo "&emsp;<input type='checkbox' onchange='changeboxfaculty();' value=".$val.
                                " name=".$val_name." id=".$val.">&nbsp;".$val."<br>";
                            }
                        ?><br><br>

                    </div>
                    Date-Time of Expiry<br><input name="exp_date" type="date" placeholder ="dd/mm/yyyy">&emsp;
                    <input type="time" name="exp_time" value="00:00"><br><br>
                    <button class="submit-buttons" type="submit" name="issue-notice-submit"><b>Issue</b></button>
                </form>
            </section>
            <script>
                var elements = $('input[type=checkbox]');
                function myFunction(){
                    if (document.getElementById('visibility').selectedIndex === 1){
                        var count = <?=json_encode($count)?>;
                        if(elements[1].checked === true){                            
                            for(var i=2; i<=count+1 ;i++){
                                elements[i].checked = true;
                            }
                        }
                        if(elements[1].checked === false){                            
                            for(var i=2; i<=count+1 ;i++){
                                elements[i].checked = false;
                            }
                        }
                    }
                }
                function changebox(){
                    if (document.getElementById('visibility').selectedIndex === 1){
                        var count = <?=json_encode($count)?>;
                        var i;
                        for(i=2; i<=count+1; i++){
                            if(elements[i].checked === false){
                                elements[1].checked = false;
                                break;
                            }
                        }
                        if(i > (count+1)){
                            elements[1].checked = true;
                        }
                    }
                }

                function myFunctionfaculty(){
                    if (document.getElementById('visibility').selectedIndex === 1){
                        var count = <?=json_encode($count)?>;
                        var fcount = <?=json_encode($fcount)?>;
                        if(elements[count+2].checked === true){                            
                            for(var i=count+3; i<count+3+fcount ;i++){
                                elements[i].checked = true;
                            }
                        }
                        if(elements[count+2].checked === false){                            
                            for(var i=count+3; i<count+3+fcount ;i++){
                                elements[i].checked = false;
                            }
                        }
                    }
                }
                function changeboxfaculty(){
                    if (document.getElementById('visibility').selectedIndex === 1){
                        var count = <?=json_encode($count)?>;
                        var fcount = <?=json_encode($fcount)?>;
                        var i;
                        for(var i=count+3; i<count+3+fcount ;i++){
                            if(elements[i].checked === false){
                                elements[count+2].checked = false;
                                break;
                            }
                        }
                        if(i > (count+fcount+2)){
                            elements[count+2].checked = true;
                        }
                    }
                }

                var selection = document.getElementById("select");
                var visibility = document.getElementById("visibility");
                var req_auth = document.getElementById("req_auth");
                var attach = document.getElementById("attach");
                var attach_file = document.getElementById("notice-file");
                attach_file.style.display = "none";
                attach.addEventListener("click", function(){
                    if(attach.checked){
                        attach_file.style.display = "block";
                    }else{
                        attach_file.style.display = "none";
                    }
                });
                selection.style.display = "none";
                req_auth.addEventListener("click", function (){
                    selection.style.display = "block";
                }
                );
                visibility.addEventListener("change", function (){
                    if(visibility.value == "open")
                        selection.style.display = "none";
                }
                );
            </script>
    </div>
    <?php require "../footer.php"; ?>
</body>
</html>