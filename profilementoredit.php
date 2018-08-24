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

$a = "SELECT * FROM mentor where mentor_code = $mentor_code" ;
$query = mysqli_query($conn,$a);
while ($a = mysqli_fetch_array($query)) {

$company_code = $a[4];

$b = "SELECT * FROM company where company_code = $company_code" ;
$query2 = mysqli_query($conn,$b);
while ($b = mysqli_fetch_array($query2)) {

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>แก้ไขข้อมูลส่วนตัวของพี่เลี้ยง &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
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
<body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <?php include('includementor/headermentor.php'); ?>
    </header>
    <aside class="main-sidebar">
      <?php include('includementor/sidebarmentor.php'); ?>
    </aside>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          แก้ไขข้อมูลส่วนตัว
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="mentorindex.php"><i class="fa fa-dashboard"></i>Home</a>
          <li class="active"><i class="fa fa-gear"></i></li> แก้ไขข้อมูลส่วนตัว
        </ol>
      </section>
    <section class="content">
    <div class="col-xl-12">
      <!-- general form elements -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">แก้ไขข้อมูลส่วนตัวของพี่เลี้ยง</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="form" name="formProfile" method="POST" action="profilementoreditQuery.php" enctype="multipart/form-data" onSubmit="JavaScript:return fncsubmit('formProfile');">
          <div class="box-body">

            <?php
            $image = $a['img_mentor'];
          if (empty($image)) $image = "user.png";

             ?>

                <p align="center">
                  <img src="images/img-mentor/<?php echo $image;?>" class="img-responsive img-thumbnail" alt="Responsive image" width="200px;">
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
            <label>ชื่อสถานประกอบการที่สังกัด</label>
            <input type="text" value="<? echo $b[1]; ?>" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" value="<? echo $a[5]; ?>" id="exampleInputEmail1" value="<? echo $a[4]; ?>" placeholder="กรุณากรอก Email" disabled>
            </div>
            <div class="form-group">
              <label>ชื่อ</label>
              <input type="text" name="mentor_name" value="<? echo $a[1]; ?>" class="form-control" placeholder="กรุณากรอกชื่อ">
            </div>
            <div class="form-group">
              <label>นามสกุล</label>
              <input type="text" name="mentor_surname" value="<? echo $a[2]; ?>" class="form-control" placeholder="กรุณากรอกนามสกุล">
            </div>
            <div class="form-group">
              <label>เบอร์โทรศัพท์</label>
              <input type="text" name="mentor_tel" value="<? echo $a[3]; ?>" class="form-control" placeholder="กรุณากรอกเบอร์โทรศัพท์">
            </div>
          </div>
          <!-- /.box-body -->
            <div class="box-footer">
              <input type="hidden" name="imgOld" value="<?php echo $a[8];?>">
              <button type="submit"  id="submit" name="submit" class="btn btn-success btn-round">ยืนยันการแก้ไขข้อมูล</button>
              <a href="mentorindex.php" class="btn btn-danger">ยกเลิกการแก้ไข</a>
            </div>
        </form>
      </div>
      </div>
      </section>
    </div>
    </div>
<?}
}mysqli_close($conn);?>
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
