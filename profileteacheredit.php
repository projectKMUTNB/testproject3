<?
@session_start();
require_once('includeteacher/connect.php');

if(!isset($_SESSION['teacher_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}
$teacher_code = $_SESSION['teacher_code'];

$a = "SELECT * FROM teacher where teacher_code = $teacher_code" ;
$query = mysqli_query($conn,$a);
while ($a = mysqli_fetch_array($query)) {

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>แก้ไขข้อมูลส่วนตัวของอาจารย์ &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <link rel="stylesheet" type="text/css" href="datetime/jquery.datetimepicker.css"/>
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <?php include('includeteacher/headerteacher.php'); ?>
    </header>
    <aside class="main-sidebar">
      <?php include('includeteacher/sidebarteacher.php'); ?>
    </aside>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          แก้ไขข้อมูลส่วนตัว
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="teacherindex.php"><i class="fa fa-dashboard"></i>Home</a>
          <li class="active"><i class="fa fa-gear"></i></li> แก้ไขข้อมูลส่วนตัว
        </ol>
      </section>
    <section class="content">
    <div class="col-xl-12">
      <!-- general form elements -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">แก้ไขข้อมูลส่วนตัวของอาจารย์</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="form" name="formProfile" method="POST" action="profileteachereditQuery.php" enctype="multipart/form-data" onSubmit="JavaScript:return fncsubmit('formProfile');">
          <div class="box-body">
                <p align="center">
                  <?php

                  $image =   $a[9];
                if (empty($image)) $image = "user.png";



                   ?>

                 <img src="images/img-teacher/<?php echo $image ;?>" class="img-responsive img-thumbnail" alt="Responsive image" width="200px;">
                </p>
                  <div class="form-group">
                    <label for="InputImage">
                      อัพโหลดรูปภาพโปรไฟล์ :
                    </label>
                    <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-camera"></i>
                    </div>
                    <input type="file" id="InputImage" class="form-control" name="img" class="input01" accept="images/*" capture>
                  </div>
                </div>
            <div class="form-group">
                  <label>ไอดีเข้าระบบ</label>
                  <input type="text" value="<? echo $a[0]; ?>" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>ชื่อ</label>
              <input type="text" name="teacher_name" value="<? echo $a[1]; ?>" class="form-control" >
            </div>
            <div class="form-group">
              <label>นามสกุล</label>
              <input type="text" name="teacher_surname" value="<? echo $a[2]; ?>" class="form-control" >
            </div>
            <div class="form-group">
              <label>ตำแหน่งทางวิชาการ</label>
              <select class="form-control select2" name="teacher_position" style="width: 100%;">
                <option selected="selected"><?echo $a[3]; ?></option>
                <option>อาจารย์</option>
                <option>ผู้ช่วยศาสตราจารย์</option>
                <option>รองศาสตราจารย์</option>
                <option>ศาสตราจารย์</option>
                <option>ดร.</option>
              </select>
            </div>
            <div class="form-group">
              <label>สาขา</label>
              <select class="form-control select2" name="teacher_department" style="width: 100%;">
                <option selected="selected"><?echo $a[4]; ?></option>
                <option>IT</option>
                <option>ITI</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" name="email_teacher" value="<? echo $a[6]; ?>" id="exampleInputEmail1" placeholder="กรุณากรอก Email">
            </div>
          </div>
          <!-- /.box-body -->
            <div class="box-footer">
              <input type="hidden" name="imgOld" value="<?php echo $a[9];?>">
              <button type="submit"  id="submit" name="submit" class="btn btn-success btn-round">ยืนยันการแก้ไขข้อมูล</button>
              <a href="teacherindex.php" class="btn btn-danger">ยกเลิกการแก้ไข</a>
            </div>
        </form>
      </div>
      </div>
      </section>
    </div>
    </div>
<?} mysqli_close($conn);?>
</body>
</html>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="datetime/jquery.datetimepicker.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
      demo.initDashboardPageCharts();
  });
</script>
<script>
$(function () {
  //Initialize Select2 Elements
  $('.select2').select2()
})
function fncsubmit(frm)
{
  $('.input01').filestyle({
    'placeholder' : 'รูปภาพโปรไฟล์',
    buttonText : 'เลือกรูป',
    buttonName : 'btn-danger'
  });

  $('#clear').click(function() {
    $('.input01').filestyle('clear');
  });
}
</script>
