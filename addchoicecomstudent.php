<?
@session_start();
require_once('includeteacher/connect.php');
if(!isset($_SESSION['teacher_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:/login.php");
}
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
<html lang="en">
<head>
</head>
<body>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">เพิ่มหัวข้อรองสถานประกอบการประเมินนักศึกษา</h4>
  </div>
  <div class="modal-body">
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="form" name="form" method="POST" action="addchoicecomstudentQuery.php">
          <div class="box-body">
            <div class="form-group label-floating has-feedback">
              <label>หัวข้อรองสถานประกอบการประเมินนักศึกษา</label>
              <input type="text" name="crcs_name" class="form-control css-require" placeholder="กรุณากรอกชื่อหัวข้อรอง">
            </div>
            <div class="form-group">
              <label>หัวข้อหลักสถานประกอบการประเมินนักศึกษา</label>
              <select class="form-control" name="mrcs_id" data-placeholder=""
              style="width: 100%;">
              <? $b = "SELECT * FROM mainrecordcomstudent" ;
              $query1 = mysqli_query($conn,$b);
              while ($b = mysqli_fetch_array($query1)) {?>
                <option value="<? echo $b[0]; ?>"><? ; echo $b[0]." ".$b[1];?></option>
              <? } ?>
              </select>
            </div>
          </div>
          <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit"  id="submit" name="submit" class="btn btn-success btn-round has-feedback">ยืนยันข้อมูล</button>
              <button class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิก</button>
            </div>
        </form>
      </div>
<? mysqli_close($conn); ?>
</body>
</html>
