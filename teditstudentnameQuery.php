<?php
session_start();
require_once('includeteacher/connect.php');

$student_code = $_POST['student_code'];
$student_name = $_POST['student_name'];
$student_surname = $_POST['student_surname'];

$query = "UPDATE student SET student_name = '$student_name',
student_surname = '$student_surname' WHERE student_code='$student_code'";
$result = mysqli_query($conn,$query);
if($result){
  echo '<script>';
  echo 'alert("ทำการแก้ไขข้อมูลเรียบร้อยแล้ว")';
  echo '</script>';
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=teacherindex.php\"/>";
}else{
  echo "<script>";
  echo "alert(\"mysqli_error($conn)\")";
  echo "</script>";
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=teacherindex.php\"/>";
}

mysqli_close($conn);
?>
