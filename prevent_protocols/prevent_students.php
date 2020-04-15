<?php
            $session_role = $_SESSION['role'];
            if($session_role == 'student')
            {
                header("Location: ../dashboard.php?login=successful");
                exit();
            }
?>