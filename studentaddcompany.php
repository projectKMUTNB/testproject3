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
  require_once('includestudent/connect.php');

  if(!isset($_SESSION['student_code']))
  header("location:login.php");
  if(isset($_GET['logout'])){
    session_destroy();
    header("location:login.php");
  }
  $a = $_SESSION['student_name'];
  $b = $_SESSION['student_surname'];
  $c = $_SESSION['student_code'];
  ?>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
          <? include('includestudent/sidebarstudent.php'); ?>
        </div>
        <div class="main-panel">
          <? include('includestudent/headerstudent.php'); ?>
            <div class="content">
                      <div class="col-lg-12 col-md-12">
                          <div class="card">
                              <div class="card-header" data-background-color="green">
                                  <h4 class="title">เพิ่มข้อมูลสถานประกอบการโดยนักศึกษา</h4>
                              </div>
                              <div class="card-content">
                                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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
                               <div class="row">
                                                 <div class="col-lg-12">
                                                     <form role="form" id="form" name="form" method="post" action="#">
                                                       <div class="form-group label-floating has-feedback">
                                                         <label class="control-label">ชื่อ-นามสกุลนักศึกษา</label>
                                                         <input type="text" name="" value="<?echo $a." ".$b; ?>" class="form-control css-require">
                                                       </div>
                                                       <div class="form-group label-floating has-feedback">
                                                         <label class="control-label">ชื่อสถานประกอบการ</label>
                                                         <input type="text" name="" class="form-control css-require">
                                                       </div>
                                                       <div class="form-group label-floating has-feedback">
                                                           <label class="control-label">ที่อยู่สถานประกอบการ</label>
                                                           <textarea class="form-control css-require" name="" rows="4"></textarea>
                                                       </div>
                                                       <div class="form-group label-floating has-feedback">
                                                       <label>ค่าตำแหน่ง X และ Y ในฐานข้อมูลล่าสุด</label>
                                                       <select class="form-control css-require" name="" >
                                                         <? $b = "SELECT * FROM location where student_code = $c" ;
                                                         $query1 = mysqli_query($conn,$b);
                                                         $g=1;
                                                         while ($b = mysqli_fetch_array($query1)) {?>
                                                           <option value="<? echo $b[0]; ?>"><? ; echo "ค่าตำแหน่ง X".$b[1]." - ค่าตำแหน่ง Y ".$b[2];?></option>
                                                         <? } ?>
                                                       </select>
                                                     </div>
                                                       <button type="submit"  id="submit" name="submit"
                                                       class="btn btn-success btn-round has-feedback">ยืนยันข้อมูล</button>
                                                       <button class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิก</button>
                                               </div>
                                       </form>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
</body>
<!-- Modal Bootstrap-->

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
</html>
