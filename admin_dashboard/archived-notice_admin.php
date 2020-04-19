<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../jquery_ui/css/icon.css">
    <link rel="stylesheet" type="text/css" href="../jquery_ui/css/demo.css">
    <script type="text/javascript" src="../jquery_ui/js/jquery.min.js"></script>
    <script type="text/javascript" src="../jquery_ui/js/jquery.easyui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <title>Archived Notices</title>
    
</head>
<body style="margin: -1.5%;">
    <?php 
        require "../header.php";
        require "../admin_dashboard/cms-nav_admin.php";
    ?>
    <div style="margin: auto;width: 98%;height: 800px; border: 3px solid white; padding: 10px;">
    <table id="dg" title="Archived Notices" class="easyui-datagrid" style="width:100%;height:98%;"
                url="../admin_dashboard/archived-notice_admin.php" 
                toolbar="#toolbar" pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true"
                data-options="iconCls:'icon-tip',collapsible:true,minimizable:false,maximizable:false,closable:false"
                >
            <thead>
                <tr>
                    <th field="notice_id" width="10">Notice ID</th>
                    <th field="date_time_create" width="10">Issue DateTime</th>
                    <th field="date_time_expiry" width="10">Expiry DateTime</th>
                    <th field="notice" width="50">Notice</th>
                    <th field="remarks" width="13">Remarks</th>
                    <th field="visibility" width="13">Visibility</th>
.                </tr>
            </thead>
            <?php
                require "../includes/dbh.inc.php";
                $result = mysqli_query($conn, "SELECT * FROM stu_notice WHERE notice_status='archived'");
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>
                            <td field="notice_id" width="50">'.$row['notice_id'].'</td>
                            <td field="date_time_create" width="50">'.$row["date_time_create"].'</td>
                            <td field="date_time_expiry" width="50">'.$row["date_time_expiry"].'</td>
                            <td field="notice" width="50">'.$row["notice"].'</td>';
                            if($row['file_id'] == ""){
                                echo '<td field="remarks" width="50">NA</td>';
                            }
                            else{
                                //Add proper file link here by proper query.
                                    $id = $row['file_id'];
                                    $noticeLink = explode("/",$row['notice_id']);
                                    $query = mysqli_query($conn,"SELECT * FROM notice_uploads WHERE file_id = $id");
                                    $row_new = mysqli_fetch_assoc($query);
                                    $format = $row_new['extension'];
                                    $link = "../notice_uploads/notice".".".$noticeLink[0]."_".$noticeLink[1].".".$id.".".$format;

                                    echo '<td field="remarks" width="50"><a href='.$link.'>Click here for details</a></td>';
                                }
                    echo   '<td field="visibility" width="50">'.$row["notice_visible"].'</td>
                        </tr>';
                }
            ?>
        </table>

        <div id="toolbar">
            <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyNotice()">
            Delete Notice</a>-->
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyNotice()">Delete Notice</a>
        </div>
            </div>
        <script type="text/javascript">
            function destroyNotice(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Are you sure you want to remove this notice from archived section also ?',function(r){
                    if (r){
                        $.post('../admin_dashboard/destroy_archived_notices.php',{id:row.notice_id},function(result)
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
        </script>

        <!--div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
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
        </div-->

    <?php require "../footer.php"; ?>
</body>
</html>