<?php

    $servername = "localhost";
    $db_username = "arijit";
    $db_password = "#Arijit02";
    $db_name = "etce_database";

    $conn = mysqli_connect($servername,$db_username,$db_password,$db_name);
    if(!$conn){
        die("Connection failed : ".mysqli_error($conn));
    }

        