<?
@session_start();
require_once('includestudent/connect.php');
if(!isset($_SESSION['student_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:/login.php");
}
$company_code = $_POST['company_code'];

$query1 = "SELECT * FROM company where company_code = $company_code and approve_status = '1'" ;
$query1 = mysqli_query($conn,$query1);
while ($b = mysqli_fetch_array($query1)) {
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>แก้ไขชื่อนักศึกษา &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
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
        แก้ไขชื่อนักศึกษา
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="teacherindex.php"><i class="fa fa-dashboard"></i>Home</a>
        <li><a href="addstudentappren.php"><i class="fa fa fa-gear"></i>เพิ่มที่ฝึกงาน</a>
        <li class="active"><i class="fa fa fa-gear"></i></li> เพิ่มสถานประกอบการที่ฝึกงานแบบมีข้อมูลในระบบ
      </ol>
    </section>
      <section class="content">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">เพิ่มสถานประกอบการที่ฝึกงาน</h3>
          </div>
          <!-- /.box-header -->
          <form id="form" name="form" method="post" action="addapprencompanydataQuery.php">
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>ชื่อสถานประกอบการ</label>
                  <input type="text" value="<? echo $b[1]; ?>" class="form-control" disabled/>
                  <? } ?>
                </div>
                <div class="form-group">
                  <label>เลือกพี่เลี้ยง</label>
                  <select class="form-control select2" name="mentor_code" data-placeholder="กรอกชื่อพี่เลี้ยง"
                  style="width: 100%;">
                  <? $c = "SELECT * FROM mentor where company_code = $company_code" ;
                  $query2 = mysqli_query($conn,$c);
                  while ($c = mysqli_fetch_array($query2)) {?>
                    <option value="<? echo $c[0]; ?>"><? ; echo $c[1].' '.$c[2];?></option>
                  <? } ?>
                  </select>
                </div>
                <input type="hidden" name="company_code" value="<? echo $company_code ?>">
                <input type="hidden" name="student_code" value="<? echo $_SESSION['student_code']; ?>">
                </div>
              </div>
            </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-success">ยืนยันการแก้ไข</button>
            <a href="studentindex.php" class="btn btn-danger">ยกเลิกการแก้ไข</a>
          </div>
        </form>
      </div>
    </section>
  </div>
</div>
</div>
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
</script>
</body>
</html>
