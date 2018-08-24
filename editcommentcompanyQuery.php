<?php
session_start();
require_once('includeteacher/connect.php');

$commentcom_id = $_POST['commentcom_id'];
$commentcom_detail = $_POST['commentcom_detail'];

$query = "UPDATE commentcompany SET commentcom_detail = '$commentcom_detail' WHERE commentcom_id='$commentcom_id'";
$result = mysqli_query($conn,$query);
if($result){
  echo '<script>';
  echo 'alert("ทำการแก้ไขข้อมูลเรียบร้อยแล้ว")';
  echo '</script>';
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=selectstudent.php\"/>";
}else{
  echo "<script>";
  echo "alert(\"mysqli_error($conn)\")";
  echo "</script>";
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=selectstudent.php\"/>";
}

mysqli_close($conn);
?>
