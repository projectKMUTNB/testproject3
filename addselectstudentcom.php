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
<html lang="en">
<head>
</head>
<body>
  <link rel="stylesheet" type="text/css" href="/jquery.datetimepicker.css"/ >
<script src="/jquery.js"></script>
<script src="/build/jquery.datetimepicker.full.min.js"></script>
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
<div id="addselectstudentcom" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
              <div class="content">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">เลือกนักศึกษาทีฝึกงาน</h4>
                                    <p class="category">กรอกเลือกนักศึกษาที่ฝึกงานในสถานประกอบการของท่าน</p>
                                </div>
                                        <div class="col-lg-12">
                                            <form role="form" id="form1" name="form1" method="post" action="addselectstudentcomQuery.php">
                                              <div class="form-group label-floating has-feedback">
                                              <label>เลือกนักศึกษาที่ฝึกงาน</label>
                                              <select class="form-control css-require" name="student_code" >
                                                <? $b = "SELECT * FROM student where student_code = student_code" ;
                                                $query1 = mysqli_query($conn,$b);
                                                $g=1;
                                                while ($b = mysqli_fetch_array($query1)) {?>
                                                  <option value="<? echo $b[0]; ?>"><? ; echo $b[0]." ".$b[1]." ".$b[2];?></option>
                                                <? } ?>
                                              </select>
                                            </div>
                                              <button type="submit"  id="submit" name="submit"
                                              class="btn btn-success btn-round has-feedback">ยืนยันข้อมูล</button>
                                              <button class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิก</button>
                                        </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
</body>
<script type="text/javascript">
 jQuery('#startdate').datetimepicker({
 lang:'th'
 });
 </script>
</html>
