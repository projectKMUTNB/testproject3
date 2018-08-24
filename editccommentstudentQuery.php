<?php
session_start();
require_once('includementor/connect.php');

$ccstudent_id = $_POST['ccstudent_id'];
$ccstudent_detail = $_POST['ccstudent_detail'];

$query = "UPDATE ccommentstudent SET ccstudent_detail = '$ccstudent_detail' WHERE ccstudent_id='$ccstudent_id'";
$result = mysqli_query($conn,$query);
if($result){
  echo '<script>';
  echo 'alert("ทำการแก้ไขข้อมูลเรียบร้อยแล้ว")';
  echo '</script>';
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=addstudentappandrecord.php\"/>";
}else{
  echo "<script>";
  echo "alert(\"mysqli_error($conn)\")";
  echo "</script>";
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=addstudentappandrecord.php\"/>";
}

mysqli_close($conn);
?>
