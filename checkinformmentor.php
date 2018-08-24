<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>แจ้งวัน-เวลาในการนิเทศกับอาจารย์ &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
    header("location:/login.php");
  }
$query = "SELECT * FROM informtopic WHERE teacher_code = '$_SESSION[teacher_code]'";
$result = mysqli_query($conn,$query);

function DateThai($strDate){
  $strDay = date("d",strtotime($strDate));
  $strYear = date("Y",strtotime($strDate))+543;
  $strMonth = date("n",strtotime($strDate));
  $strHour= date("H",strtotime($strDate));
  $strMinute= date("i",strtotime($strDate));
  $strSeconds= date("s",strtotime($strDate));
  $strMonthCut = Array("","มกราคม",
  "กุมภาพันธ์",
  "มีนาคม",
  "เมษายน",
  "พฤษภาคม",
  "มิถุนายน",
  "กรกฎาคม",
  "สิงหาคม",
  "กันยายน",
  "ตุลาคม",
  "พฤศจิกายน",
  "ธันวาคม");
  $strMonthThai=$strMonthCut[$strMonth];
  return "แจ้งเมื่อ : $strDay $strMonthThai $strYear เวลา $strHour:$strMinute:$strSeconds";
}
date_default_timezone_set("Asia/Bangkok");
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
          แสดงข้อมูลการแจ้งเวลาที่มาจากพี่เลี้ยง
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="teacherindex.php"><i class="fa fa-dashboard"></i>Home</a>
          <li class="active"><i class="fa fa-calendar-check-o"></i></li> ข้อมูลวัน-เวลาในการนิเทศ
        </ol>
      </section>
        <section class="content">
          <div id="page-content-wrapper">
          <div class="container-fluid">
            <?  while($row = mysqli_fetch_array($result)) {

              $mentor_code = $row['mentor_code'];
              $teacher_code = $row['teacher_code'];

              $query1 = "SELECT * FROM mentor,teacher WHERE (mentor.mentor_code ='$mentor_code') AND (teacher.teacher_code = '$teacher_code')";
              $result1 = mysqli_query($conn,$query1);
              while($row1 = mysqli_fetch_array($result1)) {
              ?>
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">
              <span style="font-size:18px;"><?php echo $row['inft_name'];?></span>
              </h4>
            </div>
              <div class="panel-body" style="font-size:14px;">
                <span>แจ้งโดย : <?echo $row1['mentor_name']; ?></span>
                <p>รายละเอียดการแจ้งวัน-เวลา : <?echo $row['inft_detail']; ?></p>
                <p style="color:gray;"><?php echo DateThai($row['inft_date']);?></p>
              </div>
              </div>
            <? } ?>
            <? } ?>
              </div>
            </div>
        </section>
  </div>
</div>

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
<script type="text/javascript">
  $(document).ready(function() {
      demo.initDashboardPageCharts();
  });
</script>
<script>
  $(function () {
    $('.select2').select2()

    $('#datetimepicker').datetimepicker({
    format: 'd/m/Y',
    timepicker:false,
    minDate : 0,
    yearOffset:543,
    lang:'th'
    });

    $('#datetimepicker1').datetimepicker({
    	datepicker:false,
    	format:'H:i',
    });
  })
  </script>
