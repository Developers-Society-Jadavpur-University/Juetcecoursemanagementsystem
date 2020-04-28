<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check your details</title>

<style>
  #student_notregistered_div
  {
    <?php
      if($_SESSION["result"]==0)
          {
              echo 'display:block';
          }
          else
          {
              echo 'display:none';
          }
    ?>
  }
  #student_registered_div
  {
    <?php
      if($_SESSION["result"]==0||$_SESSION["gotologin"]==1)
          {
              echo 'display:none';
          }
          else
          {
              echo 'display:block';
          }
    ?>
  }
  #student_registered_gotologin_div
  {
    <?php
      if($_SESSION["gotologin"]==1)
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
    <?php
        require "header.php";
        require "prevent_logout.php";
    ?>
    <br>

    <div class="container">
            <?php

                if(isset($_GET['error']))
                {
                    if($_GET['error'] == 'emptyfields')
                    {
                        echo "<p>No field can remain empty!</p>";
                    }
                   
                    else if($_GET['error'] == 'invalidemail')
                    {
                        echo "<p>Invalid E-mail Id!</p>";
                    }
                    else if($_GET['error'] == 'sqlerror')
                    {
                        echo "<p>Some unknown error occurred!</p>";
                    }
                    else if($_GET['error'] == 'passwordcheck')
                    {
                        echo "<p>Ensure that the entered passwords are same!</p>";
                    }
                }
            ?>
        <div id="student_registered_div" style="display:<?=$_SESSION["registerdiv"]?>;">
        <h3 class="heading">Check your details and Complete Registration</h3>
        
        <section class="entry"> 
            <form action="includes/signup.inc.php" method="post" class="left">
            <p> Roll No : <?=$_SESSION["show_rollno"]?></p>    
            <p> Name : <?=$_SESSION["Full_name"]?></p>
            <!--<p> CMS code : <?=$_SESSION["Course_code"]?></p>-->
            <p> Course Name : <?=$_SESSION["course_name"]?></p>
            <p> Department of <?=$_SESSION["department"]?> ,<?=$_SESSION["faculty"]?></p>

            <h4>If the above details are correct then enter the following and press the Sign Up button otherwise contact system administrator.</h4>
                
            E-mail:<br><input type = "email" name = "e-mail" ><br><br>
            Enter Password:<br><input type = "password" name = "pwd"><br><br>
            Re-Enter Password:<br><input type = "password" name = "rpwd"><br><br>
            <button class="submit-buttons" type = "submit" name="signup-submit">
            <b>Sign Up</b></button>&emsp;
                
            
            </form>
        </section>
        </div>

        <div id="student_registered_gotologin_div" style="display:<?= $_SESSION["gologindiv"]?>;">
        <h3 class="heading">Registration Denied !</h3>
        
        <section class="entry"> 
            
            
            <h4>You have already registered please login using your credentials</h4>
                
            
           
            <a href="login.php" class="right">Go to Login</a>
           
        </section>
        
        </div>
        
        <div id="student_notregistered_div" style="display:<?=$_SESSION["not_registerdiv"]?>;">
        <h3 class="heading">Registration Denied !</h3>
        
        <section class="entry"> 
            
            
            <h4>Student Details Not found in database please contact System Admin</h4>
                
            
            
                
            <a href="login.php" class="right">Go to Login</a>
            
        </section>
        
        </div>


    </div>
    <?php
        require "footer.php"; 
    ?>
</body>
</html>