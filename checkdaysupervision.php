<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>แสดงการนิเทศนักศึกษา &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
  <?
  @session_start();
  require_once('includementor/connect.php');
  if(!isset($_SESSION['mentor_code']))
  header("location:login.php");
  if(isset($_GET['logout'])){
    session_destroy();
    header("location:login.php");
  }

  ?>
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
          แสดงข้อมูลการนิเทศนักศึกษา
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="studentindex.php"><i class="fa fa-dashboard"></i>Home</a>
          <li class="active"><i class="fa fa-calendar-check-o "></i></li> แสดงข้อมูลการนิเทศนักศึกษา
        </ol>
      </section>
        <section class="content">
          <?php
          $mentor_code = $_SESSION['mentor_code'];
          $query = "SELECT * FROM apprenticeship WHERE mentor_code = '$mentor_code'";
          $result = mysqli_query($conn,$query);
          while($row = mysqli_fetch_array($result)) {
          $student_code = $row[1];
          $query1 = "SELECT * FROM supervision WHERE student_code = '$student_code' order by sv_date asc";
          $result1 = mysqli_query($conn,$query1);
          while($row1 = mysqli_fetch_array($result1)) {
          ?>
                  <div class="box box-danger">
                    <div class="box-header">
                      <h3 class="box-title">ข้อมูลวัน-เวลาที่อาจารย์มานิเทศนักศึกษา</h3>
                    </div>
                    <div class="box-body">

                <?  $b = "SELECT * FROM teacher where teacher_code = $row1[2];" ;
                    $query2 = mysqli_query($conn,$b);
                     while ($b = mysqli_fetch_array($query2)) {?>
                        <p><b>ชื่อ-นามสกุลอาจารย์ที่มานิเทศ</b> : <?php echo $b[1].' '.$b[2];?></p>
                        <?
                        $d = "SELECT * FROM student where student_code = $student_code" ;
                        $query3 = mysqli_query($conn,$d);
                        while ($d = mysqli_fetch_array($query3)) {?>
                        <p><b>นิเทศนักศึกษาชื่อ-นามสกุล</b> : <?php echo $d[1].' '.$d[2];?></p>
                        <p><b>วันที่มานิเทศ</b> : <?php echo $row1[3];?></p>
                        <p><b>เวลา</b> : <?php echo $row1[4];?></p>
                    <? } ?>
                  <? } ?>
                <? } ?>
                </div>
                </div>
              <? } ?>
        </section>
  </div>
</div>
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
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
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
