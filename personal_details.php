<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Update Form</title>
</head>
<body onload="selectField()">
    <?php
        require "header.php";
        require "prevent_login.php";
        require "includes/dbh.inc.php";

        if($_SESSION['state']['1'] == 0){
            $sql = "SELECT * FROM users WHERE rno=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "Some unwanted error occurred!";
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt,"i", $_SESSION['roll']);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    $name = $row['uname'];
                    $roll = $row['rno'];
                    $email = $row['email'];
                }else{
                    echo "Some unwanted error occurred!";
                }
            }
        }else{
            $sql = "SELECT * FROM personalDetails WHERE rno=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "Some unwanted error occurred!";
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt,"s", $_SESSION['roll']);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    $name = $row['uname'];
                    $roll = $row['rno'];
                    $dob = $row['dob'];
                    $bloodGrp = $row['bloodGrp'];
                    $yJoin = $row['yJoin'];
                    $yStudy = $row['yStudy'];
                    $Stream = $row['Stream'];
                    $Gender = $row['Gender'];
                    $Category = $row['Category'];
                    $wbjeeMaths = $row['wbjeeMaths'];
                    $wbjeePhyChem = $row['wbjeePhyChem'];
                    $email = $row['stuEmail'];
                    $stuContact = $row['stuContact'];
                }else{
                    echo "Some unwanted error occurred!";
                }
            }
        }

    ?>
    <div class="profile-content">
    <div>
        
      <ul class="header" style=" background-color: orange;" >
        
        <li><div class="dropdown">
           <button onclick="dropdownfunction()" class="dropbtn">Profile Update</button>
          <div id="myDropdown" class="dropdown-content">
           <a href="personal_details.php">Personal Details</a>
           <a href="parent_details.php">Parent Details</a>
           <a href="address_details.php">Address Details</a>
          </div>
         </div>
        </li>
        <li><div class="dropdown">
             <button onclick="dropdownfunction_semester()" class="dropbtn">Semester Info</button>
            <div id="myDropdown_semester" class="dropdown-content">
             <a href="#">Semester Registration</a>
             <a href="#">Class Routine</a>
             <a href="#">Class Test Schedule</a>
             <a href="#">Class Test Results</a>
             
            </div>
           </div>
          </li>
     </ul>    
    </div>
        <section class="update-forms">
            <form action="includes/profile_update.inc.php" method="post">
                Name Of Student :<input type="text" name = "StudentName" id="stuname" required value="<?php echo $name;?>"><br><br>
                Roll Number :<input type="number" name = "rln" id="roll" required pattern = "\d*{12}" value="<?php echo $roll;?>"><br><br>
                Date Of Birth :<input type = "date" name="dob" id="dob" required placeholder="dd/mm/yyyy" ><br><br>
                Blood Group :<input type="text" name="bloodgrp" id="bloodgrp" required maxlength = 3 size = "3" ><br><br>
                Year Of Joining :<input type="number" size = "4" maxlength = 4  pattern = "[0-9]{4}" required name = "Year" id="Year"><br><br>
                Year Of Study :
                    <select required name="year" id="yStudy">
                        <option value="select">SELECT</option>
                        <option value="ug1">UG-I</option>
                        <option value="ug2">UG-II</option>
                        <option value="ug3">UG-III</option>
                        <option value="ug4">UG-IV</option>
                        <option value="pg1">PG-I</option>
                        <option value="pg2">PG-II</option>
                    </select><br><br>
                Stream :<select required name="Stream" id="stream">
                            <!--<option value="select">SELECT</option>
                            <option value="cse">COMPUTER SCIENCE ENGINEERING</option>-->
                            <option value="etce">ELECTRONICS AND TELECOMMUNICATION ENGINEERING</option>
                            <!--<option value="ee">ELECTRICAL ENGINEERING</option>
                            <option value="iee">INSTRUMENTATION AND ELECTRONICS ENGINEERING</option>
                            <option value="prode">PRODUCTION ENGINEERING</option>-->
                        </select><br><br>
                Gender :
                Male <input name ="gender" id="male" required type ="radio" value= "Male">
                Female <input name ="gender" id="female" required type ="radio" value= "Female">
                Other <input name ="gender" id="other" required type ="radio" value = "Other"><br><br>
                Category :
                    <select required name="cat" id="category">
                        <option value="select">SELECT</option>
                        <option value="general">GENERAL</option>
                        <option value="sc">SC</option>
                        <option value="st">ST</option>
                        <option value="obc">OBC</option>
                    </select><br><br>
                Wbjee Marks :<br><br>Paper I - &nbsp;<input name="marks1" id="marks1" max= "100" min= "0" required type="number" step="0.01"><br>
                Paper II - <input name="marks2" id="marks2" max= "100" min= "0" required type="number" step="0.01"><br><br>
                Student's Email Address :<input type="text" id="email" name = "Email" value="<?php echo $email;?>"><br><br>
                Student's Contact Number :<input type="tel" name="stuContact" id="stuContact" pattern = "\d*" ><br><br>
                <button class="submit-buttons" type="submit" onclick="return alertMessage();" name ="personal-submit" 
                style = "background-color : rgb(255, 80, 80);"><b>Submit</b></button>
            </form>
            <script>
                var study = document.getElementById("yStudy");
                var stream = document.getElementById("stream");
                var category = document.getElementById("category");
                var male = document.getElementById("male");
                var female = document.getElementById("female");
                var other = document.getElementById("other");
                var status = <?=json_encode($_SESSION['state']['1'])?>;

                if (status == 1){
                    var studyYear= "<?php echo $yStudy;?>";
                    var studyStream = "<?php echo $Stream;?>";
                    var studyCategory = "<?php echo $Category;?>";
                    var gender = "<?php echo $Gender;?>";    
                }
 
                var i;
                function selectField(){
                    if(status == 1){
                        for(i=0; i < (study.options.length); i++){
                            if(study.options[i].value == studyYear){
                                study.selectedIndex = i;
                                break;
                            }
                        }

                        for(i=0; i < (stream.options.length); i++){
                            if(stream.options[i].value == studyStream){
                                stream.selectedIndex = i;
                                break;
                            }
                        }


                        for(i=0; i < (category.options.length); i++){
                            if(category.options[i].value == studyCategory){
                                category.selectedIndex = i;
                                break;
                            }
                        }

                        if(gender == male.value){
                            male.checked = true;
                        }else if(gender == female.value){
                            female.checked = true;
                        }else if (gender == other.value){
                            other.checked = true;
                        }

                        document.getElementById("dob").value = "<?php echo $dob?>";
                        document.getElementById("bloodgrp").value = "<?php echo $bloodGrp?>";
                        document.getElementById("Year").value = "<?php echo $yJoin?>";
                        document.getElementById("marks1").value = "<?php echo $wbjeeMaths?>";
                        document.getElementById("marks2").value = "<?php echo $wbjeePhyChem?>";
                        document.getElementById("stuContact").value = "<?php echo $stuContact?>";

                    }
                }
            </script>
            <script>
                var r1 = false, r2 = false, r3 = false;
                var uname = document.getElementById("stuname");
                var roll = document.getElementById("roll");
                var email = document.getElementById("email");
                var nameOld = <?=json_encode($name)?>;
                var rollOld = <?=json_encode($roll)?>;
                var emailOld = <?=json_encode($email)?>;
                
                function alertMessage(){   

                    if(uname.value !== nameOld && !r1){
                        r1 = window.confirm("Do you want to change 'Name of Student'?");
                        if(!r1){
                            return false;
                        }
                    }else{
                        r1 = true;
                    }
                    
                    if(roll.value !== rollOld && r1 && !r2){
                        r2 = window.confirm("Do you want to change 'Roll Number'?");
                        if(!r2){
                            return false;
                        }
                    }else{
                        r2 = true;
                    }
                    
                    if(email.value !== emailOld && r2 && !r3){
                        r3 = window.confirm("Do you want to change 'Studemt's Email Address'?"); 
                        if(!r3){
                            return false;
                        }                    
                    }else{
                        r3 = true;
                    }

                    if (r1 && r2 && r3){
                        var result = window.confirm("Are your sure that you have correctly filled in your details?");
                        if (result == false){
                           return false;
                        }
                    }                
                }
                
            </script>
            <script>
                //Disabling some of the fields to prevent furthur any wrong info by student
                document.getElementById("stuname").disabled = true;
                document.getElementById("roll").disabled = true;
                document.getElementById("email").disabled = true;
            </script>
        </section>
    </div>
    
    <?php
        require "nav-bar.php";
        require "footer.php";
    ?>
<script src="./js/dropdown.js"></script>
</body>
</html>