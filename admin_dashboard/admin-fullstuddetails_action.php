<?php
    //$course_code = $_POST["id"];
    $id = $_POST["id"];
    //session_start();
    $_SESSION['roll_no'] = $id;
        if(isset($_SESSION['roll_no']))
        {
            
            
            echo json_encode(array(
                
                'success'=>true
                
            ));
            
        }
        else{
            echo json_encode(array('success'=>false));
        }
?>