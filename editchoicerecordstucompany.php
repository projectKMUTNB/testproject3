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
$query = "SELECT * FROM choicerecordstucompany where crsc_id = $f" ;
$query = mysqli_query($conn,$query);
$c = mysqli_fetch_array($query);

?>
<html lang="en">
<head>
</head>
<body>
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="content">
                  <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                              <div class="card-header" data-background-color="red">
                                  <h4 class="title">แก้ไขข้อมูลหัวข้อรองสำหรับนักศึกษาประเมินสถานประกอบการ</h4>
                                  <p class="category">แก้ไขข้อมูลหัวข้อรองสำหรับนักศึกษาประเมินสถานประกอบการ</p>
                              </div>
                                      <div class="col-lg-12">
                                          <form role="form" id="form" name="form" method="post" action="editchoicerecordstucompanyQuery.php">
                                            <div class="form-group label-floating has-feedback">
                                              <label class="control-label">หัวข้อรองสำหรับนักศึกษาประเมินสถานประกอบการ</label>
                                              <input type="text" name="crsc_name" value="<? echo $c[1]; ?>" class="form-control css-require" >
                                            </div>
                                            <input type="hidden" name="e" value="<? echo $c[2]; ?>">
                                            <input type="hidden" name="g" value="<? echo $_GET['f']; ?>">
                                            <button type="submit" id="submit" name="submit"
                                            class="btn btn-success btn-round has-feedback">ยืนยันข้อมูล</button>
                                            <button class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิก</button>
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
</body>
</html>
