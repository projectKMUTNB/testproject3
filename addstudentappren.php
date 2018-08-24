<?
@session_start();
require_once('includestudent/connect.php');
if(!isset($_SESSION['student_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:/login.php");
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>เลือกวิธีเพิ่มที่ฝึกงาน &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <?php include('includestudent/headerstudent.php'); ?>
  </header>
  <aside class="main-sidebar">
    <?php include('includestudent/sidebarstudent.php'); ?>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        เพิ่มที่ฝึกงาน
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> -->
        <li><a href="studentindex.php"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fa fa fa-gear"></i></li> เพิ่มสถานประกอบการทีฝึกงาน
      </ol>
    </section>
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-solid">
          <div class="box-header">
            <h3 class="box-title text-primary">เพิ่มที่ฝึกงานแบบมีข้อมูลสถานประกอบการในระบบแล้ว</h3>
          </div>
          <div class="box-body text-center">
            <div class="sparkline" data-type="pie" data-offset="100" data-width="100px" data-height="100px">
              <a href="addapprencompanydata.php"><img src="images/img-system/2.jpg" class="img-responsive"></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box box-solid">
          <div class="box-header">
            <h3 class="box-title text-primary">เพิ่มสถานประกอบการ</h3>
          </div>
            <div class="box-body text-center">
            <div class="sparkline" data-type="line"  data-spot-Radius="3" data-highlight-Spot-Color="#f39c12" data-highlight-Line-Color="#222" data-min-Spot-Color="#f56954" data-max-Spot-Color="#00a65a" data-spot-Color="#39CCCC" data-offset="90" data-width="100%" data-height="100px" data-line-Width="2" data-line-Color="#39CCCC" data-fill-Color="rgba(57, 204, 204, 0.08)">
              <a href="addapprencompanynotdata.php" data-toggle="modal" data-target="#add"><img src="images/img-system/3.jpg" class="img-responsive"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">ตรวจสอบชื่อสถานประกอบการ</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>กรอกชื่อสถานประกอบการที่ต้องการค้นหา</label>
              <select class="form-control select2" name="id" data-placeholder="กรอกชื่อสถานประกอบการ"
              style="width: 100%;">
              <? $b = "SELECT * FROM company where approve_status = '1'" ;
              $query1 = mysqli_query($conn,$b);
              while ($b = mysqli_fetch_array($query1)) {?>
                <option></option>
                <option><? ; echo $b[1];?></option>
              <? } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
  </div>
  </section>
  </div>
</div>
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#add').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
});
</script>


<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script type="text/javascript"></script>
<script>
$(function () {
  //Initialize Select2 Elements
  $('.select2').select2()
})
</script>
</body>
</html>
