<?
@session_start();
require_once('includementor/connect.php');
if(!isset($_SESSION['mentor_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
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
<div id="inform" class="modal" id="modal-primary">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">เพิ่มการแจ้งวัน-เวลาในการนิเทศ</h4>
      </div>
      <div class="modal-body">
        <form id="form" name="form" method="post" action="addinformdayQuery.php">
              <div class="form-group label-floating has-feedback">
                <label>เลือกอาจารย์ที่นิเทศ</label>
                <select class="form-control select2" name="teacher_code" data-placeholder="กรอกชื่ออาจารย์"
                style="width: 100%;">
                <? $b = "SELECT * FROM teacher" ;
                $query1 = mysqli_query($conn,$b);
                while ($b = mysqli_fetch_array($query1)) {?>
                  <option value="<? echo $b[0]; ?>"><?echo $b[1]." ".$b[2];?></option>
                <? } ?>
                </select>
              </div>
              <div class="form-group label-floating has-feedback">
                <label>กรอกชื่อหัวข้อที่ต้องการแจ้ง</label>
                <input type="text" name="inft_name" class="form-control css-require" placeholder="กรอกชื่อหัวข้อ">
              </div>
              <div class="form-group label-floating has-feedback">
                <label>กรอกรายละเอียด</label>
                <textarea class="form-control css-require" rows="4" name="inft_detail" placeholder="กรอกการแจ้งวัน-เวลารายละเอียด"></textarea>
              </div>
            </div>
        <div class="modal-footer">
          <button type="submit" id="submit" name="submit" class="btn btn-success pull-left has-feedback">ยืนยันข้อมูล</button>
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">กลับสู่หน้าเดิม</button>
        </div>
    </form>
    </div>
    </div>
</div>
</body>
</html>
