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
    <body style="margin: -1.5%;">
        <?php
        //Method for getting url variables and pass them as session variables.
        $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $url_components = parse_url($url);
        parse_str($url_components['query'],$params);
        session_start();
        $_SESSION['course_code'] = $params['course_code'];
        
        if(!isset($_SESSION['course_code']))
        {
            echo 'session variable not set';
        }
        require "../prevent_login.php";
        require "../prevent_protocols/prevent_students.php";
        require "../prevent_protocols/prevent_faculty.php";

        ?>
        
        
        

       
        <div style="margin: auto;width: 100%; border: 3px solid white; padding: 10px; ">
            <div id="p" class="easyui-panel" title="Welcome to Course Management System" style="width:100%;height:350px;padding:0px;"
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
             &nbsp;&nbsp;<a href="../admindashboard.php" class="easyui-linkbutton" iconCls="icon-back">Back</a> 
              
             <div id="p" class="easyui-panel" title="Batch Selected <?php echo $_SESSION['course_code'] ?>" style="width:99%;height:200px;padding:0px;align-self: center;"
             data-options="iconCls:'icon-tip',collapsible:true,minimizable:false,maximizable:false,closable:false">
               <p style="font-size:14px; text-align: center;"><b>Select Options from the below to perform actions on the batch <?php echo $_SESSION['course_code'] ?></b></p>
                    <div style="padding:5px;background:#fafafa;width:50%;border:1px solid #ccc; text-align: center;margin: 0 auto;">
                        
                        <a href="../admin_dashboard/generate_rollsheet.php" class="easyui-linkbutton" iconCls="icon-print" style="font-size: 30%;padding: 06px 18px;">Print Rollsheet</a>
                        <a href="#" class="easyui-linkbutton" iconCls="icon-add" style="font-size: 30%;padding: 06px 18px;">Semester Registration</a>
                        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" style="font-size: 30%;padding: 06px 18px;">Class Routine Entry</a>
                       <!--<a href="#" class="easyui-linkbutton" iconCls="icon-add" style="font-size: 30%;padding: 06px 18px;">Assign Class Tests to Teachers</a>-->
                        <!--<a href="#" class="easyui-linkbutton" iconCls="icon-tip" style="font-size: 30%;padding: 06px 18px;">Full Student Details</a>-->
                        <a href="#" class="easyui-linkbutton" iconCls="icon-reload" style="font-size: 30%;padding: 06px 18px;">Refresh</a>
                        
                        
                        
                    </div>
             
            
             </div>



            </div>
        <br>
        <table id="dg" title="All Students of the Selected Batch" class="easyui-datagrid" style="width:100%;height:auto;"
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
        </div>
        
        <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
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
        </div>
        </div>
        <script type="text/javascript">
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
                 $.messager.confirm('Confirm','Are you sure to see the Full details of the student ?',function(r){
                if (r){
                        $.post('../admin_dashboard/admin-fullstuddetails_action.php',{id:row.roll_no},function(result){
                      if (result.success){
                             window.location = "../admin_dashboard/admin-fullstuddetails.php?roll_no="+row.roll_no;
                   
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
        </script>

        
        
    </body>
    </html>

