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
$query = "SELECT * FROM teacher where teacher_code = $g" ;
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
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">แก้ไขข้อมูลอาจารย์</h4>
                                    <p class="category">แก้ไขข้อมูลอาจารย์ที่นิเทศงานนักศึกษา</p>
                                </div>
                                <div class="col-lg-12">
                                <form role="form" id="form" name="form" method="post" action="editteacherQuery.php">
                                  <div class="form-group label-floating has-feedback">
                                    <label class="control-label">ชื่ออาจารย์</label>
                                    <input type="text" name="teacher_name" value="<? echo $c[1]; ?>" class="form-control css-require">
                                  </div>
                                  <div class="form-group label-floating has-feedback">
                                    <label class="control-label">นามสกุลอาจารย์</label>
                                    <input type="text" name="teacher_surname" value="<? echo $c[2]; ?>" class="form-control css-require">
                                  </div>
                                  <div class="form-group label-floating has-feedback">
                                    <label class="control-label">ตำแหน่งทางวิชาการอาจารย์</label>
                                    <select class="form-control select2" name="teacher_position" style="width: 100%;">
                                      <option selected="selected"><?echo $c[3]; ?></option>
                                      <option>อาจารย์</option>
                                      <option>ผู้ช่วยศาสตราจารย์</option>
                                      <option>รองศาสตราจารย์</option>
                                      <option>ศาสตราจารย์</option>
                                      <option>ดร.</option>
                                    </select>
                                  </div>
                                  <div class="form-group label-floating has-feedback">
                                    <label class="control-label">สาขาที่อาจารย์สังกัดอยู่</label>
                                    <input type="text" name="teacher_department" value="<? echo $c[4]; ?>" class="form-control css-require">
                                  </div>
                                  <div class="form-group label-floating has-feedback">
                                    <label class="control-label">Email อาจารย์</label>
                                    <input type="text" name="email_teacher" value="<? echo $c[6]; ?>" class="form-control css-require">
                                  </div>
                                  <input type="hidden" name="g" value="<? echo $_GET['g']; ?>">
                                  <button type="submit" id="submit" name="submit"
                                  class="btn btn-success btn-round has-feedback">ยืนยันข้อมูล</button>
                                  <button class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิก</button>
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
