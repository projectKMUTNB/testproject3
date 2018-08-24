<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>เลือกนักศึกษาเพื่อไปนิเทศ &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
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
  <?
  @session_start();
  require_once('includeteacher/connect.php');
  if(!isset($_SESSION['teacher_code']))
  header("location:login.php");
  if(isset($_GET['logout'])){
    session_destroy();
    header("location:login.php");
  }
$query = "SELECT * FROM supervision WHERE teacher_code = '$_SESSION[teacher_code]' ORDER BY student_code ASC";
$result = mysqli_query($conn,$query);

  ?>
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
          แสดงข้อมูลนักศึกษาทีไปนิเทศ
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="teacherindex.php"><i class="fa fa-dashboard"></i>Home</a>
          <li class="active"><i class="fa fa-street-view"></i></li> เลือกนักศึกษาที่จะไปนิเทศ
        </ol>
      </section>
      <br>
      <center>
        <button class="btn btn-success" data-toggle="modal" data-target="#addselectstudent">
          <i class="fa fa-user-plus"></i> เลือกนักศึกษาในการนิเทศ
        </button>
      </center>
        <section class="content">
                  <?php
                  while($row = mysqli_fetch_array($result)) {
                  ?>
                  <div class="box box-primary">
                    <div class="box-header">
                      <h3 class="box-title">ข้อมูลนักศึกษา</h3>
                        <a href="setselectstudentdata.php?id=<?php echo $row[1];?>"
                          name="button" class="btn btn-primary btn-xs pull-right">
                          <i class="glyphicon glyphicon-list-alt"></i> จัดการข้อมูล
                        </a>
                    </div>
                  <?  $b = "SELECT * FROM student where student_code = $row[1];" ;
                    $query1 = mysqli_query($conn,$b);
                     while ($b = mysqli_fetch_array($query1)) {?>
                    <div class="box-body">
                        <p><b>รหัสนักศึกษา</b> : <?php echo $b[0];?></p>
                        <p><b>ชื่อ-นามสกุลนักศึกษา</b> : <?php echo $b[1].' '.$b[2];?></p>
                        <p><b>สังกัดสาขา</b> : <?php echo $b[3];?></p>
                      </div>
                    </div>
                    <? } ?>
                <? $i++; } ?>
        </section>
  </div>
  </div>

  <?php include('addselectstudent.php'); ?>

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

    //Date picker
    $('#datetimepicker').datetimepicker({
    format: 'd/m/Y',
    timepicker:false,
    minDate : 0,
    yearOffset:543,
    lang:'th'
    });

    //Timepicker
    $('#datetimepicker1').datetimepicker({
    	datepicker:false,
    	format:'H:i',
    });
  })
  </script>
