<?
@session_start();
require_once('includementor/connect.php');
if(!isset($_SESSION['mentor_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}

$mentor_code = $_SESSION['mentor_code'];

$z = "SELECT * FROM mentor where mentor_code = $mentor_code" ;
$query = mysqli_query($conn,$z);
while ($z = mysqli_fetch_array($query)) {

$company_code = $z[4];

$a1 = "SELECT * FROM company where company_code = $company_code" ;
$result100 = mysqli_query($conn,$a1);
$count100 =  mysqli_num_rows($result100);

?>
<section class="sidebar">
  <div class="user-panel">
    <div class="pull-left image">
      <?php $image = $z['img_mentor'];
    if (empty($image)) $image = "user.png";

       ?>

      <img src="images/img-mentor/<?php echo $image; }?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><? echo $_SESSION['mentor_name'].' '.$_SESSION['mentor_surname']; ?></p>
      <i class="fa fa-circle text-success"></i> Online
    </div>
  </div>
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">เลือกหัวข้อ</li>
    <? if($count100=='0'){ ?>
    <li>
        <a href="addcompanybymentor.php">
        <i class="fa fa-briefcase"></i><span>เพิ่มสถานประกอบการที่สังกัด</span>
      </a>
    </li>
  <? }if($count100=='1'){ ?>
    <li>
        <a href="checkcompany.php">
        <i class="fa fa-briefcase"></i><span>ดูสถานประกอบการที่สังกัด</span>
      </a>
    </li>
  <? } ?>
    <li>
        <a href="addstudentappandrecord.php">
        <i class="fa fa-user-plus"></i><span>ทำแบบประเมินนักศึกษา</span>
      </a>
    </li>
    <li>
        <a href="checkdaysupervision.php">
        <i class="fa fa-calendar-check-o "></i><span>ตรวจสอบวันที่อาจารย์มานิเทศ</span>
      </a>
    </li>
    <li>
      <a href="informdaysupervision.php">
        <i class="glyphicon glyphicon-book"></i><span>แจ้งวัน-เวลากับอาจารย์ที่มานิเทศ</span>
      </a>
    </li>
  </ul>
</section>
