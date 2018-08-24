<?
@session_start();
require_once('includeteacher/connect.php');
if(!isset($_SESSION['teacher_code']))
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
  <title>จัดการหัวข้ออาจารย์ประเมินนักศึกษา &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
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
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <link rel="stylesheet" type="text/css" href="datetime/jquery.datetimepicker.css"/>
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <?php include('includeteacher/headerteacher.php'); ?>
    </header>
    <aside class="main-sidebar">
      <?php include('includeteacher/sidebarteacherchoice.php'); ?>
    </aside>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          เลือกตัวเลือกการเพิ่มหัวข้อหลัก
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="teacherindex.php"><i class="fa fa-dashboard"></i>Home</a>
          <li class="active"><i class="fa fa-file"></i></li> หัวข้ออาจารย์ประเมินนักศึกษา
        </ol>
      </section>
        <section class="content">
            <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">หัวข้อหลักอาจารย์ประเมินนักศึกษา</h3>
                </div>
                <div class="box-body">
                  <div class="dropdown pull-left">
                  <a href="addmainstudent.php"
                  class="btn btn-success pull-left" data-toggle="modal" data-target="#normal">
                  <i class="glyphicon glyphicon-list-alt"></i> เพิ่มหัวข้อหลักอาจารย์ประเมินนักศึกษา
                  </a>
                  &nbsp;
                  </div>
                  </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="student1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>ลำดับ</th>
                          <th>ชื่อหัวข้อหลัก</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php $query = "SELECT * FROM mainrecordstudent where approve_status = '1' order by mrs_id asc";
                          $g = 0;
                          $a = 1;
                          $query = mysqli_query($conn,$query);
                          while ($b = mysqli_fetch_array($query)) { ?>
                            <tr>
                              <td><?php echo $a++; ?></td>
                              <td><?php echo $b[1];?></td>
                              <?php $g++; } ?>
                          </tr>
                      </table>
                    </div>
            </div>
        </section>
        <section class="content">
            <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">หัวข้อรองอาจารย์ประเมินนักศึกษา</h3>
                </div>
                <div class="box-body">
                  <div class="dropdown pull-left">
                  <a href="addchoicestudent.php"
                  class="btn btn-success pull-left" data-toggle="modal" data-target="#normal1">
                  <i class="glyphicon glyphicon-list-alt"></i> เพิ่มหัวข้อรองอาจารย์ประเมินนักศึกษา
                  </a>
                  &nbsp;
                  </div>
                  </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="student" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>ลำดับ</th>
                          <th>ชื่อหัวข้อรอง</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php $query = "SELECT * FROM choicerecordstudent where approve_status = '1' order by crs_id asc";
                          $g = 0;
                          $a = 1;
                          $query = mysqli_query($conn,$query);
                          while ($b = mysqli_fetch_array($query)) { ?>
                            <tr>
                              <td><?php echo $a++; ?></td>
                              <td><?php echo $b[1];?></td>
                              <?php $g++; } ?>
                          </tr>
                      </table>
                    </div>
            </div>
        </section>
  </div>
  </div>

  <div class="modal fade" id="normal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

      </div>
    </div>
  </div>

  <div class="modal fade" id="normal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

      </div>
    </div>
  </div>

  <script type="text/javascript">
  $(document).ready(function() {
      $('#normal').on('hidden.bs.modal', function () {
            $(this).removeData('bs.modal');
      });
  });
  </script>

  <script type="text/javascript">
  $(document).ready(function() {
      $('#normal1').on('hidden.bs.modal', function () {
            $(this).removeData('bs.modal');
      });
  });
  </script>


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
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <script src="bower_components/moment/min/moment.min.js"></script>
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <script src="dist/js/pages/dashboard.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <script src="dist/js/demo.js"></script>
  <script src="datetime/jquery.datetimepicker.js"></script>
  <script src="assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){
          $('#student').DataTable();
      });
  </script>
  <script type="text/javascript">
      $(document).ready(function(){
          $('#student1').DataTable();
      });
  </script>
