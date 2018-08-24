<html lang="en">
<head>
    <meta charset="utf-8" />
    <!--<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>หน้าหลัก &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
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
          <? include('include/sidebar.php'); ?>
        </div>
        <div class="main-panel">
          <? include('include/header.php'); ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">person</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">จำนวนนักศึกษาที่ฝึกงาน</p>
                                    <h3 class="title">
                                      <? $a = "SELECT student_code from student";
                                      $query = mysqli_query($conn,$a);
                                      $count = mysqli_num_rows($query);
                                      echo $count; ?>
                                        <small>คน</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">poll</i>
                                        <a href="#">รายละเอียดนักศึกษา</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">school</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">จำนวนอาจารย์</p>
                                    <h3 class="title">
                                      <? $a = "SELECT teacher_code from teacher";
                                      $query = mysqli_query($conn,$a);
                                      $count = mysqli_num_rows($query);
                                      echo $count; ?>
                                      <small>คน</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                  <div class="stats">
                                      <i class="material-icons">poll</i>
                                      <a href="#">รายละเอียดอาจารย์</a>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="red">
                                    <i class="material-icons">work</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">จำนวนบริษัทที่นักศึกษาฝึกงาน</p>
                                    <h3 class="title">
                                      <? $a = "SELECT company_code from company";
                                      $query = mysqli_query($conn,$a);
                                      $count = mysqli_num_rows($query);
                                      echo $count; ?>
                                      <small>บริษัท</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                      <i class="material-icons">poll</i>
                                      <a href="#">รายละเอียดแต่ละบริษัท</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="purple">
                                    <i class="material-icons">group</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">จำนวนพี่เลี้ยง</p>
                                    <h3 class="title">
                                      <? $a = "SELECT mentor_code from mentor";
                                      $query = mysqli_query($conn,$a);
                                      $count = mysqli_num_rows($query);
                                      echo $count; ?>
                                      <small>คน</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                      <i class="material-icons">poll</i>
                                      <a href="#">รายละเอียดพี่เลี้ยง</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!--    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card card-nav-tabs">
                                <div class="card-header" data-background-color="blue">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <span class="nav-tabs-title">ข้อมูลต่างๆ : </span>
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="active">
                                                    <a href="#student" data-toggle="tab">
                                                        <i class="material-icons">person</i> รายชื่อนักศึกษา
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#teacher" data-toggle="tab">
                                                        <i class="material-icons">school</i> รายชื่ออาจารย์
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#company" data-toggle="tab">
                                                        <i class="material-icons">work</i> รายชื่อบริษัท
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#mentor" data-toggle="tab">
                                                        <i class="material-icons">group</i> รายชื่อพี่เลี้ยง
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="student">
                                                  <div class="card-content table-responsive">
                                                      <table class="table table-hover">
                                                          <thead class="text-info">
                                                              <th>ลำดับ</th>
                                                              <th>รหัสนักศึกษา</th>
                                                              <th>ชื่อ - นามสกุล</th>
                                                              <th>เรียนอยู่สาขา</th>
                                                          </thead>
                                                          <tbody>
                                                            <? $query = "SELECT * FROM student";
                                                            $a = 1;
                                                            $query = mysqli_query($conn,$query);
                                                            while ($b = mysqli_fetch_array($query)) { ?>
                                                              <tr>
                                                                  <td><?php echo $a++;?></td>
                                                                  <td><?php echo $b[0];?></td>
                                                                  <td><?php echo $b[1].' '.$b[2];?></td>
                                                                  <td><?php echo $b[3];?></td>
                                                              </tr>
                                                              <? } ?>
                                                          </tbody>
                                                      </table>
                                                  </div>
                                        </div>
                                        <div class="tab-pane" id="teacher">
                                          <div class="card-content table-responsive">
                                              <table class="table table-hover">
                                                  <thead class="text-info">
                                                      <th>ลำดับ</th>
                                                      <th>รหัสอาจารย์</th>
                                                      <th>ชื่อ - นามสกุล</th>
                                                      <th>ตำแหน่ง</th>
                                                  </thead>
                                                  <tbody>
                                                    <? $query = "SELECT * FROM teacher";
                                                    $a = 1;
                                                    $query = mysqli_query($conn,$query);
                                                    while ($b = mysqli_fetch_array($query)) { ?>
                                                      <tr>
                                                          <td><?php echo $a++;?></td>
                                                          <td><?php echo $b[0];?></td>
                                                          <td><?php echo $b[1].' '.$b[2];?></td>
                                                          <td><?php echo $b[3];?></td>
                                                      </tr>
                                                      <? } ?>
                                                  </tbody>
                                              </table>
                                          </div>
                                         </div>
                                        <div class="tab-pane" id="company">
                                          <div class="card-content table-responsive">
                                              <table class="table table-hover">
                                                  <thead class="text-info">
                                                      <th>ลำดับ</th>
                                                      <th>รหัสบริษัท</th>
                                                      <th>ชื่อบริษัท</th>
                                                      <th>ที่อยู่</th>
                                                      <th>email บริษัท</th>
                                                      <th>เบอร์โทร</th>
                                                  </thead>
                                                  <tbody>
                                                    <? $query = "SELECT * FROM company";
                                                    $a = 1;
                                                    $query = mysqli_query($conn,$query);
                                                    while ($b = mysqli_fetch_array($query)) { ?>
                                                      <tr>
                                                          <td><?php echo $a++;?></td>
                                                          <td><?php echo $b[0];?></td>
                                                          <td><?php echo $b[1];?></td>
                                                          <td><?php echo $b[2];?></td>
                                                          <td><?php echo $b[3];?></td>
                                                          <td><?php echo $b[4];?></td>
                                                      </tr>
                                                      <? } ?>
                                                  </tbody>
                                              </table>
                                          </div>
                                        </div>
                                        <div class="tab-pane" id="mentor">
                                          <div class="card-content table-responsive">
                                              <table class="table table-hover">
                                                  <thead class="text-info">
                                                      <th>ลำดับ</th>
                                                      <th>รหัสพี่เลี้ยง</th>
                                                      <th>ชื่อ - นามสกุลพี่เลี้ยง</th>
                                                      <th>เบอร์โทร</th>
                                                      <th>ประจำบริษัท</th>
                                                  </thead>
                                                  <tbody>
                                                    <? $query = "SELECT * FROM mentor,company where mentor.company_code = company.company_code";
                                                    $a = 1;
                                                    $query = mysqli_query($conn,$query);
                                                    while ($b = mysqli_fetch_array($query)) { ?>
                                                      <tr>
                                                          <td><?php echo $a++;?></td>
                                                          <td><?php echo $b[0];?></td>
                                                          <td><?php echo $b[1].' '.$b[2];?></td>
                                                          <td><?php echo $b[3];?></td>
                                                          <td><?php echo $b[6];?></td>
                                                      </tr>
                                                      <? } ?>
                                                  </tbody>
                                              </table>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li><a href="adminmanage.php">หน้าหลัก</a></li>
                            <li><a onclick="window.location.href='?logout'">ออกจากระบบ</a></li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>document.write(new Date().getFullYear())</script>
                        มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ วิทยาเขตปราจีนบุรี
                    </p>
                </div>
            </footer>
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
