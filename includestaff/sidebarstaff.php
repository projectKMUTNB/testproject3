<?
@session_start();
require_once('includestaff/connect.php');
if(!isset($_SESSION['staff_id']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}

$student_code = $_SESSION['staff_id'];

$z = "SELECT * FROM staff where staff_id = $staff_id" ;
$query = mysqli_query($conn,$z);
$z = mysqli_fetch_array($query);

?>
<section class="sidebar">
  <div class="user-panel">
    <div class="pull-left image">

      <?php $image = $z['img_staff'];
    if (empty($image)) $image = "user.png";

       ?>

        <img src="images/img-staff/<?php echo $image ;?>"class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><? echo $_SESSION['staff_name'].' '.$_SESSION['staff_surname']; ?></p>
      <i class="fa fa-circle text-success"></i> Online
    </div>
  </div>
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">เลือกหัวข้อ</li>
    <li>
        <a href="addstudentbystaff.php">
        <i class="fa fa-gear"></i> <span>เพิ่มรายชื่อนักศึกษา</span>
      </a>
    </li>
    <li>
      <a href="staffreport.php">
        <i class="glyphicon glyphicon-book"></i> <span>เรียก Report ต่างๆ</span>
      </a>
    </li>
  </ul>
</section>
