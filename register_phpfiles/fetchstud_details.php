
<?php
include('../regiser_phpfiles/registerstud.php');
include('../config_phpfiles/config.php');
session_start();
$rollno=$_POST["rollno"];
$_SESSION["rollno"] = $rollno;

$sql ="SELECT roll_no, Full_name, Course_code,course_name,department,faculty,reg_status  FROM student_userdata WHERE roll_no=$rollno";

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
    $_SESSION["fullname"] = $row["Full_name"];
    $reg_status = $row["reg_status"];

    if($reg_status=="Y")
    {
      $gotologin=1;

    }
}
}
else 
{
  
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
    <!-- BootstrapValidator CSS -->
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css"/>
    <!-- BootstrapValidator JS -->
  <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js"></script>
  
  <!-- Animated Loading Icon -->
  <style type="text/css">
  .glyphicon-refresh-animate {
      -animation: spin .7s infinite linear;
      -webkit-animation: spin2 .7s infinite linear;
  }

  @-webkit-keyframes spin2 {
      from { -webkit-transform: rotate(0deg);}
      to { -webkit-transform: rotate(360deg);}
  }

  @keyframes spin {
      from { transform: scale(1) rotate(0deg);}
      to { transform: scale(1) rotate(360deg);}
  }
  </style>
    
    
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
      if($result==0||$gotologin==1 )
          {
              echo 'display:none';
          }
          else
          {
              echo 'display:block';
          }
    ?>
  }
  #student_registered_gotologin_div{
    <?php
      if($gotologin==1)
          {
              echo 'display:block';
              
          }
          
       else
       {
           echo 'display:none';
           
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
                        
                        <form role="form" action="./registerstud.php" method="POST" enctype="multipart/form-data">
                        
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
                            
                                    <sub class="text-danger">
                                     <?php
                                         if (isset($_SESSION['ERRORS']['emailerror']))
                                             echo $_SESSION['ERRORS']['emailerror'];

                                       ?>
                                     </sub>
                            </div>
                            <div class="form-group">
                                    <input class="form-control" placeholder="Enter password" name="password" id="password" type="password" autofocus>
                            </div>
                            <div class="form-group">
                                    <input class="form-control" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" type="password" autofocus>
                                    <sub class="text-danger">
                        <?php
                            if (isset($_SESSION['ERRORS']['passworderror']))
                                echo $_SESSION['ERRORS']['passworderror'];

                        ?>
                    </sub>
                                </div>
                            
                           
                            <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block" name="reg_user">Click to Register</button>
                                
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
                        <h3 class="panel-title">Error !</h3>
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
    <!--If a student is registered already and they will have to login-->
    <div class="container" id="student_registered_gotologin_div" >
        <div class="row">
            <div class="col-md-4 col-md-offset-4" >
                <div class="login-panel panel panel-default" >
                    <div class="panel-heading">
                        <h3 class="panel-title">Resistration Denied !</h3>
                    </div>
                    <div class="panel-body" >
                        <form role="form" action="./registerstud.php" method="POST">
                            <fieldset>
                                
                            
                            <h4>You have already registered please login using your credentials</h4>
                            
                            
                           
                            <!-- Change this to a button or input when using this as a form -->
                                <a href="../index.php" class="btn btn-lg btn-success btn-block">Go to login</a>
                                
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
    <script defer src="../register_phpfiles/register_js/validation_register.js"></script>


</body>

</html>

