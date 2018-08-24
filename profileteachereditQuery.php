<?
@session_start();
require_once('includeteacher/connect.php');

if(!isset($_SESSION['teacher_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}

$message = '';
$dir_upload = 'images/img-teacher/';
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

$teacher_code = $_SESSION['teacher_code'];
$teacher_name = $_POST['teacher_name'];
$teacher_surname = $_POST['teacher_surname'];
$teacher_position = $_POST['teacher_position'];
$teacher_department = $_POST['teacher_department'];
$email_teacher = $_POST['email_teacher'];
$img_teacher = $new_name;

if($message == '' || $message == 'อัพโหลดสำเร็จ'){
  $query = "UPDATE teacher SET
    teacher_name = '$teacher_name',
    teacher_surname = '$teacher_surname',
    teacher_position = '$teacher_position',
    teacher_department = '$teacher_department',
    email_teacher  = '$email_teacher',
    img_teacher  = '$img_teacher'
    WHERE teacher_code = '$teacher_code'";

    $result = mysqli_query($conn,$query);
    if($result){
      echo '<script>';
      echo 'alert("แก้ไขข้อมูลเรียบร้อยแล้ว")';
      echo '</script>';
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=profileteacheredit.php\" />";
    }else{
      echo "<script>";
      echo "alert(\"mysqli_error($conn)\")";
      echo "</script>";
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=profileteacheredit.php\" />";
    }
  } else {
    echo "<script>";
    echo "alert(\"$message\")";
    echo "</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=profileteacheredit.php\" />";
  }
  mysqli_close($conn);
?>
