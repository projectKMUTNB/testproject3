<?php
@session_start();
require_once('includeteacher/connect.php');

if(!isset($_SESSION['teacher_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}

$teacher_code = $_SESSION['teacher_code'];
$teacher_password = md5($_POST['teacherpassword']);
$statusp_id = '1';

$query = "UPDATE teacher SET teacher_password = '$teacher_password' , statusp_id = '$statusp_id' WHERE teacher_code='$teacher_code'";
$result = mysqli_query($conn,$query);
if($result){
  echo '<script>';
  echo 'alert("การ Reset Password เสร็จสมบูรณ์ กรุณาเข้าสู่ระบบด้วย Password ใหม่")';
  echo '</script>';
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=login.php\" />";
}else{
  echo "<script>";
  echo "alert(\"mysqli_error($conn)\")";
  echo "</script>";
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=login.php\" />";
}

mysqli_close($conn);
?>
