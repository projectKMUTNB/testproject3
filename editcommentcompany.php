<?
@session_start();
require_once('includeteacher/connect.php');

if(!isset($_SESSION['teacher_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}
$student_code = $_GET['g'];

$a = "SELECT * FROM commentcompany where student_code = $student_code" ;
$query = mysqli_query($conn,$a);
while ($a = mysqli_fetch_array($query)) {

$company_code = $a[3];

$b = "SELECT * FROM company where company_code = $company_code" ;
$query1 = mysqli_query($conn,$b);
while ($b = mysqli_fetch_array($query1)) {
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>แก้ไขความคิดเห็นเพิ่มเติมของสถานประกอบการ &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
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
          แก้ไขความคิดเห็นเพิ่มเติมของสถานประกอบการ
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="teacherindex.php"><i class="fa fa-dashboard"></i>Home</a>
          <li><a href="selectstudent.php"><i class="fa fa-street-view"></i>เลือกนักศึกษาที่ไปนิเทศ</a>
          <li><a href="setselectstudentdata.php?id=<?php echo $student_code;?>"><i class="glyphicon glyphicon-list-alt"></i>จัดการข้อมูลนักศึกษา</a>
          <li class="active"><i class="fa fa-commenting-o"></i></li> แก้ไขความคิดเห็นเพิ่มเติมของสถานประกอบการ
        </ol>
      </section>
    <section class="content">
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">แก้ไขความคิดเห็นเพิ่มเติมของสถานประกอบการ</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="form" name="form" method="POST" action="editcommentcompanyQuery.php">
          <div class="box-body">
            <div class="form-group">
              <label>ความคิดเห็นเพิ่มเติมของสถานประกอบการ</label>
              <input type="text" value="<? echo $b[1]; ?>" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>แก้ไขความคิดเห็นเพิ่มเติม</label>
              <textarea class="form-control" rows="4" name="commentcom_detail"><? echo $a[1];?></textarea>
            </div>
          </div>
          <!-- /.box-body -->
            <div class="box-footer">
              <input type="hidden" name="commentcom_id" value="<? echo $a[0];?>">
              <button type="submit"  id="submit" name="submit" class="btn btn-success btn-round">ยืนยันการแก้ไขข้อมูล</button>
              <a href="setselectstudentdata.php?id=<?php echo $student_code;?>" class="btn btn-danger">ยกเลิกการแก้ไข</a>
            </div>
        </form>
      </div>
      </div>
      </section>
    </div>
    </div>
<?}?>
<?}
mysqli_close($conn);?>
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
