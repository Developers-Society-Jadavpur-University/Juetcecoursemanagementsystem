<?php
    //$course_code = $_POST["id"];
    $id = $_POST["id"];
    //session_start();
    $_SESSION['course_code'] = $id;
        if(isset($_SESSION['course_code']))
        {
            
            
            echo json_encode(array(
                
                'success'=>true
                
            ));
            
        }
        else{
            echo json_encode(array('success'=>false));
        }
?>