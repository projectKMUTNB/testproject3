<?
@session_start();
require_once('includestudent/connect.php');
if(!isset($_SESSION['student_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:/login.php");
}

$message = '';
$dir_upload = 'images/img-student/';
$max_size = 8000000;
$file = $_FILES['img'];

$new_name='';

if($file['name'] != ""){
  if ($file['size'] <= $max_size && $file['size'] > 0) {
    $new_name = time() . '-' . $file['name'];
    $copied = copy($file['tmp_name'] , $dir_upload . $new_name);
    if ($copied) {
      $message = 'อัพโหลดสำเร็จ';
    } else {
      $message = 'อัพโหลดผิดพลาด!';
    }
  }else if($file['name'] == ""){
    $message = '';
  }else {
    $message = 'อัพโหลดผิดพลาดขนาดไฟล์รูปใหญ่กว่า 8mb กรุณาทำการอัพโหลดใหม่อีกครั้ง';
  }
}else{
  $new_name= $_POST['imgOld'];
}

$student_code = $_SESSION['student_code'];
$student_name = $_POST['student_name'];
$student_surname = $_POST['student_surname'];
$email_student = $_POST['email_student'];
$img_student = $new_name;
$student_address = $_POST['student_address'];
$student_phone = $_POST['student_phone'];

if($message == '' || $message == 'อัพโหลดสำเร็จ'){
  $query = "UPDATE student SET
    student_name = '$student_name',
    student_surname = '$student_surname',
    email_student = '$email_student',
    img_student  = '$img_student',
    student_address = '$student_address',
    student_phone = '$student_phone'
    WHERE student_code = '$student_code'";
    $result = mysqli_query($conn,$query);
    if($result){
      echo '<script>';
      echo 'alert("แก้ไขข้อมูลเรียบร้อยแล้ว")';
      echo '</script>';
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=profilestudentedit.php\" />";
    }else{
      echo "<script>";
      echo "alert(\"mysqli_error($conn)\")";
      echo "</script>";
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=profilestudentedit.php\" />";
    }
  } else {
    echo "<script>";
    echo "alert(\"$message\")";
    echo "</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=profilestudentedit.php\" />";
  }
  mysqli_close($conn);
?>
