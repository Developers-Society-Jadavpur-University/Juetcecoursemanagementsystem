<?php 

    session_start();
    require "dbh.inc.php";
    date_default_timezone_set('Asia/Kolkata'); 
    if(isset($_POST['issue-notice-submit'])){
       
        $result = mysqli_query($conn, "SELECT max(notice_id) AS last_id FROM stu_notice");
        $row = mysqli_fetch_assoc($result);
        $noticeId = explode("/",$row['last_id']);
        $noticeId[1] = intval($noticeId[1]) + 1; 
        $notice_id = implode("/",$noticeId);
        $notice = $_POST['details'];
        if(isset($_POST['attach'])){
            $checkbox = $_POST['attach'];
        }
        $visibility = "ALL"/*$_POST['visibility']*/;
        $datetimeExp = $_POST['exp_date']." ".$_POST['exp_time'];
        $date_time = date("Y-m-d H:i:s");
        $fileId = "";
        $notice_status = "open";
        $fileActualExt = "";

        if ($checkbox == "on"){

            $sql = "SELECT max(file_id) AS id FROM stu_notice;";
            $result = mysqli_query($conn, $sql);

            if ($row = mysqli_fetch_assoc($result)){
                $fileId = $row['id'] + 1; 
            }
                    
            $file = $_FILES["notice"];

            $fileName = $_FILES["notice"]['name'];
            $fileType = $_FILES["notice"]['type'];
            $fileTmpName = $_FILES["notice"]['tmp_name'];
            $fileError = $_FILES["notice"]['error'];
            $fileSize = $_FILES["notice"]['size'];

            $stream = explode("/",$notice_id);
            $actualStream = $stream[0];
            $count = $stream[1];

            $fileExt = explode(".",$fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileAllowed = array('pdf','txt','docx');

            if(in_array($fileActualExt, $fileAllowed)){
                if($fileError === 0){
                    if ($fileSize < 10000000){
                        $fileNameNew = "notice".".".$actualStream."_".$count.".".$fileId.".".$fileActualExt;
                        $fileDestination = "../notice_uploads/".$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                    }else{
                        echo "File size is too big!";
                        exit();
                    }
                }else{
                    echo "Some error occurred, try again!";
                    exit();
                }
            }else{
                echo "You cannot upload file of this type!";
                exit();
            }
        }
        

        if(empty($notice)||empty($_POST['exp_date'])){
            header("Location: ../admin_dashboard/issue_new_notice_admin.php?error=emptyfields");
            exit();
        }else{

            if ($fileId !== ""){
                //mysqli_query($conn, "INSERT INTO notice_uploads VALUES($fileId, $fileActualExt);");
                $sql = "INSERT INTO notice_uploads VALUES(?,?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sql)){
                    echo "Some unwanted error occurred!";
                    exit();
                }else{
                    mysqli_stmt_bind_param($stmt,"ss",$fileId,$fileActualExt);
                    mysqli_stmt_execute($stmt);
                }
            }
            $sql = "INSERT INTO stu_notice VALUES(?,?,?,?,?,?,?);";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)){
                echo "Some unwanted error occurred!";
                exit();
            }else{
                mysqli_stmt_bind_param($stmt,"sssssss",$notice_id,$date_time,$datetimeExp,$notice,$fileId,$visibility,$notice_status);
                mysqli_stmt_execute($stmt);
                header("Location: ../admindashboard.php?notice_issue=success");
                exit();
            }
        }
    }