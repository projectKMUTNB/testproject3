<html lang="en">
<head>
    <meta charset="utf-8" />
    <!--<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>หน้าหลักการยืนยัน-ลบข้อมูล &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>
<body>
  <?
  @session_start();
  require_once('include/connect.php');

  if(!isset($_SESSION['username']))
  header("location:login.php");
  if(isset($_GET['logout'])){
    session_destroy();
    header("location:login.php");
  }
  ?>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
          <? include('include/sidebarappvore.php'); ?>
        </div>
        <div class="main-panel">
          <? include('include/header.php'); ?>
            <div class="content">
                <div class="container-fluid">
                  <div class="content">
                      <div class="container-fluid">
                          <div class="row">
                              <div class="col-lg-3 col-md-6 col-sm-6">
                                  <div class="card card-stats">
                                      <div class="card-header" data-background-color="orange">
                                          <i class="material-icons">note</i>
                                      </div>
                                      <div class="card-content">
                                          <p class="category">จำนวนหัวข้อที่รอการอนุมัติทั้งหมด</p>
                                          <h3 class="title">
                                            <?
                                            $a = "SELECT mrc_id from mainrecordcompany where approve_status = '2'";
                                            $query = mysqli_query($conn,$a);
                                            $count = mysqli_num_rows($query);
                                            $c1 = $count;
                                            $b = "SELECT crc_id from choicerecordcompany where approve_status = '2'";
                                            $query1 = mysqli_query($conn,$b);
                                            $count1 = mysqli_num_rows($query1);
                                            $c2 = $c1+$count1;
                                            $c = "SELECT mrs_id from mainrecordstudent where approve_status = '2'";
                                            $query2 = mysqli_query($conn,$c);
                                            $count2 = mysqli_num_rows($query2);
                                            $c3 = $c2+$count2;
                                            $d = "SELECT crs_id from choicerecordstudent where approve_status = '2'";
                                            $query3 = mysqli_query($conn,$d);
                                            $count3 = mysqli_num_rows($query3);
                                            $c4 = $c3+$count3;
                                            $e = "SELECT mrsc_id from mainrecordstucompany where approve_status = '2'";
                                            $query4 = mysqli_query($conn,$e);
                                            $count4 = mysqli_num_rows($query4);
                                            $c5 = $c4+$count4;
                                            $f = "SELECT crsc_id from choicerecordstucompany where approve_status = '2'";
                                            $query5 = mysqli_query($conn,$f);
                                            $count5 = mysqli_num_rows($query5);
                                            $c6 = $c5+$count5;
                                            $g = "SELECT mrcs_id from mainrecordcomstudent where approve_status = '2'";
                                            $query6 = mysqli_query($conn,$g);
                                            $count6 = mysqli_num_rows($query6);
                                            $c7 = $c6+$count6;
                                            $h = "SELECT crcs_id from choicerecordcomstudent where approve_status = '2'";
                                            $query7 = mysqli_query($conn,$h);
                                            $count7 = mysqli_num_rows($query7);
                                            $c8 = $c7+$count7;
                                            echo $c8; ?>
                                              <small>หัวข้อ</small>
                                          </h3>
                                      </div>
                                      <div class="card-footer">

                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-3 col-md-6 col-sm-6">
                                  <div class="card card-stats">
                                      <div class="card-header" data-background-color="green">
                                          <i class="material-icons">note</i>
                                      </div>
                                      <div class="card-content">
                                          <p class="category">จำนวนพี่เลี้ยงรอการอนุมัติ</p>
                                          <h3 class="title">
                                            <? $v = "SELECT mentor_code from mentor where approve_status = '2'";
                                            $query9 = mysqli_query($conn,$v);
                                            $count9 = mysqli_num_rows($query9);
                                            echo $count9; ?>
                                            <small>คน</small>
                                          </h3>
                                      </div>
                                      <div class="card-footer">

                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-3 col-md-6 col-sm-6">
                                  <div class="card card-stats">
                                      <div class="card-header" data-background-color="red">
                                          <i class="material-icons">note</i>
                                      </div>
                                      <div class="card-content">
                                          <p class="category">จำนวนบริษัทที่รอการอนุมัติ</p>
                                          <h3 class="title">
                                            <? $x = "SELECT company_code from company where approve_status = '2'";
                                            $query10 = mysqli_query($conn,$x);
                                            $count10 = mysqli_num_rows($query10);
                                            echo $count10; ?>
                                            <small>บริษัท</small>
                                          </h3>
                                      </div>
                                      <div class="card-footer">

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
        </div>
    </div>
</body>
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
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
    });
</script>
</html>
