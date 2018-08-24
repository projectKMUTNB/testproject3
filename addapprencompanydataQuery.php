<?php
session_start();
require_once('includeteacher/connect.php');

$student_code = $_POST['student_code'];
$mentor_code = $_POST['mentor_code'];
$company_code = $_POST['company_code'];

$d = "SELECT * FROM apprenticeship where student_code = $student_code;" ;
$result2 = mysqli_query($conn,$d);
$count2 =  mysqli_num_rows($result2);

if ($count2=='0') {
  $query = "INSERT INTO apprenticeship values ('','$student_code','$company_code','$mentor_code')";
$result = mysqli_query($conn,$query);
if($result){
  echo '<script>';
  echo 'alert("ทำการเพิ่มข้อมูลเรียบร้อยแล้ว")';
  echo '</script>';
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=studentindex.php\"/>";
}else{
  echo "<script>";
  echo "alert(\"mysqli_error($conn)\")";
  echo "</script>";
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=studentindex.php\"/>";
}
}
else {
  echo '<script>';
  echo 'alert("ไม่สามารถเพิ่มข้อมูลได้เนื่องจากมีข้อมูลในระบบแล้ว")';
  echo '</script>';
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=studentindex.php\"/>";
}
mysqli_close($conn);
?>
