<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Password</title>
</head>
<body>
    <?php
        require "header.php";
        require "prevent_logout.php";
    ?>
    <div class = "container">
        <h3 class="heading">Create new password</h3>
        <section class="entry">

            <?php
                $selector = $_GET['selector'];
                $validator = $_GET['validator'];

                if (empty($selector) || empty($validator)) {
                    echo "Could not validate your account";
                }
                if (ctype_xdigit($selector) !==false && ctype_xdigit($validator) !==false){
                    ?>
                        <form action="includes/reset-password.inc.php" method="post">
                            <input type="hidden" name="selector" value=<?php echo $selector ?>>
                            <input type="hidden" name="validator" value=<?php echo $validator ?>>
                            <input type="password" name="pwd" placeholder="Enter new password..."><br><br>
                            <input type="password" name="pwd-repeat" placeholder="Repeat new password..."><br><br>
                            <button class="submit-buttons" type="submit" name="reset-password-submit">Reset password</button>
                        </form>
                    <?php
                }
            ?>
        </section>
    </div>
    <?php
        require "footer.php";
    ?>
</body>
</html>