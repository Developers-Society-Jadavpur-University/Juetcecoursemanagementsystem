
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
  $result=0;
  
    

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
    <style>
  #student_notregistered_div{
    <?php
      if($result==0)
          {
              echo 'display:block';
          }
          else
          {
              echo 'display:none';
          }
    ?>
  }
  #student_registered_div{
    <?php
      if($result==0)
          {
              echo 'display:none';
          }
          else
          {
              echo 'display:block';
          }
    ?>
  }
</style>
    
    

</head>

<body>

    <div class="container" id="student_registered_div">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" >
                <div class="login-panel panel panel-default" >
                    <div class="panel-heading">
                        <h3 class="panel-title">Check your basic details and Proceed</h3>
                    </div>
                    <div class="panel-body" >
                        <form role="form" action="./registerstud.php" method="POST">
                            <fieldset>
                                
                            <p> Roll No : <?=$show_rollno?></p>    
                            <p> Name : <?=$show_name?></p>
                            <p> CMS code : <?=$coursecode?></p>
                            <p> Course Name : <?=$show_coursename?></p>
                            <p> Department of <?=$show_dept?> ,<?=$show_faculty?></p>

                            <h4>If the above details are correct then enter the following and press the click to Register button otherwise contact system administrator.</h4>
                            
                            <div class="form-group">
                                    <input class="form-control" placeholder="Enter your mobile number" name="mobno" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                    <input class="form-control" placeholder="Enter your email" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                    <input class="form-control" placeholder="Enter password" name="password" type="password" autofocus>
                            </div>
                            
                           
                            <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Click to Register</button>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--If student is not registered manually in database-->
    <div class="container" id="student_notregistered_div" >
        <div class="row">
            <div class="col-md-4 col-md-offset-4" >
                <div class="login-panel panel panel-default" >
                    <div class="panel-heading">
                        <h3 class="panel-title">Check your basic details and Proceed</h3>
                    </div>
                    <div class="panel-body" >
                        <form role="form" action="./registerstud.php" method="POST">
                            <fieldset>
                                
                            
                            <h4>Student Details not found in database please contact system Admin or Your Roll no is incorrect</h4>
                            
                            
                           
                            <!-- Change this to a button or input when using this as a form -->
                                <a href="../register.php" class="btn btn-lg btn-success btn-block">Try Again</a>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <!--Not registered div ends here-->

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

</body>

</html>

