<?
@session_start();
require_once('includeteacher/connect.php');
if(!isset($_SESSION['teacher_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:/login.php");
}
$student_code = $_GET['id'];
$query = "SELECT * FROM student where student_code = $student_code" ;
$query = mysqli_query($conn,$query);
$c = mysqli_fetch_array($query);
?>

<script type="text/javascript">
$(function(){

    var obj_check=$(".css-require");
    $("#form").on("submit",function(){
        obj_check.each(function(i,k){
            var status_check=0;
            if(obj_check.eq(i).find(":radio").length>0 || obj_check.eq(i).find(":checkbox").length>0){
                status_check=(obj_check.eq(i).find(":checked").length==0)?0:1;
            }else{
                status_check=($.trim(obj_check.eq(i).val())=="")?0:1;
            }
            formCheckStatus($(this),status_check);
        });
        if($(this).find(".has-error").length>0){
             return false;
        }
    });

    obj_check.on("change",function(){
        var status_check=0;
        if($(this).find(":radio").length>0 || $(this).find(":checkbox").length>0){
            status_check=($(this).find(":checked").length==0)?0:1;
        }else{
            status_check=($.trim($(this).val())=="")?0:1;
        }
        formCheckStatus($(this),status_check);
    });

    var formCheckStatus = function(obj,status){
        if(status==1){
            obj.parent(".form-group").removeClass("has-error").addClass("has-success");
            obj.next(".glyphicon").removeClass("glyphicon-warning-sign").addClass("glyphicon-ok");
        }else{
            obj.parent(".form-group").removeClass("has-success").addClass("has-error");
            obj.next(".glyphicon").removeClass("glyphicon-ok").addClass("glyphicon-warning-sign");
        }
    }
});
</script>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>แก้ไขชื่อนักศึกษา &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="hold-transition skin-purple sidebar-mini">
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
        แก้ไขชื่อนักศึกษา
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="teacherindex.php"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fa fa-gear"></i></li> แก้ไขชื่อนักศึกษา
      </ol>
    </section>
      <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">แก้ไขชื่อนักศึกษา</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <form id="form" name="form" method="post" action="">
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>รหัสนักศึกษา</label>
                  <input type="number" value="<? echo $c[0]; ?>" class="form-control" disabled/>
                </div>
                <div class="form-group form-group label-floating has-feedback">
                  <label>ชื่อนักศึกษา</label>
                  <input type="text" name="student_name" value="<? echo $c[1]; ?>" class="form-control css-require">
                </div>
                <div class="form-group form-group label-floating has-feedback">
                  <label>นามสกุลนักศึกษา</label>
                  <input type="text" name="student_surname" value="<? echo $c[2]; ?>" class="form-control css-require">
                </div>
                <input type="hidden" name="student_code" value="<? echo $c[0]; ?>">
                </div>
              </div>
            </div>
          <div class="box-footer">
            <button type="submit" id="submit" name="submit" class="btn btn-success has-feedback">ยืนยันการแก้ไข</button>
            <a href="teacherindex.php" class="btn btn-danger">ยกเลิกการแก้ไข</a>
          </div>
        </form>
      </div>
    </section>
  </div>
</div>
</div>
<?
  if(isset($_POST['submit'])){

  $student_code = $_POST['student_code'];
  $student_name = $_POST['student_name'];
  $student_surname = $_POST['student_surname'];

  $query1 = "UPDATE student SET student_name = '$student_name',
  student_surname = '$student_surname' WHERE student_code='$student_code'";
  $result = mysqli_query($conn,$query1);
  if($result){
    ?> <script>swal("เรียบร้อยแล้ว!", "ทำการบันทึกข้อมูลเรียบร้อยแล้ว", "success" , {buttons: false,});
      </script>
    <? echo "<meta http-equiv=\"refresh\" content=\"4;URL=teacherindex.php\"/>";
  }else{
    ?> <script>swal("คำเตือน!", "ไม่สามารถทำการบันทึกข้อมูลได้", "warning" , {buttons: false,});</script>
    <? echo "<meta http-equiv=\"refresh\" content=\"4;URL=teacherindex.php\"/>";
  }
  mysqli_close($conn);
}
?>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
      demo.initDashboardPageCharts();
  });
</script>
<script>
$(function () {
  //Initialize Select2 Elements
  $('.select2').select2()

  //Datemask dd/mm/yyyy
  $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
  //Datemask2 mm/dd/yyyy
  $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
  //Money Euro
  $('[data-mask]').inputmask()

  //Date range picker
  $('#reservation').daterangepicker()
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
  //Date range as a button
  $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )

  //Date picker
  $('#datepicker').datepicker({
    autoclose: true
  })

  //iCheck for checkbox and radio inputs
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
  })
  //Red color scheme for iCheck
  $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    checkboxClass: 'icheckbox_minimal-red',
    radioClass   : 'iradio_minimal-red'
  })
  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  })

  //Colorpicker
  $('.my-colorpicker1').colorpicker()
  //color picker with addon
  $('.my-colorpicker2').colorpicker()

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })
})
</script>
</body>
</html>
