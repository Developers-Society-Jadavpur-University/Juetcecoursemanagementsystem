<?php

$id = $_POST["id"];


include '../includes/dbh.inc.php';

$sql = "DELETE FROM stu_notice WHERE notice_id='$id'";
mysqli_query($conn,$sql);
$sql = "SELECT * FROM stu_notice WHERE notice_id='$id'";
$row = mysqli_query($conn,$sql);
$id = $row['file_id'];
$file = explode("/",$row['notice_id']);
$file = implode("_",$file);
$filename ="../notice_uploads/notice".$file.".".$id."*";
$fileInfo = glob($filename);
$fileExt = explode(".", $fileInfo[0]);
$fileActualExt = end($fileExt);
$file = "../notice_uploads/notice".$file.".".$id.".".$fileActualExt;
if(!unlink($file)){
    echo "Try Again!";
    exit();
}else{
$sql = "DELETE FROM notice_uploads WHERE 'file_id'='$id'";
mysqli_query($conn,$sql);

echo json_encode(array(
	/*'notice_id' => $notice_id,
    'date_time_create' => $date_time_create,
    'date_time_expiry' => $date_time_expiry,
	'notice' => $notice,
    'remarks' => $remarks,
    'visibility'=>$visibility,*/
	'success'=>true
));





}

?>