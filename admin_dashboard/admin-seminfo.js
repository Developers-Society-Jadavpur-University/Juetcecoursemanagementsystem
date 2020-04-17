var url;
function newUser(){
   $('#dlg').dialog('open').dialog('center').dialog('setTitle','New Batch entry');
   $('#fm').form('clear');
   url = '../admin_dashboard/save_batches.php';
}
function editUser(){
   var row = $('#dg').datagrid('getSelected');
   if (row){
      $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit Batch Details');
      $('#fm').form('load',row);
    url = '../admin_dashboard/update_batches.php?id='+row.id;
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
    $.messager.confirm('Confirm','Are you sure you want to archive this batch ?',function(r){
        if (r){
            $.post('../admin_dashboard/destroy_batches.php',{id:row.course_code},function(result)
            {
               if (result.success){
                   $('#dg').datagrid('reload'); // reload the user data
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

function moreactionUser(){

var row = $('#dg').datagrid('getSelected');
if (row){
    $.messager.confirm('Confirm','Are you sure to perform more action on this batch ?',function(r){
        if (r){
            $.post('../admin_dashboard/admin-batch_action.php',{id:row.course_code},function(result){
               if (result.success){
                   window.location = "admin_dashboard/admin-semstu_info.php?course_code="+row.course_code;
                   
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