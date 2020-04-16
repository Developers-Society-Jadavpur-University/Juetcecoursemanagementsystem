<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/util_table.css">
	<link rel="stylesheet" type="text/css" href="css/main_table.css">
<!--===============================================================================================-->
</head>
<body>
<?php 
		
		require "includes/dbh.inc.php";
        require "prevent_login.php";
?>    
        <div class="table100" style="padding-top: 10px; padding-left: 10px; padding-right: 10px; overflow: scroll; max-height: 600px;">
			<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Date</th>
								<th class="column2">Notice</th>
								<th class="column3">Remarks (If any)</th>
							</tr>
						</thead>
						<tbody>
						<!--<tr>
							<td class="column1 flash">2017-09-29 01:22</td>
							<td class="column2 flash">All the Students of ETCE UG 1 are requested to complete the registration process in this portal on or before 13/07/2020.All the Students of ETCE UG 1 are requested to complete the registration process in this portal on or before 13/07/2020</td>
							<td class="column3 flash">Click Here for details</td>
									
						</tr>-->
						
						<?php
						   $course_code = $_SESSION['course_code'];
						   //echo $course_code;  
						 
						   $count = 0;
                           $query = mysqli_query($conn,"SELECT * FROM stu_notice WHERE (notice_visible='ALL' OR notice_visible='$course_code')
						    AND (notice_status='open')");
						   foreach($query as $row)
						   {
                           $count++;
                        ?>
								
								
								<?php echo '<tr>'?>
									<td class="column1 flash"><?php echo $row["date_time_create"];?></td>
									<td class="column2 flash"><?php echo $row["notice"];?></td>
									<td class="column3 flash">
									<?php
									   if($row["file_id"]=="")
									    {
										  echo "NA";
									    }
									    else{
										//Add proper file link here by proper query.
											$id = $row['file_id'];
											$noticeLink = explode("/",$row['notice_id']);
											$result = mysqli_query($conn,"SELECT * FROM notice_uploads WHERE file_id = $id");
											$row_new = mysqli_fetch_assoc($result);
											$format = $row_new['extension'];
											$link = "../notice_uploads/notice".".".$noticeLink[0]."_".$noticeLink[1].".".$id.".".$format;

											echo '<a href='.$link.'>Click here for details</a>';
									    }

									?>
									</td>
									<?php
									if($count == 3) 
									{ 
										// three items in a row
                                        echo '</tr>';
                                        $count = 0;
                                     }
                                } ?>
									
								
								
								
								
							</tbody>
					</table>
				</div>
  
  </div>
	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main_table.js"></script>

</body>
</html>