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
        
        

       

        <table id="dg" title="All Students" class="easyui-datagrid" style="width:100%;height:100%;"
                url="../admin_dashboard/get_users.php"
                toolbar="#toolbar" pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true">
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
        </script>

        
        
    </body>
    </html>

