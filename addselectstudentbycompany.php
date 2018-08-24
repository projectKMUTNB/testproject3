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
<html lang="en">
<head>
</head>
<body>
<div id="addselectstudent" class="modal" id="modal-primary">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">เพิ่มนิเทศนักศึกษาที่ฝึกงาน</h4>
      </div>
      <div class="modal-body">
        <form id="form1" name="form1" method="post" action="addselectstudentbycompanyQuery.php">
              <div class="form-group">
                <label>เลือกชื่อนักศึกษาที่ฝึกงานอยู่</label>
                <select class="form-control select2" name="student_code" data-placeholder="กรอกชื่อหรือรหัสนักศึกษา"
                style="width: 100%;">
                <? $b = "SELECT * FROM student" ;
                $query1 = mysqli_query($conn,$b);
                while ($b = mysqli_fetch_array($query1)) {?>
                  <option value="<? echo $b[0]; ?>"><? ; echo $b[0]." ".$b[1]." ".$b[2];?></option>
                <? } ?>
                </select>
              </div>
            </div>
        <div class="modal-footer">
          <button type="submit" name="summit" class="btn btn-success pull-left">ยืนยันข้อมูล</button>
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">กลับสู่หน้าเดิม</button>
        </div>
    </form>
    </div>
    </div>
</div>
</body>
</html>
