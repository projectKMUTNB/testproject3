<?
@session_start();
require_once('includestaff/connect.php');
if(!isset($_SESSION['staff_id']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:/login.php");
}

$message = '';
$dir_upload = 'images/img-staff/';
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

$staff_id = $_SESSION['staff_id'];
$staff_name = $_POST['staff_name'];
$staff_surname = $_POST['staff_surname'];
$img_staff = $new_name;

if($message == '' || $message == 'อัพโหลดสำเร็จ'){
  $query = "UPDATE staff SET
    staff_name = '$staff_name',
    staff_surname = '$staff_surname',
    img_staff  = '$img_staff' WHERE staff_id = '$staff_id'";
    $result = mysqli_query($conn,$query);
    if($result){
      echo '<script>';
      echo 'alert("แก้ไขข้อมูลเรียบร้อยแล้ว")';
      echo '</script>';
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=profilestaffedit.php\" />";
    }else{
      echo "<script>";
      echo "alert(\"mysqli_error($conn)\")";
      echo "</script>";
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=profilestaffedit.php\" />";
    }
  } else {
    echo "<script>";
    echo "alert(\"$message\")";
    echo "</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=profilestaffedit.php\" />";
  }
  mysqli_close($conn);
?>
