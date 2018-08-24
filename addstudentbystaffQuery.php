<?
@session_start();
require_once('includestaff/connect.php');
if(!isset($_SESSION['staff_id']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}
$student_code = $_POST['student_code'];
$student_name = $_POST['student_name'];
$student_surname = $_POST['student_surname'];
$student_department = $_POST['student_department'];

    $query = "INSERT INTO student values ('$student_code',
    '$student_name',
    '$student_surname',
    '$student_department',
    '4',
    '',
    '',
    '2','','','','')";

    $result = mysqli_query($conn,$query);

    if($result){
      echo "<script>alert(\"ทำการบันทึกข้อมูลเรียบร้อยแล้ว\")</script>";
      echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=addstudentbystaff.php\">";
    }else{
      echo "<script>alert(";
      echo "บันทึกข้อมูลล้มเหลว(\"mysqli_error($conn)\")";
      echo ")</script>";
    }
    mysqli_close($conn);
  ?>
?>
