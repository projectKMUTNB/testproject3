<?
@session_start();
require_once('include/connect.php');

if(!isset($_SESSION['username']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}
$f = $_GET['f'];
$query = "SELECT * FROM choicerecordstudent where crs_id = $f" ;
$query = mysqli_query($conn,$query);
$c = mysqli_fetch_array($query);
?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                        <div class="card-header" data-background-color="red">
                            <h4 class="title">ลบข้อมูลหัวข้อรองสำหรับประเมินนักศึกษา</h4>
                            <p class="category">คุณต้องการลบข้อมูลหัวข้อรองสำหรับประเมินนักศึกษานี้ใช่หรือไม่ ?</p>
                        </div>
              <div class="modal-body">
                <form role="form" name="form" method="post" action="deletechoicerecordstudentQuery.php" >
                  <div class="row">
                      <div class="col-lg-12">
                      <div class="table-responsive">
                        <table class="table">
                        <tr><h4 class="title">ข้อมูลที่ท่านต้องการลบคือ</h4></tr>
                        <tr><p class="category"> * หากกดปุ่มลบข้อมูลคุณจะไม่สามารถนำข้อมูลเดิมมาใช้ใหม่ได้</p></tr>
                        <tr><td>ชื่อหัวข้อรองสำหรับประเมินนักศึกษา </td><td><?php echo $c[1]; ?></td></tr>
                        <tr><td>หัวข้อหลักสำหรับประเมินนักศึกษาชื่อ </td><td>
                        <? $b = "SELECT * FROM mainrecordstudent where mrs_id = $c[2]" ;
                        $query1 = mysqli_query($conn,$b);
                        while ($b = mysqli_fetch_array($query1)) {?>
                        <?php echo $b[1]; ?>
                        <?php } ?>
                        </td></tr>
                        </table>
                        <input type="hidden" name="f" value="<? echo $f ?>">
                      </div>
                      <button type="submit" class="btn btn-danger btn-round ">ลบข้อมูล</button>
                      <button class="btn btn-warning btn-round " data-dismiss="modal">ยกเลิก</button>
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
</div>
