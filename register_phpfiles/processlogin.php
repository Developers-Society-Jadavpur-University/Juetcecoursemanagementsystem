<?php
 
 include('../config_phpfiles/config.php');
 include('../config_phpfiles/session.php');

if (isset($_POST['btn_login'])) {
 
 
  $email = trim($_POST['email']);
  $upass = trim($_POST['password']);
  $h_upass = sha1($upass);
if ($upass == ''){
     ?>    <script type="text/javascript">
                alert("Password is missing!");
                window.location = "index.php";
                </script>
        <?php
}else{
//create some sql statement             
        $sql = "SELECT FROM studusers_logindata WHERE email_id =  '" . $email . "' AND  `password` =  '" . $h_upass . "'";
        $result = mysqli_query($conn, $sql);
 
        if ($result){
             //get the number of results based n the sql statement
        $numrows = mysqli_num_rows($result);
     
        //check the number of result, if equal to one   
        //IF theres a result
            if ($numrows == 1) {
                //store the result to a array and passed to variable found_user
                $found_user  = mysqli_fetch_array($result);
 
                //fill the result to session variable
                $_SESSION['rollno']  = $found_user['Roll_no']; 
                $_SESSION['fullname'] = $found_user['Full_name']; 
               
           
             ?>    <script type="text/javascript">
                      //then it will be redirected to index.php
                      window.location = "dashboard.php";
                  </script>
             <?php        
           
        
            } else {
            //IF theres no result
              ?>    <script type="text/javascript">
                alert("Username or Password Not Registered! Contact Your administrator.");
                console.log('not registered');
                </script>
        <?php
 
            }
 
         } else {
                 # code...
         die("Table Query failed: " );
        }
        
    }       
} 
 
?>