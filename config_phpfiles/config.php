<?php
$server = "localhost";
$username = "ayan";
$password = "AYAN@445bi";
$database = "coursemanagementsystem";
 
// Create connection and Check connection
$conn = mysqli_connect($server, $username, $password) or die("Error in connection!");
mysqli_select_db($conn, $database ) or die("Could not select database");
?>  
