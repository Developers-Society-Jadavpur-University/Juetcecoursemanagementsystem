<?php
            if($_SESSION['role'] == 'admin'){
                header("Location: ../admindashboard.php?login=success");
                exit();
            }else if($_SESSION['role'] == 'faculty'){
                header("Location: ../facultydashboard.php?login=success");
                exit();
            }
            
?>