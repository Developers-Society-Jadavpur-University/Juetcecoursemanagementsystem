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
    <body style="margin: -1.5%;">
        

      <div style="margin: auto;width: 80%; border: 3px solid white; padding: 10px;">
        <div id="p" class="easyui-panel" title="Subject Actions" style="width:100%;height:350px;padding:5px;"
                data-options="iconCls:'icon-save',collapsible:true,minimizable:false,maximizable:false,closable:false">
            
              <!--Table for the semester informations-->
        <table id="dg" title="All Subjects" class="easyui-datagrid" style="width:100%;height:100%;"
                url="../admin_dashboard/get_subject.php" 
                toolbar="#toolbar" pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
                <tr>
                    <th field="sub_code" width="08">Subject Code</th>
                    <th field="sub_name" width="15">Subject Name</th>
                    <th field="year" width="03">Year</th>
                    <th field="sem" width="04">Semester</th>
                    <th field="paper_type" width="05">Paper Type</th>
                    <th field="sub_type" width="05">Subject Type</th>
                    <th field="dept" width="12">Department</th>
                    <th field="faculty" width="14">Faculty</th>
                    
                </tr>
            </thead>
        </table>
        <div id="toolbar">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Add new Subject</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit Subject</a>
            <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-tip" plain="true" onclick="moreactionUser()">More Actions</a>-->
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Archive Subject</a>
        </div>
        
              <div id="dlg" class="easyui-dialog" style="width:700px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
                 <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
                     <h3>Enter Subject Information</h3>
                   <div style="margin-bottom:10px">
                      <input  name="sub_code" class="easyui-textbox" required="true" label="Code" style="width:30%;">
                   </div>
                   <div style="margin-bottom:10px">
                      <input name="sub_name" class="easyui-textbox" required="true" label="Name" style="width:80%">
                   </div>
                   <div style="margin-bottom:05px">
                      <!--<input name="year" class="easyui-textbox" required="true" label="Year" style="width:30%">-->
                     <select  name="year" class="easyui-combobox" required="true" label="Year" style="width:30%;">
                        
                        <option value="1">1st </option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                        <option value="4">4th</option>
                      </select>
                   </div>
                   <div style="margin-bottom:10px">
                      <!--<input name="sem" class="easyui-textbox" required="true" label="Semester" style="width:30%">-->
                      <select  name="sem" class="easyui-combobox" required="true" label="Semester" style="width:30%;">
                        
                        <option value="1">1st </option>
                        <option value="2">2nd</option>
                        
                      </select>
                   </div>
                   <div style="margin-bottom:10px">
                    <!--<input name="paper_type" class="easyui-textbox" required="true" label="Paper" style="width:40%">-->
                    <select  name="paper_type" class="easyui-combobox" required="true" label="Paper" style="width:40%;">
                        
                        <option value="Theoritical">Theoritical</option>
                        <option value="Sessional">Sessional</option>
                        
                      </select>
                   </div>
                   <div style="margin-bottom:10px">
                      <!--<input name="sub_type" class="easyui-textbox" required="true" label="Type" style="width:40%">-->
                      <select  name="sub_type" class="easyui-combobox" required="true" label="Type" style="width:40%;">
                        
                        <option value="Compulsory">Compulsory</option>
                        <option value="Optional">Optional</option>
                        <option value="Elective">Elective</option>
                      </select>
                   </div>
                   <div style="margin-bottom:10px">
                      <!--<input name="dept" class="easyui-textbox" required="true" label="Department" style="width:60%">-->
                      <select  name="dept" class="easyui-combobox" required="true" label="Department" style="width:60%;">
                        
                        <option value="Electronics and Telecommunication Engineering">Electronics and Telecommunication Engineering</option>
                       
                      </select>
                   </div>
                   <div style="margin-bottom:10px">
                      <!--<input name="faculty" class="easyui-textbox" required="true" label="Faculty" style="width:60%">-->
                      <select  name="faculty" class="easyui-combobox" required="true" label="Faculty" style="width:60%;">
                      
                         <option value="Faculty of Engineering and Technology">Faculty of Engineering and Technology</option>
                      </select>
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
            
            
            
             
    <script src="../admin_dashboard/admin-subinfo.js"></script>   
    </body>
    </html>

