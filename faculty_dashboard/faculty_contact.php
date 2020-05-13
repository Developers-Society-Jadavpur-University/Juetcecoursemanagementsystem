<!DOCTYPE html>
<html>
    <head>
        <title>Faculty Contact</title>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
             require "../header.php";
             require "../includes/dbh.inc.php";
        ?>
        <h3>Our Faculty Members</h3>			
						<?php			   
                           $query = mysqli_query($conn,"SELECT * FROM `faculty_contact`");
                           if($result = $query){
                               if(mysqli_num_rows($result) > 0){
                                   echo "<table border='5' width='100%'>";
                                       echo "<tr>";
                                          echo "<th>Photo</th>";
                                          echo "<th>Name</th>";
                                          echo "<th>Contact</th>";
                                          echo "<th>Bio</th>";
                                          echo "<th>Resesrch Work</th>" ;
                                       echo "</tr>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                          echo '<td><<img src="uploads/profile'.$row['mobile].'.'.$row['ext'].'?"'.mt_rand().' class="profile"/></td>';
                                        //  echo '<td> <img height = "130px" width = "100px" src="data:image/jpeg;base64,'.base64_encode($image)" > </td>' ;
                                      //    echo "<td>" '<a href="profilepic.php"><img src="uploads/profile'.$row['mobile].'.'.$row['ext'].'?"'.mt_rand().' class="profile"/></a>' "</td>";
                                          echo "<td>" .$row['names']. "</td>"  ;
                                          echo "<td>" ,nl2br('Mobile: ') .$row['mobile_no'] , nl2br('<br>Email: ') .$row['email'], nl2br('<br>Office: '), $row['office']. nl2br('<br>Phone: '), $row['phone'].nl2br('<br>Website: '), $row['website']."</td>";
                                          echo "<td>" .$row['bio']. "</td>";
                                          echo "<td>" .$row['research_work']. "</td>"  ;                                
                                       echo "</tr>";
                                    }
                                    echo "</table>" ;
                               }       
                           }
                           require "../footer.php" ;
                        ?> 	
                 				
    </body>
</html>