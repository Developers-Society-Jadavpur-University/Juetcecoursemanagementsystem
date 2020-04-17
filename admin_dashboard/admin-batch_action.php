<?php
    //$course_code = $_POST["id"];
    $_SESSION['course_code'] = $_POST["id"];;
        if(isset($_SESSION['course_code']))
        {
            
            echo json_encode(array(
                'success'=>true,
            ));
        }
        else{
            echo json_encode(array(
                'success'=>false,
            ));
        }
?>