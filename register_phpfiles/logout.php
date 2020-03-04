<?php
 
session_start();
 
// 2. Unset all the session variables
unset($_SESSION['rollno']);
unset($_SESSION['fullname']);

 
?>
<script type="text/javascript">
alert("Successfully logout!");
window.location = "index.php";
</script>