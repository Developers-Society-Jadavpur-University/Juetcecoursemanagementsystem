<html>
    <head>
        <meta charset="UTF-8">
        <title>student details</title>
        <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="../jquery_ui/css/icon.css">
        <link rel="stylesheet" type="text/css" href="../jquery_ui/css/demo.css">
        <script type="text/javascript" src="../jquery_ui/js/jquery.min.js"></script>
        <script type="text/javascript" src="../jquery_ui/js/jquery.easyui.min.js"></script>
    </head>
    <body style="margin: -1.5%;">
        <?php
        //Method for getting url variables and pass them as session variables.
        $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $url_components = parse_url($url);
        parse_str($url_components['query'],$params);
        session_start();
        $_SESSION['roll_no'] = $params['roll_no'];
        
        if(!isset($_SESSION['roll_no']))
        {
            echo 'session variable not set';
        }
        require "../prevent_login.php";
        require "../prevent_protocols/prevent_students.php";
        require "../prevent_protocols/prevent_faculty.php";

        ?>
        
        
        

       
        <div style="margin: auto;width: 100%; border: 3px solid white; padding: 10px; ">
            <div id="p" class="easyui-panel" title="Welcome to Course Management System" style="width:100%;height:430px;padding:0px;"
            data-options="iconCls:'icon-tip',collapsible:true,minimizable:false,maximizable:false,closable:false">
             
             <?php
             $role = $_SESSION['role'];
             $loggedin_name = $_SESSION['uid'];
             if($role=='admin')
             {
                 $user_role = 'ADMIN';
             }
             
             ?>


             <p style="padding-left: 5px;"><b>Logged in as :</b> <?php echo $user_role?> </p>
             <p style="padding-left: 5px;"><b>Logged in Name :</b> <?php echo $loggedin_name?>  </p>
             &nbsp;&nbsp;<a href="../admin_dashboard/admin-semstu_info.php?course_code=<?php echo $_SESSION['course_code']?>" class="easyui-linkbutton" iconCls="icon-back">Back</a> 
              
             <div id="p" class="easyui-panel" title="Student Roll no <?php echo $_SESSION['roll_no'] ?>" style="width:99%;height:70%;padding:0px;align-self: center;"
             data-options="iconCls:'icon-tip',collapsible:true,minimizable:false,maximizable:false,closable:false">
               <p style="font-size:14px; text-align: center;"><b>Basic details of the student <?php echo $_SESSION['roll_no'] ?></b></p>
                    <div style="padding:5px;background:#fafafa;width:80%;border:1px solid #ccc;margin: 0 auto;">
                        
                        
                        
                        <?php
                           require "../includes/dbh.inc.php";
                           $stud_rollno = $_SESSION['roll_no'];
                           
                           $sql = "SELECT * FROM student_userdata WHERE roll_no=$stud_rollno";
                           $result = $conn->query($sql);
               
                               if($result->num_rows > 0)  
                                 {
                                    while($row = $result->fetch_assoc())
                                    {
                                       $stud_name = $row["Full_name"];
                                       $stud_email = $row["email"];
                                       $stud_phno = $row["phoneno"];
                                       $stud_regstatus = $row["reg_status"];

                                       if($stud_regstatus=="Y")
                                       {
                                        $stud_regstatus = "Done";
                                       }
                                       elseif($stud_regstatus=="N")
                                       {
                                        $stud_regstatus = "Pending";
                                       }

                                    }
                                }
                                
                                $sql_2 = "SELECT * FROM users WHERE rno=$stud_rollno";
                                $result_2 = $conn->query($sql_2);
                                if($result_2->num_rows > 0)
                                {
                                    while($row = $result_2->fetch_assoc())
                                    {
                                       
                                        $reg_status1 = $row["update_status1"];
                                        $reg_status2 = $row["update_status2"];
                                        $reg_status3 = $row["update_status3"];

                                    }
                                    if($reg_status1 =="1" && $reg_status2 =="1" && $reg_status3 =="1")
                                    {
                                        $stud_updatestatus = "Full Profile Updated";
                                    }
                                    else{
                                        $stud_updatestatus = "Profile Updation Pending";
                                    }
                                }
                                else{
                                    $stud_updatestatus = "Student hasn't created his/her profile yet";
                                }

                        ?>
                        
                        
                        <p style="padding-left: 5px;"><b>Student Name :</b> <?php echo $stud_name?> </p>
                        <p style="padding-left: 5px;"><b>Student Phone :</b> <?php echo $stud_phno?>  </p>
                        <p style="padding-left: 5px;"><b>Student Email :</b> <?php echo $stud_email?> </p>
                        <p style="padding-left: 5px;"><b>Registration status :</b> <?php echo $stud_regstatus?> </p>
                        <p style="padding-left: 5px;"><b>Profile Update status :</b> <?php echo $stud_updatestatus?> </p>
                        
                        
                        
                    </div>
             
            
             </div>



            </div>
        <br>
        <br>
       
        <div id="p" class="easyui-panel" title="Full Details of the Student" style="width:99%;height:50%;padding:0px;align-self: center;"
             data-options="iconCls:'icon-tip',collapsible:true,minimizable:false,maximizable:false,closable:false">
               <p style="font-size:14px; text-align: center;"><b>Full details of the above student</b></p>
                    <div style="padding:5px;background:#fafafa;width:99%;border:1px solid #ccc;margin: 0 auto;">
        <div class="easyui-tabs" style="width:97%;height:250px">
        <div title="Contact Details" style="padding:10px">
            <table id="dg" title="Student's Contact Details" class="easyui-datagrid" style="width:70%;height:auto;"
                url="../admin_dashboard/fullstud-get_contactdetails.php" 
                toolbar="#toolbar" pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true"
                data-options="iconCls:'icon-save',collapsible:true,minimizable:false,maximizable:false,closable:false"
                >
            <thead>
                <tr>
                    <th field="roll_no" width="50">Roll no</th>
                    <th field="Full_name" width="50">Full Name</th>
                    <th field="phoneno" width="50">Mobile no</th>
                    <th field="email" width="50">Email</th>
                </tr>
            </thead>
        </table>

        </div>
        <div title="Parent Details" style="padding:10px">
        
        <table id="dg" title="Father's Contact Details" class="easyui-datagrid" style="width:70%;height:auto;"
                url="../admin_dashboard/fullstud-get_parentdetails.php" 
                toolbar="#toolbar" pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true"
                data-options="iconCls:'icon-save',collapsible:true,minimizable:false,maximizable:false,closable:false"
                >
            <thead>
                <tr>
                    <th field="fName" width="50">Father's Name</th>
                    <th field="fContact" width="50">Father's Ph</th>
                    <th field="fEmail" width="50">Father's Email</th>
                    <th field="fBloodGrp" width="50">Father's Blood grp</th>
                    <th field="fOccu" width="50">Father's Ocuupation</th>
                </tr>
            </thead>
        </table>
        <br>
        <table id="dg" title="Mother's Contact Details" class="easyui-datagrid" style="width:70%;height:auto;"
                url="../admin_dashboard/fullstud-get_parentdetails.php" 
                toolbar="#toolbar" pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true"
                data-options="iconCls:'icon-save',collapsible:true,minimizable:false,maximizable:false,closable:false"
                >
            <thead>
                <tr>
                    <th field="mName" width="50">Mother's Name</th>
                    <th field="mContact" width="50">Mother's Ph</th>
                    <th field="mEmail" width="50">Mother's Email</th>
                    <th field="mBloodGrp" width="50">Mother's Blood grp</th>
                    <th field="mOccu" width="50">Mother's Ocuupation</th>
                </tr>
            </thead>
        </table>
        <br>
        <table id="dg" title="Additional Contact Details" class="easyui-datagrid" style="width:70%;height:auto;"
                url="../admin_dashboard/fullstud-get_parentdetails.php" 
                toolbar="#toolbar" pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true"
                data-options="iconCls:'icon-save',collapsible:true,minimizable:false,maximizable:false,closable:false"
                >
            <thead>
                <tr>
                    <th field="parentOfficeAdd" width="70">Parent's Office Address</th>
                    <th field="parentOfficeTel" width="70">Parent's Office Phone</th>
                    
                </tr>
            </thead>
        </table>
            
        </div>
        <div title="WBJEE Details" style="padding:10px">
        <table id="dg" title="Student's WBJEE Details" class="easyui-datagrid" style="width:70%;height:auto;"
                url="../admin_dashboard/fullstud-get_medicaldetails.php" 
                toolbar="#toolbar" pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true"
                data-options="iconCls:'icon-save',collapsible:true,minimizable:false,maximizable:false,closable:false"
                >
            <thead>
                <tr>
                    <th field="wbjeeMaths" width="50">WBJEE Math Score</th>
                    <th field="wbjeePhyChem" width="50">WBJEE Phy+Chem Score</th>
                    
                </tr>
            </thead>
        </table>
        </div>
        <div title="Medical Details" style="padding:10px">
        <table id="dg" title="Student's Medical Details" class="easyui-datagrid" style="width:70%;height:auto;"
                url="../admin_dashboard/fullstud-get_medicaldetails.php" 
                toolbar="#toolbar" pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true"
                data-options="iconCls:'icon-save',collapsible:true,minimizable:false,maximizable:false,closable:false"
                >
            <thead>
                <tr>
                    <th field="dob" width="50">Date of Birth</th>
                    <th field="Gender" width="50">Gender</th>
                    <th field="bloodGrp" width="50">Blood Group</th>
                    
                </tr>
            </thead>
        </table>
        </div>
        </div>
        </div>
        </div>
        <!--<table id="dg" title="All Details of the Selected Student" class="easyui-datagrid" style="width:100%;height:auto;"
                url="../admin_dashboard/get_users.php" 
                toolbar="#toolbar" pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true"
                data-options="iconCls:'icon-save',collapsible:true,minimizable:false,maximizable:false,closable:false"
                >
            <thead>
                <tr>
                    <th field="roll_no" width="50">Roll no</th>
                    <th field="Full_name" width="50">Full Name</th>
                    <th field="phoneno" width="50">Mobile no</th>
                    <th field="email" width="50">Email</th>
                </tr>
            </thead>
        </table>
        <div id="toolbar">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Add new Student</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit Student</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-tip" plain="true" onclick="FulldetailsUser()">Full Student Details</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remove Student</a>
        </div>-->
        
        <!--<div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
            <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
                <h3>Enter Student Information</h3>
                <div style="margin-bottom:10px">
                    <input  name="roll_no" class="easyui-textbox" required="true" label="Roll no" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="Full_name" class="easyui-textbox" required="true" label="Full Name" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="phoneno" class="easyui-textbox" label="Mobile no" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="email" class="easyui-textbox"  validType="email" label="Email" style="width:100%">
                </div>
            </form>
        </div>
        <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
        </div>-->
        </div>
        
        <!--<script type="text/javascript">
            var url;
            function newUser(){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','New Student of this batch');
                $('#fm').form('clear');
                url = '../admin_dashboard/save_user.php';
            }
            function editUser(){
                var row = $('#dg').datagrid('getSelected');
                if (row){
                    $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit User');
                    $('#fm').form('load',row);
                    url = '../admin_dashboard/update_user.php?id='+row.id;
                }
            }
            function saveUser(){
                $('#fm').form('submit',{
                    url: url,
                    onSubmit: function(){
                        return $(this).form('validate');
                    },
                    success: function(result){
                        var result = eval('('+result+')');
                        if (result.errorMsg){
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                            $('#dlg').dialog('close');        // close the dialog
                            $('#dg').datagrid('reload');    // reload the user data
                        }
                    }
                });
            }
            function destroyUser(){
                var row = $('#dg').datagrid('getSelected');
                if (row){
                    $.messager.confirm('Confirm','Are you sure you want to delete this student?',function(r){
                        if (r){
                            $.post('../admin_dashboard/destroy_user.php',{id:row.roll_no},function(result){
                                if (result.success){
                                    $('#dg').datagrid('reload');    // reload the user data
                                } else {
                                    $.messager.show({    // show error message
                                        title: 'Error',
                                        msg: result.errorMsg
                                    });
                                }
                            },'json');
                        }
                    });
                }
            }
           function FulldetailsUser(){

            var row = $('#dg').datagrid('getSelected');
              if (row){
                 $.messager.confirm('Confirm','Are you sure to perform more action on this batch ?',function(r){
                if (r){
                        $.post('../admin_dashboard/admin-fullstuddetails_action.php',{id:row.roll_no},function(result){
                      if (result.success){
                             window.location = "admin_dashboard/admin-fullstuddetails.php?roll_no="+row.roll_no;
                   
                            } else {
                                $.messager.show({    // show error message
                                   title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        },'json');
          
                    }
                });
            }
            }
        </script>-->

        
        
    </body>
    </html>

