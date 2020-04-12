<?php
    if(isset($_POST["signupfetch-submit"]))
    {

        require "dbh.inc.php";

        session_start();
        $_SESSION = array();
        
        $rollnumber = $_POST["rollno"];
        $_SESSION['roll']= $rollnumber;

        if(empty($rollnumber))
        {
            header("Location: ../signup.php?error=emptyfields&rollno=".$rollnumber);
            exit();
        }
        /*else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-z A-Z]*$/",$name)){
            header("Location: ../signup.php?error=invalidname_and_email&rollno=".$rollnumber);
            exit();
        }
        else if(!preg_match("/^[a-z A-Z]*$/",$name)){
            header("Location: ../signup.php?error=invalidname&rollno=".$rollnumber."&e-mail=".$email);
            exit();
        }
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            header("Location: ../signup.php?error=invalidemail&uname=".$name."&rollno=".$rollnumber);
            exit();
        }
        else if($password !== $repassword){
            header("Location: ../signup.php?error=passwordcheck&uname=".$name."&rollno=".$rollnumber."&e-mail=".$email);
            exit();
        }*/
        else{
           
            /*$_SESSION["gotologin"]=1;*/
            $sql = "SELECT * FROM student_userdata WHERE roll_no=$rollnumber";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "Some unwanted error occurred here!";
                exit();
            }
            else{
                //mysqli_stmt_bind_param($stmt,"s", $_SESSION['roll']);
                //mysqli_stmt_execute($stmt);
                //$result = mysqli_stmt_get_result($stmt);
                $_SESSION["gologindiv"]="none";
                $_SESSION["registerdiv"]="block";
                $_SESSION["not_registerdiv"]="none";
                
                $result = $conn->query($sql);
               
                 if($result->num_rows > 0)  
                 {
                while($row = $result->fetch_assoc())
                {
                    
                    $_SESSION["show_rollno"] = $row["roll_no"];
                    $_SESSION["Full_name"] = $row["Full_name"];
                    //$_SESSION["Course_code"]= $row["Course_code"];
                    $_SESSION["course_name"]= $row["course_name"];
                    $_SESSION["department"]= $row["department"];
                    $_SESSION["faculty"]= $row["faculty"];
                    $_SESSION["reg_status"] = $row["reg_status"];
                    $_SESSION["result"]=1;
                    if($_SESSION["reg_status"]=="Y")
                     {
                    
                       $_SESSION["registerdiv"]="none";
                       $_SESSION["gologindiv"]="block";
                       

                     }
                     
                     echo $_SESSION["show_rollno"];
                     $_SESSION["not_registerdiv"]="none";
                     
                     header("Location: ../fetchstudent.php");
                    
                    
                }
              }
                else{
                    echo "Some unwanted error occurred not!";
                    header("Location: ../fetchstudent.php");
                    $_SESSION["not_registerdiv"]="block";
                    $_SESSION["registerdiv"]="none";
                }
            }
                
                
            
            
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
    }
    else{
        header("Location: ../signup.php");
    }