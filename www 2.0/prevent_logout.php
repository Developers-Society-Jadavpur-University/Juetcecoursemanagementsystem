<?php
	if (isset($_SESSION['uid'])){
            header("Location: ../dashboard.php");
            exit();
        }
?>
