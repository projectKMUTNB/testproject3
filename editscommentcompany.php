<?
@session_start();
require_once('includestudent/connect.php');

if(!isset($_SESSION['student_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}
$student_code = $_GET['id'];

$a = "SELECT * FROM scommentcompany where student_code = $student_code" ;
$query = mysqli_query($conn,$a);
while ($a = mysqli_fetch_array($query)) {

$company_code = $a[4];

$b = "SELECT * FROM company where company_code = $company_code" ;
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
    <h4 class="modal-title">แบบประเมินสถานประกอบการ</h4>
  </div>
  <div class="modal-body">
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="form" name="form" method="POST" action="editscommentcompanyQuery.php">
          <div class="box-body">
            <div class="form-group">
              <label>ความคิดเห็นเพิ่มเติมของสถานประกอบการ</label>
              <input type="text" value="<? echo $b[1]; ?>" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>แก้ไขความคิดเห็นเพิ่มเติม</label>
              <textarea class="form-control" rows="4" name="sccompany_detail"><? echo $a[1];?></textarea>
            </div>
          </div>
          <!-- /.box-body -->
            <div class="box-footer">
              <input type="hidden" name="sccompany_id" value="<? echo $a[0];?>">
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
