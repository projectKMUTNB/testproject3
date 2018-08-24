<?
@session_start();
require_once('connect.php');
if(!isset($_SESSION['teacher_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}
?>
<!--<div class="sidebar-wrapper">
<ul class="nav">
  <!--<li class="active">
    <a href="adminmanage.php">
    <i class="material-icons">dashboard</i>
    <p>หน้าหลัก</p>
    </a>
  </li>
  <li>
    <a href="teachersearchlocation.php">
    <i class="material-icons">person_pin_circle</i>
    <p>ค้นหาตำแหน่งที่ปักหมุด</p>
    </a>
  </li>
  <li>
    <a href="teacherformstudent.php">
     <i class="material-icons">library_books</i>
     <p>ประเมินผลและจัดการข้อมูล</p>
     </a>
   </li>
  <li>
    <a href="selectstudent.php">
    <i class="material-icons">work</i>
    <p>test</p>
    </a>
  </li>
<!--   <li>
    <a href="mainrecordcompany.php">
    <i class="material-icons">note</i>
    <p>จัดการข้อมูลหัวข้ออาจารย์ประเมินสถานประกอบการ</p>
    </a>
  </li>
  <li>
   <a href="mainrecordstudent.php">
   <i class="material-icons">note</i>
   <p>จัดการข้อมูลหัวข้ออาจารย์ประเมินนักศึกษา</p>
   </a>
 </li>
 <li>
    <a href="./maps.html">
    <i class="material-icons">location_on</i>
    <p>Maps</p>
    </a>
  </li>
  <li>
    <a href="./notifications.html">
    <i class="material-icons text-gray">notifications</i>
    <p>Notifications</p>
    </a>
  </li>
</ul>
</div>-->
<section class="sidebar">
  <div class="user-panel">
    <div class="pull-left image">
      <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><? echo $_SESSION['teacher_name'].' '.$_SESSION['teacher_surname']; ?></p>
      <i class="fa fa-circle text-success"></i> Online
    </div>
  </div>
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">เลือกหัวข้อ</li>
    <li>
      <a href="teachersearchlocation.php">
        <i class="fa fa-map-marker"></i> <span>ค้นหาเส้นทางในการไปนิเทศ</span>
      </a>
    </li>
    <li>
      <a href="teachereditstudentname.php">
        <i class="fa fa-gear"></i> <span>แก้ไขชื่อนักศึกษา</span>
      </a>
    </li>
    <li>
      <a href="selectstudent.php">
        <i class="fa fa-street-view"></i> <span>กำหนดชื่อนักศึกษาที่จะไปนิเทศ</span>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-calendar-plus-o"></i> <span>ระบุเวลาในการนิเทศ</span>
      </a>
    </li>
  </ul>
</section>
<!-- /.sidebar -->
