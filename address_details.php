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

        if($_SESSION['state']['3'] == 1){
            $sql = "SELECT * FROM addressDetails WHERE rno=?";
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
                 
                    $permanentAdd = $row['permanentAdd'];
                    $correspondenceAdd = $row['correspondenceAdd'];
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
                Permanent Address :<br><br>Line 1 :<input id="paId1"required type ="text" name = "pAdd1" value=""><br><br>
                Line 2 :<input type ="text" name = "pAdd2" id="paId2" value=""><br><br>
                Line 3 :<input type ="text" name = "pAdd3" id="paId3" value=""><br><br>
                <input type="checkbox" id="check"> Permanent Address same as Correspondence Address<br><br> 
                Correspondence Address :<br><br>Line 1 :<input type ="text" required name = "cAdd1" id="caId1" value=""><br><br>
                Line 2 :<input type ="text" name = "cAdd2" id="caId2" value=""><br><br>
                Line 3 :<input type ="text" name = "cAdd3" id="caId3" value=""><br><br>
                <button class="submit-buttons" type="submit" name ="address-submit" 
                style = "background-color : rgb(255, 80, 80);" onclick="return alertMessage();"><b>Submit</b></button>
            </form>
        </section>
    </div>
    <script>

        var status = <?=json_encode($_SESSION['state']['3'])?>;

        var i;
        function selectField(){
            if(status == 1){
                document.getElementById("paId1").value = "<?php echo $permanentAdd;?>";
                document.getElementById("caId1").value = "<?php echo $correspondenceAdd;?>";
                if (document.getElementById("paId1").value == document.getElementById("caId1").value){
                    document.getElementById("check").checked = true;
                }

            }
        }
    </script>

    <script>
    var paLine1 = document.getElementById("paId1");
    var paLine2 = document.getElementById("paId2");
    var paLine3 = document.getElementById("paId3");
    var caLine1 = document.getElementById("caId1");
    var caLine2 = document.getElementById("caId2");
    var caLine3 = document.getElementById("caId3");
    var check = document.getElementById("check")
    check.addEventListener("click",
    function(){
        if(check.checked){
            caLine1.value = paLine1.value;
            caLine2.value = paLine2.value;
            caLine3.value = paLine3.value;
        }else{
            caLine1.value = "";
            caLine2.value = "";
            caLine3.value = "";
        }
        
    }
    );
    
    function alertMessage(){
        var result = window.confirm("Are your sure that you have correctly filled in your details?");
            if (result == false){
                return false;
            }
    }
    </script>
    <?php
        require "nav-bar.php";
        require "footer.php";

    ?>
    <script src="./js/dropdown.js"></script>
</body>
</html>

