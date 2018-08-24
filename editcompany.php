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
                                  <h4 class="title">แก้ไขข้อมูลสถานประกอบการ</h4>
                                  <p class="category">แก้ไขข้อมูลสถานประกอบการที่นักศึกษาฝึกงานอยู่</p>
                              </div>
                                      <div class="col-lg-12">
                                          <form role="form" id="form" name="form" method="post" action="editcompanyQuery.php">
                                          
                                            <div class="form-group label-floating has-feedback">
                                              <label class="control-label">ชื่อสถานประกอบการ</label>
                                              <input type="text" name="company_name" value="<? echo $c[1]; ?>" class="form-control css-require">
                                            </div>
                                            <div class="form-group label-floating has-feedback">
                                                <label class="control-label">ที่อยู่สถานประกอบการ</label>
                                                <textarea class="form-control css-require" name="company_address" rows="4"><? echo $c[2]; ?></textarea>
                                            </div>
                                            <div class="form-group label-floating has-feedback">
                                              <label class="control-label">Email สถานประกอบการ</label>
                                              <input type="text" name="company_email" value="<? echo $c[3]; ?>" class="form-control css-require">
                                            </div>
                                            <div class="form-group label-floating has-feedback">
                                              <label class="control-label">เบอร์โทรศัพท์สถานประกอบการ</label>
                                              <input type="number" name="company_tel" value="<? echo $c[4]; ?>" class="form-control css-require">
                                            </div>
                                            <input type="hidden" name="g" value="<? echo $_GET['g']; ?>">
                                            <button type="submit"  id="submit" name="submit"
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
