<?php
@session_start();
require_once('includestudent/connect.php');

if(!isset($_SESSION['student_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}

$student_code = $_SESSION['student_code'];
$student_password = md5($_POST['studentpassword']);
$statusp_id = '1';

$query = "UPDATE student SET student_password = '$student_password' , statusp_id = '$statusp_id' WHERE student_code='$student_code'";
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
