<html>
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  <?
  @session_start();
  require_once('includeteacher/connect.php');

  if(!isset($_SESSION['teacher_code']))
  header("location:login.php");
  if(isset($_GET['logout'])){
    session_destroy();
    header("location:login.php");
  }

date_default_timezone_set("Asia/Bangkok");

$student_code = $_POST['student_code'];
$teacher_code = $_SESSION['teacher_code'];
$sv_date = $_POST['sv_date'];
$sv_time = $_POST['sv_time'];

$c = "SELECT * FROM supervision where student_code = $student_code;" ;
$result1 = mysqli_query($conn,$c);
$count =  mysqli_num_rows($result1);

if($count==0){
      $query = "INSERT INTO supervision values (' ',
      '$student_code',
      '$teacher_code',
      '$sv_date',
      '$sv_time')";

      $result = mysqli_query($conn,$query);
      if($result){
        echo "<script>swal(\"ทำการบันทึกข้อมูลเรียบร้อยแล้ว", "success\");</script>";
        echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=selectstudent.php\">";
      }else{
        echo "<script>alert(";
        echo "บันทึกข้อมูลล้มเหลว(\"mysqli_error($conn)\")";
        echo ")</script>";
      }
      mysqli_close($conn);
    }if ($count==1) {
      echo "<script>swal(\"ไม่สามารถทำการบันทึกข้อมูลได้เนื่องจากมีข้อมูลในระบบแล้ว", "warning\");</script>";
      echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=selectstudent.php\">";
    }
    ?>
</body>
</html>
