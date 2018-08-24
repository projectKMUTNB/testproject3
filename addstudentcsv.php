<?
@session_start();
require_once('include/connect.php');

if(!isset($_SESSION['username']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

    if(isset($_POST['submit']))
    {
         $fname = $_FILES['sel_file']['name'];
         $chk_ext = explode(".",$fname);

         if(strtolower(end($chk_ext)) == "csv")
         {

             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");

	   		set_time_limit(0);

             while (($data = fgetcsv($handle, 10000, ",")) !== FALSE)
             {
                $sql = "INSERT into student(student_code,student_name,student_surname,student_department,status_id,email_student,student_password,statusp_id,img_student,student_address,student_phone,reset_check)
                 values('$data[0]','$data[1]','$data[2]','$data[3]','4','null','null','2','null','null','null','null')";
                mysqli_query($conn,$sql) or die(mysql_error());

             }
             fclose($handle);
             echo "<script>alert(\"บันทึกข้อมูลเรียบร้อยแล้ว\")</script>";
             echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=studentdata.php\">";
         }
         else
         {
           echo "<script>alert(\"ไม่สามารถบันทึกข้อมูลได้\")</script>";
           echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=studentdata.php\">";
         }

    }
    ?>
<html lang="en">
<head>
</head>
<body>
      <div id="studentcsvAdd" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="content">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">เพิ่มนักศึกษาด้วยการนำเข้าไฟล์ CSV</h4>
                                    <p class="category">เพิ่มข้อมูลนักศึกษาด้วยการนำเข้าไฟล์ CSV</p>
                                </div>
                                        <div class="col-lg-12">
                                          <form action='<?php echo $_SERVER["PHP_SELF"];?>' method='post' enctype="multipart/form-data">
                                              <br>
                                              <div class="custom-file">
                                              <input type="file" name='sel_file' class="custom-file-input" id="customFile">
                                              <label class="custom-file-label" for="customFile"></label>
                                              </div>
                                              <button type="submit"  id="submit" name="submit"
                                              class="btn btn-success btn-round has-feedback">ยืนยันข้อมูล</button>
                                              <button class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิก</button>
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
