<?php

    $servername = "localhost";
    $db_username = "ayan";
    $db_password = "AYAN@445bi";
    $db_name = "etce_database";

    $conn = mysqli_connect($servername,$db_username,$db_password,$db_name);
    if(!$conn){
        die("Connection failed : ".mysqli_error($conn));
    }
    

        