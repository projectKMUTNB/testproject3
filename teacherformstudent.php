<html>
<head>
    <meta charset="utf-8" />
    <!--<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>แบบประเมินนักศึกษา &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!--  Charts Plugin -->
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>
<body>
  <?
  @session_start();
  require_once('includeteacher/connect.php');

  if(!isset($_SESSION['teacher_code']))
  header("location:login.php");
  if(isset($_GET['logout'])){
    session_destroy();
    header("location:login.php");
  }
  ?>
  <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
          <? include('includeteacher/sidebarteacher.php'); ?>
        </div>
        <div class="main-panel">
          <? include('includeteacher/headerteacher.php'); ?>
            <div class="content">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="card">
                      <div class="card-header" data-background-color="green">
                          <h4 class="title">กรอกชื่อนักศึกษาที่ต้องการประเมิน</h4>
                          <p class="category">กรุณาระบุชื่อนักศึกษาหรือรหัสนักศึกษา</p>
                      </div>
                      <div class="col-lg-12 col-md-12">
                        <div class="row">
                        <center>
                      <div class="col-lg-12">
                          <form id="form_search" name="form" method="post" class="navbar-form" ac >
                          <div class="form-group label-floating has-feedback">
                          <label class="control-label">ค้นหาชื่อนักศึกษา</label>
                          <input type="text" name="student_search" class="form-control">

                          <button type="submit" name="btn_search" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </button>
                      </div>
                      </form>
                        </div>
                      </div>
                      </center>

                    <?
                    if(isset($_POST["student_search"]))
                    {
                      $student_search = $_POST["student_search"];
                      $query = "SELECT * FROM student WHERE student_name LIKE '%".$student_search."%' " ;
                      $query = mysqli_query($conn,$query);
                      while ($b = mysqli_fetch_array($query)) { ?>
                        <table class="table table-hover">
                            <thead class="text-success">
                                <th>ชื่อ-นามสกุลนักศึกษา</th>
                                <th>สาขาที่นักศึกษาสังกัดอยู่</th>
                                <th>ตั้งค่า</th>
                            </thead>
                            <tbody>
                              <?php $g = 0; ?>
                                  <tr>
                                  <td><?php echo $b[1].' '.$b[2];?></td>
                                  <td><?php echo $b[3]; ?></td>
                                  <td>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#qstudent">
                                    <i class="material-icons">library_books</i> ทำแบบประเมินนักศึกษา
                                    </button>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#qcompany">
                                    <i class="material-icons">library_books</i> ทำแบบประเมินสถานประกอบการ</button>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#Addsuper">
                                    <i class="material-icons">alarm_add</i> กำหนดวัน-เวลาในการนิเทศ</button>
                                </td>
                                  <?php $g++; ?>
                              </tr>
                            </tbody>
                        </table>
                        <?
                    }
                  } ?>
                   <?
                   if(isset($_POST["student_search"]))
                   {
                     $student_search = $_POST["student_search"];
                     $query = "SELECT * FROM student WHERE student_code LIKE '%".$student_search."%' " ;
                     $query = mysqli_query($conn,$query);
                     while ($b = mysqli_fetch_array($query)) { ?>
                       <table class="table table-hover">
                           <thead class="text-success">
                               <th>ชื่อ-นามสกุลนักศึกษา</th>
                               <th>สาขาที่นักศึกษาสังกัดอยู่</th>
                               <th>ตั้งค่า</th>
                           </thead>
                           <tbody>
                             <?php $g = 0; ?>
                                 <tr>
                                 <td><?php echo $b[1].' '.$b[2];?></td>
                                 <td><?php echo $b[3]; ?></td>
                                 <td>

                                 <button class="btn btn-success" data-toggle="modal" data-target="#qstudent">
                                 <i class="material-icons">library_books</i> ทำแบบประเมินนักศึกษา
                                 </button>
                                 <button class="btn btn-success" data-toggle="modal" data-target="#qcompany">
                                 <i class="material-icons">library_books</i> ทำแบบประเมินสถานประกอบการ</button>
                                 <button class="btn btn-warning" data-toggle="modal" data-target="#Addsuper">
                                 <i class="material-icons">alarm_add</i> กำหนดวัน-เวลาในการนิเทศ</button>
                               </td>
                                 <?php $g++; ?>
                             </tr>
                           </tbody>
                       </table>
                       <?
                      }
                   }
                  ?>
                      </div>
                  </div>
                  </div>
        </div>
    </div>
</div>
</body>
<?php include('addtimesupervision.php'); ?>
<?php include('teacherformqstudent.php'); ?>
<?php include('teacherformqcompany.php'); ?>
<!--<div class="modal fade" id="editstudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#editstudent').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
});
</script>-->
<!--   Core JS Files   -->
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js?v=1.2.0"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#student').DataTable();
    });
</script>
</html>
