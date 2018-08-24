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

$s = "SELECT * FROM student where student_code = $student_code" ;
$query = mysqli_query($conn,$s);
$s = mysqli_fetch_array($query);
?>
<a href="#" class="logo">
  <span class="logo-mini"><b>ME</b>S</span>
  <span class="logo-lg"><b>MESSS</b></span>
</a>
<nav class="navbar navbar-static-top">
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <?php
          $image = $s['img_student'];
        if (empty($image)||$image=="null") $image = "user.png";

           ?>
          <img src="images/img-student/<?php echo $image ;?>"class="user-image" alt="User Image">
          <span class="hidden-xs"><? echo $_SESSION['student_name'].' '.$_SESSION['student_surname']; ?></span>
        </a>
        <ul class="dropdown-menu">
          <li class="user-header">
          <img src="images/img-student/<?php echo $image ;?>" class="img-circle" alt="User Image">
            <p>
              <? echo $_SESSION['student_name'].' '.$_SESSION['student_surname']; ?>
              <small></small>
            </p>
          </li>
          <li class="user-footer">
            <div class="pull-left">
              <a href="profilestudentedit.php" class="btn btn-default btn-flat">ตั้งค่าโปรไฟล์</a>
            </div>
            <div class="pull-right">
              <a onclick="window.location.href='?logout'" class="btn btn-default btn-flat">ออกจากระบบ</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
