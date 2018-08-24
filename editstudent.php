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
$query = "SELECT * FROM student where student_code = $g" ;
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
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">แก้ไขข้อมูลนักศึกษา</h4>
                                    <p class="category">แก้ไขข้อมูลนักศึกษาที่ฝึกงาน</p>
                                </div>
                                        <div class="col-lg-12">
                                            <form role="form" id="form" name="form" method="post" action="editstudentQuery.php">
                                              <div class="form-group label-floating has-feedback">
                                                <label class="control-label">รหัสนักศึกษา</label>
                                                <input type="number" name="" value="<? echo $c[0]; ?>" class="form-control css-require" disabled/>
                                              </div>
                                              <div class="form-group label-floating has-feedback">
                                                <label class="control-label">ชื่อนักศึกษา</label>
                                                <input type="text" name="student_name" value="<? echo $c[1]; ?>" class="form-control css-require">
                                              </div>
                                              <div class="form-group label-floating has-feedback">
                                                <label class="control-label">นามสกุลนักศึกษา</label>
                                                <input type="text" name="student_surname" value="<? echo $c[2]; ?>" class="form-control css-require">
                                              </div>
                                              <div class="form-group label-floating has-feedback">
                                                <label class="control-label">สาขาที่นักศึกษาสังกัดอยู่</label>
                                                <input type="text" name="student_department" value="<? echo $c[3]; ?>" class="form-control css-require">
                                              </div>
                                              <div class="form-group label-floating has-feedback">
                                                <label class="control-label">Email นักศึกษา</label>
                                                <input type="text" name="email_student" value="<? echo $c[5]; ?>" class="form-control css-require">
                                              </div>
                                              <input type="hidden" name="g" value="<? echo $_GET['g']; ?>">
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
