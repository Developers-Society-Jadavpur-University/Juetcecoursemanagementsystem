<!DOCTYPE html>
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

        if($_SESSION['state']['2'] == 1){
            $sql = "SELECT * FROM parentDetails WHERE rno=?";
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
                 
                    $fName = $row['fName'];
                    $mName = $row['mName'];
                    $fContact = $row['fContact'];
                    $mContact = $row['mContact'];
                    $fEmail = $row['fEmail'];
                    $mEmail = $row['mEmail'];
                    $fBloodGrp = $row['fBloodGrp'];
                    $mBloodGrp = $row['mBloodGrp'];
                    $fOccu = $row['fOccu'];
                    $mOccu = $row['mOccu'];
                    $parentOfficeAdd = $row['parentOfficeAdd'];
                    $parentOfficeTel = $row['parentOfficeTel'];
                }else{
                    echo "Some unwanted error occurred!";
                }
            }
        }
        
    ?>
    <div class="profile-content">
    <div>
        <?php
          require "cms-nav_stu.php";
        ?> 
      </div>
        <section class="update-forms">
            <form action="includes/profile_update.inc.php" method="post">
                Father's Name :<input required type ="text" name = "FatherName" id = "FatherName" ><br><br>
                Mother's Name :<input required type ="text" name = "MotherName" id = "MotherName" ><br><br>
                Father's Contact Number :<input required type ="tel" name = "FatherContact" id = "FatherContact" pattern="[0-9]{10}"><br><br>
                Mother's Contact Number :<input required type ="tel" name = "MotherContact" id = "MotherContact" pattern="[0-9]{10}"><br><br>
                Father's Email :<input type ="email" name = "fEmail" id = "fEmail"><br><br>
                Mother's Email :<input type ="email" name = "mEmail" id = "mEmail"><br><br>
                Father's Blood Group :<input required type ="text" maxlength = 3 size = 3 name = "fBloodGrp" id = "fBloodGrp"><br><br>
                Mother's Blood Group :<input required type ="text" maxlength = 3 size = 3 name = "mBloodGrp" id = "mBloodGrp"><br><br>
                Father's Occupation :<select required name = "fOcc" id = "fOccu">
                                            <option value="none">Select</option>
                                            <option value="service">Service</option>
                                            <option value="business">Business</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="professor">Professor</option>
                                            <option value="scientist">Scientist</option>
                                            <option value="self-employed">Self-Employed</option>
                                        </select>
                                        <br><br>
                Mother's Occupation :<select required name = "mOcc" id = "mOccu">
                                            <option value="none">Select</option>
                                            <option value="service">Service</option>
                                            <option value="business">Business</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="professor">Professor</option>
                                            <option value="scientist">Scientist</option>
                                            <option value="self-employed">Self-Employed</option>
                                            <option value="houseWife">House-Wife</option>
                                        </select>
                                        <br><br>
                Father's/Mother's Office Address :<input type ="text" name = "offAddress" id = "offAddress"><br><br>
                Father's/Mother's Office Telephone :<input type ="tel" name = "offTel" id = "offTel" pattern="[0-9]{10}"><br><br>
                <button class="submit-buttons" type="submit" name ="parent-submit" onclick="return alertMessage();"
                style = "background-color : rgb(255, 80, 80);"><b>Submit</b></button>
            </form>
            <script>
                var fOccuField = document.getElementById("fOccu");
                var mOccuField = document.getElementById("mOccu");
                var status = <?=json_encode($_SESSION['state']['2'])?>;

                if (status == 1){
                    var fOccu = "<?php echo $fOccu;?>";
                    var mOccu = "<?php echo $mOccu;?>";
                }
 
                var i;
                function selectField(){
                    if(status == 1){
                        for(i=0; i < (fOccuField.options.length); i++){
                            if(fOccuField.options[i].value == fOccu){
                                fOccuField.selectedIndex = i;
                                break;
                            }
                        }

                        for(i=0; i < (mOccuField.options.length); i++){
                            if(mOccuField.options[i].value == mOccu){
                                mOccuField.selectedIndex = i;
                                break;
                            }
                        }

                        document.getElementById("FatherName").value = "<?php echo $fName;?>";
                        document.getElementById("MotherName").value = "<?php echo $mName;?>";
                        document.getElementById("FatherContact").value = "<?php echo $mContact;?>";
                        document.getElementById("MotherContact").value = "<?php echo $fContact;?>";
                        document.getElementById("fEmail").value = "<?php echo $fEmail?>";
                        document.getElementById("mEmail").value = "<?php echo $mEmail?>";
                        document.getElementById("fBloodGrp").value = "<?php echo $fBloodGrp;?>";
                        document.getElementById("mBloodGrp").value = "<?php echo $mBloodGrp;?>";
                        document.getElementById("offAddress").value = "<?php echo $parentOfficeAdd;?>";
                        document.getElementById("offTel").value = "<?php echo $parentOfficeTel;?>";

                    }
                }
            </script>
            <script>
                function alertMessage(){
                    var result = window.confirm("Are your sure that you have correctly filled in your details?");
                        if (result == false){
                            return false;
                        }
                }
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
