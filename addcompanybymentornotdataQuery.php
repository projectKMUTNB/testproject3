<?
@session_start();
require_once('includementor/connect.php');
if(!isset($_SESSION['mentor_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}

$mentor_code = $_POST['mentor_code'];
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
      $b = "SELECT * FROM company WHERE company_name ='$company_name'" ;
      $query1 = mysqli_query($conn,$b);
      while ($b = mysqli_fetch_array($query1)) {
        $company_code = $b[0];
        $query2 = "UPDATE mentor SET company_code = '$company_code' WHERE mentor_code='$mentor_code'";
        $result1 = mysqli_query($conn,$query2);
        if($result1){
          echo '<script>';
          echo 'alert("ทำการบันทึกข้อมูลสถานประกอบการใหม่และเลือกสถานประกอบการเรียบร้อยแล้ว")';
          echo '</script>';
          echo "<meta http-equiv=\"refresh\" content=\"0;URL=checkcompany.php\"/>";
        }else{
          echo "<script>";
          echo "alert(\"mysqli_error($conn)\")";
          echo "</script>";
          echo "<meta http-equiv=\"refresh\" content=\"0;URL=addcompanybymentor.php\"/>";
        }
      }
    }else{
      echo "<script>alert(";
      echo "บันทึกข้อมูลล้มเหลว(\"mysqli_error($conn)\")";
      echo ")</script>";
    }
    mysqli_close($conn);
  ?>
