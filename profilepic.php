<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Picture Update</title>
</head>
<body>
    <?php  
        require "header.php";
        require "prevent_login.php";
    ?>

    <div class = "container">
        <h3 class ="heading">Select Profile Picture</h3>
        <section class="entry">
            <p>.jpg/.jpeg/.png (within 500kb)</p><br><br>
            <form action="includes/profilepic.inc.php" method="post" enctype="multipart/form-data">
                <input type="file" name="picture"><br><br>
                <button class="submit-buttons" type="submit" name="change-pic-submit">Upload Image</button>
            </form>
        </section>
    </div>
    <?php
        require "nav-bar.php";
        require "footer.php";
    ?>
</body>
</html>