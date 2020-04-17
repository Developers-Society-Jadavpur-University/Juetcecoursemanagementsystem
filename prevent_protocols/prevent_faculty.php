<?php
if($_SESSION['role'] == 'faculty'){
    header("Location: ../facultydashboard.php?login=success");
    exit();
}


?>