<?php
@session_start();
require_once('includementor/connect.php');
if(!isset($_SESSION['mentor_code']))
header("location:login.php");
if(isset($_GET['logout'])){
session_destroy();
header("location:login.php");
}

date_default_timezone_set("Asia/Bangkok");
$inft_id = $_POST['inft_id'];
$inft_detail = $_POST['inft_detail'];
$inft_date = date("Y-m-d H:i:s");

$query = "UPDATE informtopic SET inft_detail = '$inft_detail',
inft_date = '$inft_date'
 WHERE inft_id='$inft_id'";
$result = mysqli_query($conn,$query);
if($result){
  echo '<script>';
  echo 'alert("ทำการแก้ไขข้อมูลเรียบร้อยแล้ว")';
  echo '</script>';
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=informdaysupervision.php\"/>";
}else{
  echo "<script>";
  echo "alert(\"mysqli_error($conn)\")";
  echo "</script>";
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=informdaysupervision.php\"/>";
}

mysqli_close($conn);
?>
