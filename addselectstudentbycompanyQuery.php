<html>
<head>
</head>
<body>
  <?
  @session_start();
  require_once('includementor/connect.php');
  if(!isset($_SESSION['mentor_code']))
  header("location:login.php");
  if(isset($_GET['logout'])){
    session_destroy();
    header("location:login.php");
  }

$student_code = $_POST['student_code'];
$mentor_code = $_SESSION['mentor_code'];

$c = "SELECT * FROM apprenticeship where student_code = $student_code" ;
$result1 = mysqli_query($conn,$c);
$count =  mysqli_num_rows($result1);

$b = "SELECT * FROM mentor where mentor_code = $mentor_code" ;
$query1 = mysqli_query($conn,$b);

if($count==0){
while ($b = mysqli_fetch_array($query1)) {
      $company_code = $b['company_code'];

      if(empty($b['company_code'])){
        echo "<script>alert(\"ไม่สามารถเพิ่มข้อมูลได้เนื่องจากท่านยังไม่ได้สังกัดสถานประกอบการใด\");</script>";
        echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=addstudentappandrecord.php\">";
      }else{
      $query = "INSERT INTO apprenticeship values (' ',
      '$student_code',
      '$company_code',
      '$mentor_code')";
      $result = mysqli_query($conn,$query);
      if($result){
        echo "<script>alert(\"ทำการบันทึกข้อมูลแล้ว\");</script>";
        echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=addstudentappandrecord.php\">";
      }else{
        echo "<script>alert(";
        echo "บันทึกข้อมูลล้มเหลว(\"mysqli_error($conn)\")";
        echo ")</script>";
      }
      mysqli_close($conn);
      }
    }
    }if ($count==1) {
      echo "<script>alert(\"ไม่สามารถทำรายการได้เนื่องจากมีข้อมูลนักศึกษาในระบบแล้ว\");</script>";
      echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=addstudentappandrecord.php\">";
    }
    ?>
</body>
</html>
