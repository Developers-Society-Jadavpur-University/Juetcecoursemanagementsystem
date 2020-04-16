    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>semester action</title>
        <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="../jquery_ui/css/icon.css">
        <link rel="stylesheet" type="text/css" href="../jquery_ui/css/demo.css">
        <script type="text/javascript" src="../jquery_ui/js/jquery.min.js"></script>
        <script type="text/javascript" src="../jquery_ui/js/jquery.easyui.min.js"></script>
    </head>
    <body>
        <?php
            require "../includes/dbh.inc.php";
			//$course_code = $_SESSION['course_code'];
			//echo $course_code;  
						 
			$count = 0;
            $query = mysqli_query($conn,"SELECT * FROM batch_info WHERE status_course='1'");
			foreach($query as $row)
			 {
                $count++;
                $course_code = $row['course_code'];
        ?>
       
            
            
            <div class="easyui-panel" style="height:auto;padding:5px; width:80%;">
               <div id="p" class="easyui-panel" title="<?php echo $row['course_name'] ?> - <?php echo $row['start_year'] ;?> to <?php echo $row['end_year'] ;?>" style="width:100%;height:auto;padding:10px;"
                    data-options="iconCls:'icon-tip', collapsible:true">
                    <div class="easyui-panel" style="height:auto;padding:5px; width:100%;">
                        <div id="p" class="easyui-panel" title="Informations for <?php echo $row['course_code'] ?> " style="width:100%;height:205px;padding:10px;"
                                data-options="iconCls:'icon-tip', collapsible:true">
                            <!--<p style="font-size:14px; text-align: center;">Select the Proper actions from below to do something for this batch only.</p>-->
                             
                            <p style="font-size:14px; text-align: left;">Course Code : <?php echo $row['course_code'] ?> </p>
                            <p style="font-size:14px; text-align: left;">Course Name : <?php echo $row['course_name'] ?></p>
                            <p style="font-size:14px; text-align: left;">Department : <?php echo $row['department'] ;?></p> </p>
                            <p style="font-size:14px; text-align: left;">Faculty : <?php echo $row['faculty'] ;?></p>
                            <p style="font-size:14px; text-align: left;">Duration : <?php echo $row['start_year'] ;?> to <?php echo $row['end_year'] ;?></p>
                            
                        </div>
                
                        <br>
                        

                        
            
                    </div>
                </div>
            
            </div>
             
        <?php
        if($count == 1) 
		{ 
					// three items in a row
            //echo '</div>';
            echo'<br>';
            $count = 0;
            }
                
        }
                
        ?>
    </body>
    </html>

