<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>แสดงข้อมูลที่ฝึกงาน &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
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
<body class="hold-transition skin-blue sidebar-mini">
  <?
  @session_start();
  require_once('includestudent/connect.php');
  if(!isset($_SESSION['student_code']))
  header("location:login.php");
  if(isset($_GET['logout'])){
    session_destroy();
    header("location:login.php");
  }
$query = "SELECT * FROM apprenticeship WHERE student_code = '$_SESSION[student_code]' ORDER BY student_code ASC";
$result = mysqli_query($conn,$query);

  ?>
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
          แสดงข้อมูลที่ฝึกงาน
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="studentindex.php"><i class="fa fa-dashboard"></i>Home</a>
          <li class="active"><i class="glyphicon glyphicon-book"></i></li> แสดงข้อมูลที่ฝึกงาน
        </ol>
      </section>
        <section class="content">
                  <?php
                  while($row = mysqli_fetch_array($result)) {
                  ?>
                  <div class="box box-primary">
                    <div class="box-header">
                      <h3 class="box-title">ข้อมูลที่ฝึกงาน</h3>
                    </div>
                  <?  $b = "SELECT * FROM mentor where mentor_code = $row[3];" ;
                    $query1 = mysqli_query($conn,$b);
                     while ($b = mysqli_fetch_array($query1)) {?>
                    <div class="box-body">
                        <p><b>ชื่อ-นามสกุลพี่เลี้ยง</b> : <?php echo $b[1].' '.$b[2];?></p>
                        <p><b>เบอร์โทรศัพท์</b> : <?php echo $b[3];?></p>
                      <?  $c = "SELECT * FROM company where company_code = $b[4];" ;
                          $query2 = mysqli_query($conn,$c);
                           while ($c = mysqli_fetch_array($query2)) { ?>
                             <p><b>ชื่อสถานประกอบการ</b> : <?php echo $c[1];?></p>
                    <? }
                  }

                $d = "SELECT * FROM srecodecompanyevaluation where student_code = $row[1];" ;
                $result1 = mysqli_query($conn,$d);
                $count =  mysqli_num_rows($result1);

                $e = "SELECT * FROM scommentcompany where student_code = $row[1];" ;
                $result3 = mysqli_query($conn,$e);
                $count3 =  mysqli_num_rows($result3);

                if ($count==0){?>
                <div class="dropdown pull-left">
                <a href="studentformqcompany.php?id=<?php echo $row[1];?>"
                class="btn btn-success pull-left" data-toggle="modal" data-target="#formcompany">
                <i class="glyphicon glyphicon-list-alt"></i> ทำแบบประเมินสถานประกอบการ
                </a>
                &nbsp;
                </div>
                <? }if ($count==1){ ?>
                <div class="dropdown pull-left">
                <button class="btn btn-success pull-left" disabled>
                นักศึกษาทำแบบประเมินสถานประกอบการเรียบร้อยแล้ว</button>
                &nbsp;
                </div>
                <? } ?>
                <?if($count3=='0'){?>
                  <div class="dropdown pull-left">
                <button class="btn btn-success dropdown"
                class="drop-edit" data-toggle="dropdown" disabled>กรุณาทำแบบประเมินก่อน
                <i class="fa fa-commenting-o"></i>
                </button>
                <ul class="dropdown-menu">
                </ul>
                 &nbsp;
                </div>
                <?}?>
                <?if($count3=='1'){?>
                  <div class="dropdown pull-left">
                  <a href="editscommentcompany.php?id=<?php echo $row[1];?>"
                  class="btn btn-success pull-left" data-toggle="modal" data-target="#editcomment">
                  <i class="fa fa-commenting-o"></i> แก้ไขความคิดเห็นเพิ่มเติม
                  </a>
                  &nbsp;
                  </div>
                <?} ?>
                <div class="dropdown pull-left">
                <a href="studentmarkercompany.php?id=<?php echo $row[1];?>"
                class="btn btn-primary pull-left" data-toggle="modal" data-target="#marker">
                <i class="fa fa-map-marker"></i> ปักหมุดสถานประกอบการ
                </a>
                &nbsp;
                </div>
              <?  if ($count==1){?>
                <div class="dropdown pull-left">
                <a href="reportcompanybystudent.php?id=<?php echo $row[1];?>"
                class="btn btn-success pull-left">
                <i class="glyphicon glyphicon-list-alt"></i> ดู Report สถานประกอบการ
                </a>
                &nbsp;
                </div>
              <? }if ($count==0){ ?>
                <div class="dropdown pull-left">
                <button class="btn btn-success pull-left" disabled>
                กรุณาทำแบบประเมินก่อน</button>
                &nbsp;
                </div>
                <? } ?>
                <? $i++; } ?>
                </div>
                </div>
        </section>
  </div>
  </div>
  <div class="modal fade" id="formcompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

      </div>
    </div>
  </div>

  <div class="modal fade" id="editcomment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

      </div>
    </div>
  </div>

  <div class="modal fade" id="marker" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

      </div>
    </div>
  </div>

  <script type="text/javascript">
  $(document).ready(function() {
      $('#formcompany').on('hidden.bs.modal', function () {
            $(this).removeData('bs.modal');
      });
  });
  </script>

  <script type="text/javascript">
  $(document).ready(function() {
      $('#editcomment').on('hidden.bs.modal', function () {
            $(this).removeData('bs.modal');
      });
  });
  </script>

  <script type="text/javascript">
  $(document).ready(function() {
      $('#marker').on('hidden.bs.modal', function () {
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
