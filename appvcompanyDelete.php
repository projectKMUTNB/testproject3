<?
@session_start();
require_once('include/connect.php');

if(!isset($_SESSION['username']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}
$g = $_GET['g'];
$query = "SELECT * FROM company where company_code = $g" ;
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
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">ลบข้อมูลหรือยกเลิกการนำเข้าข้อมูลนี้</h4>
                            <p class="category">คุณต้องลบข้อมูลหรือยกเลิกการนำเข้าข้อมูลนี้<นี้ใช่หรือไม่ ?</p>
                        </div>
              <div class="modal-body">
                <form role="form" name="form" method="post" action="deleteappvcompanyQuery.php" >
                  <div class="row">
                      <div class="col-lg-12">
                        <input type="hidden" name="g" value="<? echo $g ?>">
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
