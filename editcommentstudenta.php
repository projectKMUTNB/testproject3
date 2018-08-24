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
$query = "SELECT * FROM commentstudent where commentstu_id = $g" ;
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
                              <div class="card-header" data-background-color="purple">
                                  <h4 class="title">แก้ไขความคิดเห็นเพิ่มเติม</h4>
                                  <p class="category">แก้ไขความคิดเห็นเพิ่มเติม</p>
                              </div>
                                      <div class="col-lg-12">
                                          <form role="form" id="form" name="form" method="post" action="editcommentstudentaQuery.php">
                                            <div class="form-group label-floating has-feedback">
                                              <label class="control-label">ความคิดเห็นเพิ่มเติม</label>
                                              <textarea rows="4" name="commentstu_detail" class="form-control css-require"><?echo $c[1];?></textarea>
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
