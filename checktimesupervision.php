<html lang="en">
<head>
    <meta charset="utf-8" />
    <!--<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>หน้าปักหมุดเพื่อระบุตำแหน่ง &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>
<body>
  <?
  @session_start();
  require_once('includementor/connect.php');

  if(!isset($_SESSION['email_mentor']))
  header("location:login.php");
  if(isset($_GET['logout'])){
    session_destroy();
    header("location:login.php");
  }
  $query = "SELECT * FROM apprenticeship WHERE mentor_code = '$_SESSION[mentor_code]' ORDER BY student_code ASC";
  $result = mysqli_query($conn,$query);
  $num = mysqli_num_rows($result);


  ?>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
          <? include('includementor/sidebarmentor.php'); ?>
        </div>
        <div class="main-panel">
          <? include('includementor/headermentor.php'); ?>
<div class="content">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card">
          <div class="card-header" data-background-color="blue">
              <h4 class="title">เลือกนักศึกษาที่ฝึกงาน</h4>
              <p class="category">รายละเอียดนักศึกษาที่ฝึกงานในสถานประกอบการ</p>
          </div>
          <br>
          <div class="col-lg-12 col-md-12">
            <div class="row">

          <div class="col-lg-12">
            <div id="page-content-wrapper">
<div class="container-fluid">
<?php
while($row = mysqli_fetch_array($result)) {
?>
<div class="panel panel-primary">
<div class="panel-heading">
<h4 class="panel-title">
  <?php echo "ข้อมูลนักศึกษา";?>
</h4>
</div>
<div class="panel-body">
<?
$student_code = $row['student_code'];
$company_code = $row['company_code'];
$b = "SELECT * FROM student where student_code = $student_code" ;
$query1 = mysqli_query($conn,$b);
while ($b = mysqli_fetch_array($query1)) {?>
<?  $c = "SELECT s.student_code,s.sv_date FROM supervision s RIGHT JOIN apprenticeship a
on s.student_code = a.student_code where a.student_code = '$student_code'" ;
  $query2 = mysqli_query($conn,$c);
  while ($c = mysqli_fetch_array($query2)) {?>
<p><b>รหัสนักศึกษา</b> : <?php echo $row['student_code'];?></p>
<p><b>ชื่อ-นามสกุลนักศึกษา</b> : <?php echo $b[1].' '.$b[2];?></p>
<p><b>สังกัดสาขา</b> : <?php echo $b[3];?></p>
<p><b>วันเวลาในการนิเทศนักศึกษา</b> : <?php echo $c[1];?></p>
</div>
</div>
<? } ?>
<? } ?>
<?php } ?>
<center>
</center>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>
