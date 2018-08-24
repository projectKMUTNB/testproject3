<?
@session_start();
require_once('connect.php');
if(!isset($_SESSION['student_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}

$student_code = $_SESSION['student_code'];

$z = "SELECT * FROM student where student_code = $student_code" ;
$query = mysqli_query($conn,$z);
$z = mysqli_fetch_array($query);

  $a1 = "SELECT * FROM apprenticeship where student_code = $student_code" ;
  $result100 = mysqli_query($conn,$a1);
  $count100 =  mysqli_num_rows($result100);
?>
<section class="sidebar">
  <div class="user-panel">
    <div class="pull-left image">
      <?php $image = $z['img_student'];
    if (empty($image)||$image=="null") $image = "user.png";

       ?>

        <img src="images/img-student/<?php echo $image ;?>"class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><? echo $_SESSION['student_name'].' '.$_SESSION['student_surname']; ?></p>
      <i class="fa fa-circle text-success"></i> Online
    </div>
  </div>
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">เลือกหัวข้อ</li>
    <?if($count100=='0'){?>
    <li>
        <a href="addstudentappren.php">
        <i class="fa fa-gear"></i> <span>เพิ่มสถานประกอบการทีฝึกงาน</span>
      </a>
    </li>
    <?}if($count100=='1'){}?>
    <li>
      <a href="studentaffcompany.php">
        <i class="glyphicon glyphicon-book"></i> <span>ดูข้อมูลและทำแบบประเมิน</span>
      </a>
    </li>
  </ul>
</section>
