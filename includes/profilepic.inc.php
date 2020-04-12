<?php

    session_start();

    if(isset($_POST['change-pic-submit'])){

        require "dbh.inc.php";

        $file = $_FILES['picture'];
        
        $fileName = $_FILES['picture']['name'];
        $fileTmpName = $_FILES['picture']['tmp_name'];
        $fileSize = $_FILES['picture']['size'];
        $fileError = $_FILES['picture']['error'];
        $fileType = $_FILES['picture']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($fileActualExt, $allowed)){
            if ($fileError === 0){
                if($fileSize < 500000){
                    $fileNameNew = "profile".$_SESSION['roll'].".".$fileActualExt;
                    $fileDestination = '/opt/lampp/htdocs/uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $sql = "UPDATE profileimg SET status_name = 0, ext = ? WHERE user_rno =?;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        echo "Some unwanted error occurred!";
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt, 'ss', $fileActualExt, $_SESSION['roll']);
                        mysqli_stmt_execute($stmt);
                    }
                    header("Location: ../dashboard.php?pictureupdate=success");
                }
                else{
                    echo "Exceeded file size-limit!";
                }
            }else{
                echo "There was an error uploading your file!";
            }
        }else{
            echo "You cannot upload files of this type!";
        }
    }