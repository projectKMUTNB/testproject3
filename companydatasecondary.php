<html lang="en">
<head>
    <meta charset="utf-8" />
    <!--<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>หน้าจัดการข้อมูลสถานประกอบการ &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
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
  require_once('includesecondary/connect.php');

  if(!isset($_SESSION['username']))
  header("location:login.php");
  if(isset($_GET['logout'])){
    session_destroy();
    header("location:login.php");
  }
  ?>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
          <? include('includesecondary/sidebarsecondary.php'); ?>
        </div>
        <div class="main-panel">
          <? include('includesecondary/headersecondary.php'); ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                              <div class="card-header" data-background-color="red">
                                  <i class="material-icons">school</i>
                              </div>
                              <div class="card-content">
                                  <p class="category">จำนวนสถานประกอบการ
                                  </p>
                                  <h3 class="title">
                                    <? $a = "SELECT company_code from company where approve_status = '1'";
                                    $query = mysqli_query($conn,$a);
                                    $count = mysqli_num_rows($query);
                                    echo $count; ?>
                                      <small>บริษัท</small>
                                  </h3>
                              </div>
                              <div class="card-footer">
                                  <div class="stats">

                                  </div>
                              </div>
                          </div>
                      </div>
                      </div>
                    </div>
                      <div class="col-lg-12 col-md-12">
                          <div class="card">
                              <div class="card-header" data-background-color="red">
                                  <h4 class="title">รายชื่อสถานประกอบการ</h4>
                                  <p class="category">รายชื่อสถานประกอบการที่นักศึกษาฝึกงานอยู่</p>
                              </div>
                              <div class="card-content table-responsive">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#companyAdd">
                                <i class="material-icons">account_box</i> เพิ่มรายชื่อสถานประกอบการ</button>
                                  <table class="table table-hover" id="company">
                                      <thead class="text-danger">
                                          <th>ลำดับ</th>
                                          <th>ชื่อ-สถานประกอบการ</th>
                                          <th>ที่อยู่สถานประกอบการ</th>
                                          <th>Email สถานประกอบการ</th>
                                          <th>เบอร์โทรศัพท์ของสถานประกอบการ</th>
                                          <th>ตั้งค่า</th>
                                      </thead>
                                      <tbody>
                                        <?php $query = "SELECT * FROM company where approve_status = '1'";
                                        $g = 0;
                                        $a = 1;
                                        $query = mysqli_query($conn,$query);
                                        while ($b = mysqli_fetch_array($query)) { ?>
                                          <tr>
                                            <td><?php echo $a++; ?></td>
                                            <td><?php echo $b[1];?></td>
                                            <td><?php echo $b[2]; ?></td>
                                            <td><?php echo $b[3]; ?></td>
                                            <td><?php echo $b[4]; ?></td>
                                            <td>ไม่สามารถแก้ไขหรือลบข้อมูลได้</td>
                                            <?php $g++; } ?>
                                        </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- Modal Bootstrap-->
<?php include('addcompanysecondary.php'); ?>

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
        $('#company').DataTable();
    });
</script>
</html>
