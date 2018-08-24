<?
@session_start();
require_once('includestudent/connect.php');
if(!isset($_SESSION['student_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:/login.php");
}

$student_code = $_POST['student_code'];
$company_name = $_POST['company_name'];
$company_address = $_POST['company_address'];
$company_email = $_POST['company_email'];
$company_tel = $_POST['company_tel'];

    $query = "INSERT INTO company values ('',
    '$company_name',
    '$company_address',
    '$company_email',
    '$company_tel','2')";

    $result = mysqli_query($conn,$query);

    if($result){
          echo '<script>';
          echo 'alert("ทำการบันทึกข้อมูลสถานประกอบการเรียบร้อยแล้ว")';
          echo '</script>';
          echo "<meta http-equiv=\"refresh\" content=\"0;URL=addstudentappren.php\"/>";
        }else{
          echo "<script>";
          echo "alert(\"mysqli_error($conn)\")";
          echo "</script>";
          echo "<meta http-equiv=\"refresh\" content=\"0;URL=addstudentappren.php\"/>";
        }
    mysqli_close($conn);
  ?>
