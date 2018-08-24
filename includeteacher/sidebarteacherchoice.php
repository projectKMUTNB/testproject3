<?
@session_start();
require_once('connect.php');
if(!isset($_SESSION['teacher_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}

$teacher_code = $_SESSION['teacher_code'];

$z = "SELECT * FROM teacher where teacher_code = $teacher_code" ;
$query = mysqli_query($conn,$z);
$z = mysqli_fetch_array($query);
?>
<section class="sidebar">
  <div class="user-panel">

    <div class="pull-left image">
      <?php

      if(!isset($_SESSION['picture'])){

        $image = $z['img_teacher'];
      if (empty($image)) $image = "user.png";

        ?>

      <img src="images/img-teacher/<?php echo $image ;?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><? echo $_SESSION['teacher_name'].' '.$_SESSION['teacher_surname']; ?></p>

 <?php } ?>

 <?php

 if(isset($_SESSION['picture'])){ ?>
 <img src="<?php echo $_SESSION['picture'] ?>" class="img-circle" alt="User Image">
</div>
<div class="pull-left info">
 <p>   <?php echo $_SESSION['givenName'].' '.$_SESSION['familyName']; ?></p>

<?php } ?>

      <i class="fa fa-circle text-success"></i> Online
    </div>
  </div>
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">เลือกหัวข้อ</li>
    <li>
      <a href="teacherindex.php">
        <i class="fa fa-dashboard"></i> <span>กลับสู่หน้าหลัก</span>
      </a>
    </li>
    <li>
      <a href="companychoicemanage.php">
        <i class="fa fa-file"></i> <span>อาจารย์ประเมินสถานประกอบการ</span>
      </a>
    </li>
    <li>
      <a href="studentchoicemanage.php">
        <i class="fa fa-file"></i> <span>อาจารย์ประเมินนักศึกษา</span>
      </a>
    </li>
    <li>
      <a href="stucomanychoicemanage.php">
        <i class="fa fa-file"></i> <span>นศ. ประเมินสถานประกอบการ</span>
      </a>
    </li>
    <li>
      <a href="comstudentchoicemanage.php">
        <i class="fa fa-file"></i> <span>สถานประกอบการประเมิน นศ.</span>
      </a>
    </li>
  </ul>
</section>
<!-- /.sidebar -->
