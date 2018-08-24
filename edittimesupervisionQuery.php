<?php
session_start();
require_once('includeteacher/connect.php');

$sv_id = $_POST['sv_id'];
$sv_date = $_POST['sv_date'];
$sv_time = $_POST['sv_time'];

$query = "UPDATE supervision SET sv_date = '$sv_date',
sv_time = '$sv_time' WHERE sv_id='$sv_id'";
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
