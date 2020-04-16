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
                                        <select name="visibility" id="visibility">
                                            <option value="open">OPEN</option>
                                            <option id="req_auth" value="requires authentication">REQUIRES AUTHENTICATION</option>
                                        </select>
                                    <br><br>
                    <input type="checkbox" value="ALL" id="check_student">&nbsp;</input><br>
                    Date-Time of Expiry<br><input name="exp_date" type="date" placeholder ="dd/mm/yyyy">&emsp;
                    <input type="time" name="exp_time" value="00:00"><br><br>
                    <button class="submit-buttons" type="submit" name="issue-notice-submit"><b>Issue</b></button>
                </form>
            </section>
            <script>
                var check_student = document.getElementById("check_student");
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
                check_student.style.display = "none";
                req_auth.addEventListener("click", function (){
                    check_student.style.display = "block";
                }
                );
                visibility.addEventListener("change", function (){
                    if(visibility.value == "open")
                        check_student.style.display = "none";
                }
                );
            </script>
    </div>
    <?php require "../footer.php"; ?>
</body>
</html>