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

date_default_timezone_set("Asia/Bangkok");
$teacher_code = $_POST['teacher_code'];
$mentor_code = $_SESSION['mentor_code'];
$inft_name = $_POST['inft_name'];
$inft_detail = $_POST['inft_detail'];
$inft_date = date("Y-m-d H:i:s");

      $query = "INSERT INTO informtopic values (' ',
      '$inft_name',
      '$inft_detail',
      '$inft_date',
      '$teacher_code',
      '$mentor_code')";

      $result = mysqli_query($conn,$query);
      if($result){
        echo "<script>alert(\"ทำการบันทึกข้อมูลแล้ว\");</script>";
        echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=informdaysupervision.php\">";
      }else{
        echo "<script>alert(";
        echo "บันทึกข้อมูลล้มเหลว(\"mysqli_error($conn)\")";
        echo ")</script>";
      }
      mysqli_close($conn);
  ?>
</body>
</html>
