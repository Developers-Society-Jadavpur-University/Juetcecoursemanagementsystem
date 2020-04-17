    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=0">
        <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="../jquery_ui/css/icon.css">
        <link rel="stylesheet" type="text/css" href="../jquery_ui/css/demo.css">
        <script type="text/javascript" src="../jquery_ui/js/jquery.min.js"></script>
        <script type="text/javascript" src="../jquery_ui/js/jquery.easyui.min.js"></script>
    </head>
    <body>
        

      <div style="margin: auto;width: 80%; border: 3px solid white; padding: 10px;">
        <div id="p" class="easyui-panel" title="Batch Actions" style="width:100%;height:350px;padding:5px;"
                data-options="iconCls:'icon-save',collapsible:true,minimizable:false,maximizable:false,closable:false">
            
              <!--Table for the semester informations-->
        <table id="dg" title="All Batches" class="easyui-datagrid" style="width:100%;height:100%;"
                url="../admin_dashboard/get_batches.php" 
                toolbar="#toolbar" pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
                <tr>
                    <th field="course_code" width="10">Batch Code</th>
                    <th field="course_name" width="10">Course Name</th>
                    <th field="department" width="20">Department</th>
                    <th field="faculty" width="20">Faculty</th>
                    <th field="start_year" width="07">Start Year</th>
                    <th field="end_year" width="07">End Year</th>
                </tr>
            </thead>
        </table>
        <div id="toolbar">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Add new Batch</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit Batch</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Archive Batch</a>
        </div>
        
              <div id="dlg" class="easyui-dialog" style="width:600px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
                 <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
                     <h3>Enter Course Information</h3>
                   <div style="margin-bottom:10px">
                      <input  name="course_code" class="easyui-textbox" required="true" label="Code" style="width:50%">
                   </div>
                   <div style="margin-bottom:10px">
                      <input name="course_name" class="easyui-textbox" required="true" label="Name" style="width:80%">
                   </div>
                   <div style="margin-bottom:10px">
                      <input name="department" class="easyui-textbox" required="true" label="Department" style="width:100%">
                   </div>
                   <div style="margin-bottom:10px">
                      <input name="faculty" class="easyui-textbox" required="true" label="Faculty" style="width:100%">
                   </div>
                   <div style="margin-bottom:10px">
                      <input name="start_year" class="easyui-textbox" required="true" label="Start Year" style="width:50%">
                   </div>
                   <div style="margin-bottom:10px">
                      <input name="end_year" class="easyui-textbox" required="true" label="End Year" style="width:50%">
                   </div>
                </form>
               </div>
               <div id="dlg-buttons">
                  <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
                  <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
               </div>
               






              <!--Table Ends here -->
            </div>
   </div>
            
            
            
             
    <script src="../admin_dashboard/admin-seminfo.js"></script>   
    </body>
    </html>

