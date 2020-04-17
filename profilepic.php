<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Picture Update</title>
</head>
<body onload="deleteimg();">
    <?php  
        require "header.php";
        require "prevent_login.php";
        require "includes/dbh.inc.php";
        $roll = $_SESSION['roll'];
        $sql = "SELECT * FROM profileimg WHERE user_rno=$roll";
        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_assoc($result)){
            $status = $row['status_name'];
        }else{
            echo "Try Again!";
        }
        if(isset($_GET['delete'])){
            if($_GET['delete'] == 'success'){
                echo "<h4>Profile picture deleted successfully!</h4>";
            }
        }
    ?>

    <div class = "container">
        <h3 class ="heading">Select Profile Picture</h3>
        <section class="entry">
            <p>.jpg/.jpeg/.png (within 500kb)</p><br><br>
            <form action="includes/profilepic.inc.php" method="post" enctype="multipart/form-data">
                <input type="file" name="picture"><br><br>
                <button class="submit-buttons" type="submit" name="change-pic-submit">Upload Image</button>
            </form>
        </section><br><br>
        <section class="entry" id = "deleteimg-section">
            <p>Delete Profile Picture</p>
            <form action="includes/profilepic.inc.php" method="post" enctype="multipart/form-data">
                <button class="submit-buttons" id="button" type="submit" name="delete-pic-submit">Delete Image</button>
            </form>
        </section>
        <script>
            var status = <?=json_encode($status)?>;
            var deleteImg = document.getElementById("deleteimg-section");
            function deleteimg(){
                if(status == 1){
                    deleteImg.style.display = "none";
                }
                else{
                    deleteImg.style.display = "inline-block";
                }
            }
            
        </script>
    </div>
    <?php
        require "nav-bar.php";
        require "footer.php";
    ?>
</body>
</html>