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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
<div id="addselectstudent" class="modal modal-primary fade" id="modal-primary">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">เพิ่มข้อมูลการนิเทศนักศึกษา</h4>
      </div>
      <div class="modal-body">
        <form id="form" name="form" method="post" action="">
              <div class="form-group">
                <label>เลือกชื่อนักศึกษาที่จะไปนิเทศ</label>
                <select class="form-control select2" name="student_code" data-placeholder="กรอกชื่อหรือรหัสนักศึกษา"
                style="width: 100%;">
                <? $b = "SELECT * FROM student" ;
                $query1 = mysqli_query($conn,$b);
                while ($b = mysqli_fetch_array($query1)) {?>
                  <option value="<? echo $b[0]; ?>"><? ; echo $b[0]." ".$b[1]." ".$b[2];?></option>
                <? } ?>
                </select>
              </div>
              <div class="form-group label-floating has-feedback">
                <label>เลือกวันที่จะไปนิเทศ</label>
                <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="sv_date" id="datetimepicker" class="form-control css-require">
              </div>
            </div>
            <div class="bootstrap-timepicker">
              <div class="form-group label-floating has-feedback">
                <label>เลือกเวลาในการนิเทศ</label>
                <div class="input-group">
                <div class="input-group-addon">
                <i class="fa fa-clock-o"></i></div>
                <input type="text" name="sv_time" class="form-control css-require" id="datetimepicker1">
                </div>
                </div>
              </div>
            </div>
        <div class="modal-footer">
          <button type="submit" id="submit" name="submit" class="btn btn-success pull-left">ยืนยันข้อมูล</button>
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">กลับสู่หน้าเดิม</button>
        </div>
    </form>
    </div>
    </div>
</div>
<?
  if(isset($_POST['submit'])){
  date_default_timezone_set("Asia/Bangkok");

  $student_code = $_POST['student_code'];
  $teacher_code = $_SESSION['teacher_code'];
  $sv_date = $_POST['sv_date'];
  $sv_time = $_POST['sv_time'];

  $c = "SELECT * FROM supervision where student_code = $student_code;" ;
  $result1 = mysqli_query($conn,$c);
  $count =  mysqli_num_rows($result1);

  if($count==0){
        $query = "INSERT INTO supervision values (' ',
        '$student_code',
        '$teacher_code',
        '$sv_date',
        '$sv_time')";

        $result = mysqli_query($conn,$query);
        if($result){
          ?> <script>swal("เรียบร้อยแล้ว!", "ทำการบันทึกข้อมูลเรียบร้อยแล้ว", "success" , {buttons: false,});
            </script>
        <?  echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"4; URL=selectstudent.php\">";
        }else{
          echo "<script>alert(";
          echo "บันทึกข้อมูลล้มเหลว(\"mysqli_error($conn)\")";
          echo ")</script>";
        }
        mysqli_close($conn);
      }if ($count==1) {
        ?> <script>swal("คำเตือน!", "ไม่สามารถทำการบันทึกข้อมูลได้เนื่องจากมีข้อมูลในระบบแล้ว", "warning" , {buttons: false,});</script>
      <?  echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"4; URL=selectstudent.php\">";
      }
}
?>
</body>
</html>
