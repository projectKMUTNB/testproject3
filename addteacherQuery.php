<html>
<head>
  <meta charset="utf-8" />
  <!--<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png" />-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>ผลการบันทึกข้อมูลอาจารย์ &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
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
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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
  $teacher_code = $_POST['teacher_code'];
  $teacher_name = $_POST['teacher_name'];
  $teacher_surname = $_POST['teacher_surname'];
  $teacher_position = $_POST['teacher_position'];
  $teacher_department = $_POST['teacher_department'];
  $teacher_password = $_POST['teacher_password'];
  $email_teacher = $_POST['email_teacher'];
      $query = "INSERT INTO teacher values ('',
      '$teacher_name',
      '$teacher_surname',
      '$teacher_position',
      '$teacher_department',
      '3',
      '$email_teacher',
      '$teacher_password',
      '2','','')";
      $result = mysqli_query($conn,$query);

      if($result){?>
              <div class="col-lg-12 col-md-12">
                  <div class="card">
                      <div class="card-header" data-background-color="green">
                          <h4 class="title">บันทึกข้อมูลเรียบร้อยแล้ว กำลังทำการ Redirect กลับหน้าเดิมภายใน 3 วินาท</h4>
                          <p class="category">ข้อมูลที่บันทึกลงฐานข้อมูลคือ</p>
                      </div>
                      <div class="card-content table-responsive">
                          <table class="table table-hover" id="teacher">
                              <thead class="text-warning">
                                  <th>ชื่อ-นามสกุลอาจารย์</th>
                                  <th>ตำแหน่งทางวิชาการ</th>
                                  <th>สาขาทีอาจารย์สังกัดอยู่</th>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td><?php echo $teacher_name.' '.$teacher_surname; ?></td>
                                    <td><?php echo $teacher_position; ?></td>
                                    <td><?php echo $teacher_department; ?></td>
                                </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
        <?  echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=teacherdata.php\">";
      }else{
        echo "<script>alert(";
        echo "บันทึกข้อมูลล้มเหลว(\"mysqli_error($conn)\")";
        echo ")</script>";
      }
      mysqli_close($conn);
    ?>
</body>
</html>
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
