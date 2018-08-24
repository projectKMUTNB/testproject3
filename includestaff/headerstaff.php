<?
@session_start();
require_once('includestaff/connect.php');
if(!isset($_SESSION['staff_id']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}

$staff_id = $_SESSION['staff_id'];

$s = "SELECT * FROM staff where staff_id = $staff_id" ;
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
          $image = $s['img_staff'];
        if (empty($image)) $image = "user.png";

           ?>
          <img src="images/img-staff/<?php echo $image ;?>"class="user-image" alt="User Image">
          <span class="hidden-xs"><? echo $_SESSION['staff_name'].' '.$_SESSION['staff_surname']; ?></span>
        </a>
        <ul class="dropdown-menu">
          <li class="user-header">
          <img src="images/img-staff/<?php echo $image ;?>" class="img-circle" alt="User Image">
            <p>
              <? echo $_SESSION['staff_name'].' '.$_SESSION['staff_surname']; ?>
              <small></small>
            </p>
          </li>
          <li class="user-footer">
            <div class="pull-left">
              <a href="profilestaffedit.php" class="btn btn-default btn-flat">ตั้งค่าโปรไฟล์</a>
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
