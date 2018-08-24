<?php
session_start();
require_once('includeteacher/connect.php');

$commentstu_id = $_POST['commentstu_id'];
$commentstu_detail = $_POST['commentstu_detail'];

$query = "UPDATE commentstudent SET commentstu_detail = '$commentstu_detail' WHERE commentstu_id='$commentstu_id'";
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
