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

$z1 = "SELECT * FROM mentor where mentor_code = $mentor_code where approve_status = '1'" ;
$query10 = mysqli_query($conn,$z1);
while ($z1 = mysqli_fetch_array($query10)) {

$company_code = $z1[4];

$a2 = "SELECT * FROM company where company_code = $company_code where approve_status = '1'" ;
$result101 = mysqli_query($conn,$a2);
$count101 =  mysqli_num_rows($result101);

if($count101=='1'){
  echo '<script>';
  echo 'alert("ไม่สามารถเข้าทำรายการได้เนื่องจากท่านมีสถานประกอบการสังกัดแล้ว")';
  echo '</script>';
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=mentorindex.php\" />";
}
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>เพิ่มที่ฝึกงานแบบมีข้อมูลในระบบ &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
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
          เลือกสถานประกอบการที่มีในระบบ
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="teacherindex.php"><i class="fa fa-dashboard"></i>Home</a>
          <li><a href="addcompanybymentor.php"><i class="fa fa fa-gear"></i>เพิ่มสถานประกอบการ</a>
          <li class="active"><i class="fa fa fa-gear"></i></li> เพิ่มสถานประกอบการแบบมีข้อมูลในระบบแล้ว
        </ol>
      </section>
        <section class="content">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">เลือกสถานประกอบการ</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form id="form1" name="form1" method="post" action="addcompanybymentordataQuery.php">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>เลือกสถานประกอบการ</label>
                    <select class="form-control select2" name="company_code" data-placeholder="กรอกชื่อสถานประกอบการ"
                    style="width: 100%;">
                    <? $b = "SELECT * FROM company where approve_status = '1'" ;
                    $query1 = mysqli_query($conn,$b);
                    while ($b = mysqli_fetch_array($query1)) {?>
                      <option></option>
                      <option value="<? echo $b[0]; ?>"><? ; echo $b[1];?></option>
                    <? } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <input type="hidden" name="mentor_code" value="<? echo $mentor_code; ?>">
              <button type="submit" class="btn btn-success">ยืนยันข้อมูล</button>
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
