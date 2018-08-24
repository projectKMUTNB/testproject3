<?
@session_start();
require_once('includeteacher/connect.php');
if(!isset($_SESSION['teacher_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:/login.php");
}
$mrc_name = $_POST['mrc_name'];
?>
<html lang="en">
<head>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
      <?
            $query = "INSERT INTO mainrecordcompany values (' ',
            '$mrc_name','2')";
            $result = mysqli_query($conn,$query);

            if($result){
                ?> <script>swal("เรียบร้อยแล้ว!", "ทำการบันทึกข้อมูลเรียบร้อยแล้ว", "success" , {buttons: false,});
                  </script>
            <?  echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"4; URL=companychoicemanage.php\">";
              }else{
            ?> <script>swal("คำเตือน!", "ไม่สามารถทำการบันทึกข้อมูลได้", "danger" , {buttons: false,});</script>
            <?  echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"4; URL=companychoicemanage.php\">";
          }
      ?>
<? mysqli_close($conn); ?>
</body>
</html>
