
<?php

include('../config_phpfiles/config.php');





$rollno=$_POST["rollno"];
$sql ="SELECT roll_no, Full_name, Course_code,course_name,department,faculty FROM student_userdata WHERE roll_no=$rollno";

$result = $conn->query($sql);



if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        
    
    $show_rollno = $row["roll_no"];
    $show_name= $row["Full_name"];
    $coursecode= $row["Course_code"];
    $show_coursename= $row["course_name"];
    $show_dept= $row["department"];
    $show_faculty= $row["faculty"];
    
}



 } else 
{
  echo "0 result found";  

}








$conn->close();
?>






<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Check your basic details</title>

    <!-- Core CSS - Include with every page -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    
    

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Check your basic details and Proceed</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="#" method="POST">
                            <fieldset>
                                
                            <p> Roll No : <?=$show_rollno?></p>    
                            <p> Name : <?=$show_name?></p>
                            <p> CMS code : <?=$coursecode?></p>
                            <p> Course Name : <?=$show_coursename?></p>
                            <p> Department of <?=$show_dept?> ,<?=$show_faculty?></p>
                            <p> </p>
                            
                           
                            <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Proceed to Registration</button>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

</body>

</html>

