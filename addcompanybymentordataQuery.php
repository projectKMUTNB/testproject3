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
$company_code = $_POST['company_code'];

    $query = "UPDATE mentor SET company_code = '$company_code' WHERE mentor_code='$mentor_code'";
    $result = mysqli_query($conn,$query);
    if($result){
    echo '<script>';
    echo 'alert("ทำการบันทึกการเลือกสถานประกอบการเรียบร้อยแล้ว")';
    echo '</script>';
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=checkcompany.php\"/>";
    }else{
    echo "<script>";
    echo "alert(\"mysqli_error($conn)\")";
    echo "</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=addcompanybymentor.php\"/>";
  }
mysqli_close($conn);
?>
