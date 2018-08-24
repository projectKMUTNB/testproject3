<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>จัดการข้อมูลนักศึกษาที่ไปนิเทศ &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
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
$student_code  =  $_GET['id'];
$query = "SELECT * FROM supervision where student_code = '$student_code'";
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
          จัดการข้อมูลนักศึกษาที่นิเทศ
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="teacherindex.php"><i class="fa fa-dashboard"></i>Home</a>
          <li><a href="selectstudent.php"><i class="glyphicon glyphicon-list-alt"></i>เลือกนักศึกษาที่ไปนิเทศ</a>
          <li class="active"><i class="glyphicon glyphicon-list-alt"></i></li> จัดการข้อมูลนักศึกษา
        </ol>
      </section>
        <section class="content">
                  <?php
                  while($row = mysqli_fetch_array($result)) {
                  ?>
                  <div class="box box-success">
                    <div class="box-header">
                      <h3 class="box-title">ข้อมูลนักศึกษา</h3>
                    </div>
                  <?  $b = "SELECT * FROM student where student_code = $row[1];" ;
                    $query1 = mysqli_query($conn,$b);
                     while ($b = mysqli_fetch_array($query1)) {?>
                    <div class="box-body">

                      <?

                      $c = "SELECT * FROM trecodestudentevaluation where student_code = $row[1];" ;
                      $result1 = mysqli_query($conn,$c);
                      $count =  mysqli_num_rows($result1);

                      $d = "SELECT * FROM trecodecompanyevaluation where student_code = $row[1];" ;
                      $result2 = mysqli_query($conn,$d);
                      $count2 =  mysqli_num_rows($result2);

                      ?>

                        <p><b>รหัสนักศึกษา</b> : <?php echo $b[0];?></p>
                        <p><b>ชื่อ-นามสกุลนักศึกษา</b> : <?php echo $b[1].' '.$b[2];?></p>
                        <p><b>สังกัดสาขา</b> : <?php echo $b[3];?></p>
                        <p><b>วันที่นิเทศ</b> : <span style="color:red"><?php echo $row['sv_date'];?></span>
                        <b>เวลา</b> : <span style="color:red"><?php echo $row['sv_time'];?></span></p>

                        <div class="dropdown pull-left">
                        &nbsp;
                        <button class="btn btn-success dropdown"
                        class="drop-edit" data-toggle="dropdown">ทำแบบประเมิน
                        <i class="glyphicon glyphicon-list-alt"></i>
                        <span class="caret"> </span>
                        </button>
                        <ul class="dropdown-menu">
                        <?if($count=='0'){?>
                         <li><a href="teacherformqstudent.php?id=<?php echo $row[1];?>" data-toggle="modal" data-target="#formstudent">ทำแบบประเมินนักศึกษา</a></li>
                         <?}if($count>='1'){?>
                         <li><a disabled>ทำแบบประเมินนักศึกษาเรียบร้อยแล้ว</a></li>
                         <?}?>
                         <?if($count2=='0'){?>
                         <li><a href="teacherformqcompany.php?id=<?php echo $row[1];?>" data-toggle="modal" data-target="#formcompany">ทำแบบประเมินสถานประกอบการ</a></li>
                         <?}if($count2>='1'){?>
                         <li><a disabled>ทำแบบประเมินสถานประกอบการเรียบร้อยแล้ว</a></li>
                         <?}?>
                       </ul>
                         </div>

                         <?
                         $h = "SELECT * FROM commentstudent where student_code = $student_code" ;
                         $result5 = mysqli_query($conn,$h);
                         $count5 =  mysqli_num_rows($result5);

                         $i = "SELECT * FROM commentcompany where student_code = $student_code" ;
                         $result6 = mysqli_query($conn,$i);
                         $count6 =  mysqli_num_rows($result6);
                         ?>
                         <?if($count5=='0'&&$count6=='0'){?>
                           <div class="dropdown pull-left">
                             &nbsp;
                         <button class="btn btn-success dropdown"
                         class="drop-edit" data-toggle="dropdown" disabled>กรุณาทำแบบประเมินก่อน
                         <i class="fa fa-commenting-o"></i>
                         <span class="caret"> </span>
                         </button>
                         <ul class="dropdown-menu">
                         </ul>
                          &nbsp;
                         </div>
                         <?}?>
                         <?if($count5=='1'||$count6=='1'){?>
                         <div class="dropdown pull-left">
                           &nbsp;
                           <button class="btn btn-success dropdown"
                           class="drop-edit" data-toggle="dropdown">ความคิดเห็นเพิ่มเติมนักศึกษา
                           <i class="fa fa-commenting-o"></i>
                           <span class="caret"> </span>
                           </button>
                           <ul class="dropdown-menu">
                          <?if($count5=='1'){?>
                           <li><a href="editcommentstudent.php?g=<?php echo $b[0];?>">แก้ไขความคิดเห็นเพิ่มเติมนักศึกษา</a></li>
                          <?}if($count6=='1'){?>
                           <li><a href="editcommentcompany.php?g=<?php echo $b[0];?>">แก้ไขความคิดเห็นเพิ่มเติมสถานประกอบการ</a></li>
                          <?}?>
                           </ul>
                          &nbsp;
                         </div>
                         <?}?>
                         <div class="dropdown pull-left">
                         <a href="edittimesupervision.php?id=<?php echo $b[0];?>"
                         class="btn btn-primary pull-left">
                         <i class="glyphicon glyphicon-time"></i> แก้ไขวัน-เวลาในการนัดหมาย
                         </a>
                         &nbsp;
                         </div>
                         <?
                         $j = "SELECT * FROM `location` WHERE 1 AND student_code like $student_code ORDER BY student_code desc limit 1" ;
                         $result7 = mysqli_query($conn,$j);
                         $count7 =  mysqli_num_rows($result7);
                         ?>
                         <? if ($count7==0){?>

                         <? }if($count7==1){ ?>
                         <?while ($j = mysqli_fetch_array($result7)) {?>
                         <div class="dropdown pull-left">
                         <a href="https://www.google.com/maps/dir//<?php echo $j[1]; ?>,<?php echo $j[2]; ?>"
                         class="btn btn-primary pull-left">
                         <i class="glyphicon glyphicon-map-marker"></i> นำทางไปยังสถานประกอบการ
                         </a>
                         &nbsp;
                         </div>
                         <?}?>
                         <?}?>
                         <div class="dropdown pull-left">
                         <a href="teditstudentname.php?id=<?php echo $b[0];?>"
                         class="btn btn-warning pull-left">
                         <i class="fa fa-gear"></i> แก้ไขชื่อนักศึกษา
                         </a>
                         &nbsp;
                       </div>
                       <div class="dropdown pull-left">
                       <button class="btn btn-success dropdown"
                       class="drop-edit" data-toggle="dropdown"> Report ต่างๆ
                       <i class="glyphicon glyphicon-list-alt"></i>
                       <span class="caret"> </span>
                       </button>
                       <ul class="dropdown-menu">
                       <?if($count=='0'){?>
                        <li><a disabled>โปรดทำแบบประเมินก่อนดู Report</a></li>
                        <?}if($count>='1'){?>
                        <li><a href="reportstudent.php?id=<?php echo $row[1];?>">ดู Report นักศึกษา</a></li>
                        <?}?>
                        <?if($count2=='0'){?>
                        <li><a disabled>โปรดทำแบบประเมินก่อนดู Report</a></li>
                        <?}if($count2>='1'){?>
                        <li><a href="reportcompany.php?id=<?php echo $row[1];?>">ดู Report สถานประกอบการ</a></li>
                        <?}?>
                      </ul>
                        </div>
                     </button>
                      </div>
                    </div>
                    <? } ?>
                <?  $i++; } ?>
        </section>
  </div>
  </div>
  <div class="modal fade" id="formstudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

      </div>
    </div>
  </div>

  <div class="modal fade" id="formcompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

      </div>
    </div>
  </div>

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
      $('#formcompany').on('hidden.bs.modal', function () {
            $(this).removeData('bs.modal');
      });
  });
  </script>
<? mysqli_close($conn); ?>
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
