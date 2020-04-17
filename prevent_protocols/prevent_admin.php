<?php
if($_SESSION['role'] == 'admin'){
    header("Location: ../admindashboard.php?login=success");
    exit();
}


?>