<?
@session_start();
require_once('includementor/connect.php');
if(!isset($_SESSION['mentor_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}

$mentor_code = $_SESSION['mentor_code'];

$z1 = "SELECT * FROM mentor where mentor_code = $mentor_code where approve_status = '1'" ;
$query10 = mysqli_query($conn,$z1);
while ($z1 = mysqli_fetch_array($query10)) {

$company_code = $z1[4];

$a2 = "SELECT * FROM company where company_code = $company_code approve_status = '1'" ;
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
        <form role="form" id="form" name="form" method="POST" action="addcompanybymentornotdataQuery.php">
          <div class="box-body">
            <div class="form-group">
              <label>ชื่อสถานประกอบการ</label>
              <input type="text" name="company_name" placeholder="กรุณากรอกชื่อสถานประกอบการ" class="form-control">
            </div>
            <div class="form-group">
              <label>ที่อยู่สถานประกอบการ</label>
              <textarea class="form-control" rows="4" name="company_address"  placeholder="กรุณากรอกที่อยู่สถานประกอบการ"></textarea>
            </div>
            <div class="form-group">
              <label>Email ของสถานประกอบการ</label>
              <input type="text" name="company_email" placeholder="กรุณากรอก Email สถานประกอบการหากไม่มีให้เว้นว่างไว้" class="form-control">
            </div>
            <div class="form-group">
              <label>เบอร์โทรศัพท์สถานประกอบการ</label>
              <input type="text" name="company_tel" placeholder="กรุณากรอกเบอร์โทรศัพท์" class="form-control">
            </div>
          </div>
          <!-- /.box-body -->
            <div class="box-footer">
              <input type="hidden" name="mentor_code" value="<? echo $mentor_code;?>">
              <button type="submit"  id="submit" name="submit" class="btn btn-success btn-round">ยืนยันข้อมูล</button>
              <button class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิก</button>
            </div>
        </form>
      </div>
<? mysqli_close($conn); ?>
</body>
</html>
