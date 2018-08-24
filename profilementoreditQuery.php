<?
@session_start();
require_once('includementor/connect.php');
if(!isset($_SESSION['mentor_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}

$message = '';
$dir_upload = 'images/img-mentor/';
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

$mentor_code = $_SESSION['mentor_code'];
$mentor_name = $_POST['mentor_name'];
$mentor_surname= $_POST['mentor_surname'];
$mentor_tel = $_POST['mentor_tel'];
$img_mentor = $new_name;

if($message == '' || $message == 'อัพโหลดสำเร็จ'){
  $query = "UPDATE mentor SET
    mentor_name = '$mentor_name',
    mentor_surname = '$mentor_surname',
    mentor_tel = '$mentor_tel',
    img_mentor  = '$img_mentor'
    WHERE mentor_code = '$mentor_code'";
    $result = mysqli_query($conn,$query);
    if($result){
      echo '<script>';
      echo 'alert("แก้ไขข้อมูลเรียบร้อยแล้ว")';
      echo '</script>';
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=profilementoredit.php\" />";
    }else{
      echo "<script>";
      echo "alert(\"mysqli_error($conn)\")";
      echo "</script>";
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=profilementoredit.php\" />";
    }
  } else {
    echo "<script>";
    echo "alert(\"$message\")";
    echo "</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=profilementoredit.php\" />";
  }
  mysqli_close($conn);
?>
