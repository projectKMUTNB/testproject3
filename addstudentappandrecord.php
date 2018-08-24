<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>เลือกนักศึกษาที่ฝึกงาน &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
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
$query = "SELECT * FROM mentor WHERE mentor_code = '$_SESSION[mentor_code]'";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)) {

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
          แสดงข้อมูลนักศึกษา
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="mentorindex.php"><i class="fa fa-dashboard"></i>Home</a>
          <li class="active"><i class="fa fa-briefcase"></i></li> แสดงชื่อนักศึกษาที่ฝึกงานในสถานประกอบการ
        </ol>
      </section>
        <section class="content">
          <center>
            <button class="btn btn-success" data-toggle="modal" data-target="#addselectstudent">
              <i class="fa fa-user-plus"></i> เลือกนักศึกษาที่ฝึกงานในสถานประกอบการท่าน
            </button>
          </center>
          <br>
          <?
          $b = "SELECT * FROM apprenticeship where mentor_code = $row[0] ORDER BY student_code ASC" ;
          $query1 = mysqli_query($conn,$b);
          while ($b = mysqli_fetch_array($query1)) {
          ?>
                  <div class="box box-danger">
                    <div class="box-header">
                      <h3 class="box-title">ข้อมูลนักศึกษาที่ฝึกงานในสถานประกอบการ</h3>
                    </div>
                    <div class="box-body">
                      <?
                      $student_code = $b[1];
                      $c = "SELECT * FROM student where student_code = $student_code ORDER BY student_code ASC";
                      $query2 = mysqli_query($conn,$c);
                      while ($c = mysqli_fetch_array($query2)) { ?>
                        <p><b>รหัสนักศึกษา</b> : <?php echo $c[0];?></p>
                        <p><b>ชื่อ-นามสกุลนักศึกษา</b> : <?php echo $c[1].' '.$c[2];?></p>
                        <?php
                        $student_address = $c['student_address'];
                        if (empty($student_address)) $student_address = "ยังไม่มีการเพิ่มข้อมูลเข้าระบบ";
                        ?>
                        <p><b>ที่อยู่ปัจจุบันของนักศึกษา</b> : <?php echo $student_address;?></p>
                        <?php
                        $email_student = $c['email_student'];
                        if (empty($email_student)) $email_student = "ยังไม่มีการเพิ่มข้อมูลเข้าระบบ";
                        ?>
                        <p><b>Email นักศึกษา</b> : <?php echo $email_student;?></p>
                        <?php
                        $student_phone = $c['student_phone'];
                        if (empty($student_phone)) $student_phone = "ยังไม่มีการเพิ่มข้อมูลเข้าระบบ";
                        ?>
                        <p><b>เบอร์โทรศัพท์นักศึกษา</b> : <?php echo $student_phone;?></p>
                        <?

                        $student_code = $c[0];
                        $d = "SELECT * FROM crecodestudentevaluation where student_code = $student_code" ;
                        $result1 = mysqli_query($conn,$d);
                        $count =  mysqli_num_rows($result1);

                        $e = "SELECT * FROM ccommentstudent where student_code = $student_code" ;
                        $result3 = mysqli_query($conn,$e);
                        $count3 =  mysqli_num_rows($result3);

                        if ($count==0){?>
                        <div class="dropdown pull-left">
                        <a href="companyformqstudent.php?id=<?php echo $c[0];?>"
                        class="btn btn-success pull-left" data-toggle="modal" data-target="#formstudent">
                        <i class="glyphicon glyphicon-list-alt"></i> ทำแบบประเมินนักศึกษา
                        </a>
                        &nbsp;
                        </div>
                      <? }if($count>1){ ?>
                        <div class="dropdown pull-left">
                        <button class="btn btn-success pull-left" disabled>
                        ทำแบบประเมินนักศึกษาเรียบร้อยแล้ว</button>
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
                          <a href="editccommentstudent.php?id=<?php echo $c[0];?>"
                          class="btn btn-success pull-left" data-toggle="modal" data-target="#editcomment">
                          <i class="fa fa-commenting-o"></i> แก้ไขความคิดเห็นเพิ่มเติม
                          </a>
                          &nbsp;
                          </div>
                        <? } ?>

                        <? } ?>
                  </div>
            </div>
            <? } ?>
        </section>
        <? } ?>
  </div>
</div>
    <?php include('addselectstudentbycompany.php'); ?>

    <div class="modal fade" id="formstudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

    <script type="text/javascript">
    $(document).ready(function() {
        $('#formstudent').on('hidden.bs.modal', function () {
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
