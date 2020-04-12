<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <?php
        require "header.php";
        require "prevent_logout.php";
    ?>
    <div class = "container" style="text-align:center;">
        <h3 class="heading">Reset your password</h3>
        <section class="entry">
            <p><b>An email will be sent to you with instructions on how to reset your password</b></p>
            <form action ="includes/reset-request.inc.php" method="post">
                <input type="email" name="E-mail" placeholder="Enter your e-mail address"><br><br>
                <button class="submit-buttons" type="submit" name="reset-request-submit">Receive new password by e-mail</button>
            </form>
        </section>
        <?php
            if(isset($_GET['error'])){
                if ($_GET['error'] == 'emptyfield'){
                    echo "<br><br><p>E-mail field cannot remain empty!<p>";
                }
            }
            if(isset($_GET['reset'])){
                if ($_GET['reset'] == 'success'){
                    echo "<br><br><p>Check your e-mail account<p>";
                }
            }
        ?>
    </div>
    <?php
        require "footer.php";
    ?>
</body>
</html>