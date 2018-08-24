<?
@session_start();
require_once('includementor/connect.php');
if(!isset($_SESSION['mentor_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}
$inft_id = $_GET['id'];

$a = "SELECT * FROM informtopic where inft_id = $inft_id" ;
$query = mysqli_query($conn,$a);
while ($a = mysqli_fetch_array($query)) {

$teacher_code = $a[4];

$b = "SELECT * FROM teacher where teacher_code = $teacher_code" ;
$query1 = mysqli_query($conn,$b);
while ($b = mysqli_fetch_array($query1)) {
?>
<html lang="en">
<head>
</head>
<body>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">แก้ไขการแจ้งวัน-เวลาในการนิเทศ</h4>
  </div>
  <div class="modal-body">
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="form" name="form" method="POST" action="editinformdataQuery.php">
          <div class="box-body">
            <div class="form-group">
              <label>ชื่อ-นามสกุลอาจารย์ที่แจ้งไป</label>
              <input type="text" value="<? echo $b[1].' '.$b[2]; ?>" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>ชื่อหัวข้อที่แจ้ง</label>
              <input type="text" class="form-control" value="<? echo $a[1]; ?>" placeholder="กรอกชื่อหัวข้อ" disabled>
            </div>
            <div class="form-group">
              <label>แก้ไขรายละเอีรายละเอียดการแจ้งวัน-เวลา</label>
              <textarea class="form-control" rows="4" name="inft_detail"><? echo $a[2];?></textarea>
            </div>
          </div>
          <!-- /.box-body -->
            <div class="box-footer">
              <input type="hidden" name="inft_id" value="<? echo $inft_id;?>">
              <button type="submit"  id="submit" name="submit" class="btn btn-success btn-round">ยืนยันการแก้ไขข้อมูล</button>
              <button class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิกการแก้ไข</button>
            </div>
        </form>
      </div>
<?}?>
<?}
mysqli_close($conn);?>
</body>
</html>
