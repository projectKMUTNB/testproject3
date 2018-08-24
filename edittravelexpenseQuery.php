<html>
<head>
  <meta charset="utf-8" />
  <!--<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png" />-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>ผลการแก้ไขข้อมูลค่าเดินทาง &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
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
require_once('include/connect.php');

$te_bath = $_POST['te_bath'];
$te_id = $_POST['g'];

    $query = "UPDATE travelexpense SET
    te_bath='$te_bath' WHERE te_id = '$te_id'";

    $result = mysqli_query($conn,$query);

    if($result){?>
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="green">
                        <h4 class="title">แก้ไขข้อมูลเรียบร้อยแล้ว กำลังทำการ Redirect กลับหน้าเดิมภายใน 3 วินาที</h4>
                    </div>
                </div>
            </div>
      <?  echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=travelexpense.php\">";
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
