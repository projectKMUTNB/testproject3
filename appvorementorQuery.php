<html>
<head>
  <meta charset="utf-8" />
  <!--<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png" />-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>ผลการยืนยันข้อมูลพี่เลี้ยง &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
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

$mentor_code = $_GET['g'];

    $query = "UPDATE mentor SET
    approve_status='1' WHERE mentor_code = '$mentor_code'";

    $result = mysqli_query($conn,$query);

    if($result){?>
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="green">
                        <h4 class="title">ยืนยันข้อมูลเรียบร้อยแล้ว กำลังทำการ Redirect กลับหน้าเดิมภายใน 5 วินาที</h4>
                        <p class="category">ข้อมูลที่ทำการยืนยันลงฐานข้อมูลคือ</p>
                    </div>
                </div>
            </div>
      <?  echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"5; URL=appvorementor.php\">";
    }else{
      echo "<script>alert(";
      echo "บันทึกข้อมูลล้มเหลว(\"mysqli_error($conn)\")";
      echo ")</script>";
    }
    mysqli_close($conn);
  ?>
</body>
</html>
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<script src="assets/js/chartist.min.js"></script>
<script src="assets/js/arrive.min.js"></script>
<script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
<script src="assets/js/bootstrap-notify.js"></script>
<script src="assets/js/material-dashboard.js?v=1.2.0"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/demo.js"></script>
<script type="text/javascript">
