<?
@session_start();
require_once('includestudent/connect.php');
if(!isset($_SESSION['student_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:/login.php");
}

$student_code = $_SESSION['student_code'];

$z1 = "SELECT * FROM apprenticeship where student_code = $student_code" ;
$query10 = mysqli_query($conn,$z1);
while ($z1 = mysqli_fetch_array($query10)) {

$company_code = $z1[2];

$a2 = "SELECT * FROM company where company_code = $company_code" ;
$result101 = mysqli_query($conn,$a2);
$count101 =  mysqli_num_rows($result101);

if($count101=='1'){
  echo '<script>';
  echo 'alert("ไม่สามารถเข้าทำรายการได้เนื่องจากท่านมีสถานประกอบการสังกัดแล้ว")';
  echo '</script>';
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=mentorindex.php\" />";
}
}

?>
<script>
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
<html lang="en">
<head>
</head>
<body>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">เพิ่มสถานประกอบการ</h4>
  </div>
  <div class="modal-body">
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="form" name="form" method="POST" action="addapprencompanynotdataQuery.php">
          <div class="box-body">
            <div class="form-group label-floating has-feedback">
              <label>ชื่อสถานประกอบการ</label>
              <input type="text" name="company_name" placeholder="กรุณากรอกชื่อสถานประกอบการ" class="form-control css-require">
            </div>
            <div class="form-group label-floating has-feedback">
              <label>ที่อยู่สถานประกอบการ</label>
              <textarea class="form-control css-require" rows="4" name="company_address" placeholder="กรุณากรอกที่อยู่สถานประกอบการ"></textarea>
            </div>
            <div class="form-group label-floating has-feedback">
              <label>Email ของสถานประกอบการ</label>
              <input type="text" name="company_email" placeholder="กรุณากรอก Email สถานประกอบการหากไม่มีให้เว้นว่างไว้" class="form-control css-require">
            </div>
            <div class="form-group label-floating has-feedback">
              <label>เบอร์โทรศัพท์สถานประกอบการ</label>
              <input type="text" name="company_tel" placeholder="กรุณากรอกเบอร์โทรศัพท์" class="form-control css-require" >
            </div>
          </div>
            <div class="box-footer">
              <input type="hidden" name="student_code" value="<? echo $student_code;?>">
              <button type="submit"  id="submit" name="submit" class="btn btn-success btn-round has-feedback">ยืนยันข้อมูล</button>
              <button class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิก</button>
            </div>
        </form>
      </div>
<? mysqli_close($conn); ?>
</body>
</html>
