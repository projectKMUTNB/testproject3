<?
@session_start();
require_once('includestaff/connect.php');
if(!isset($_SESSION['staff_id']))
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
             echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=addstudentbystaff.php\">";
         }
         else
         {
           echo "<script>alert(\"ไม่สามารถบันทึกข้อมูลได้\")</script>";
           echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=addstudentbystaff.php\">";
         }

    }
    ?>
    <script type="text/javascript">
    $(function(){

        var obj_check=$(".css-require");
        $("#form").on("submit",function(){
            obj_check.each(function(i,k){
                var status_check=0;
                if(obj_check.eq(i).find(":radio").length>0 || obj_check.eq(i).find(":checkbox").length>0){
                    status_check=(obj_check.eq(i).find(":checked").length==0)?0:1;
                }else{
                    status_check=($.trim(obj_check.eq(i).val())=="")?0:1;
                }
                formCheckStatus($(this),status_check);
            });
            if($(this).find(".has-error").length>0){
                 return false;
            }
        });

        obj_check.on("change",function(){
            var status_check=0;
            if($(this).find(":radio").length>0 || $(this).find(":checkbox").length>0){
                status_check=($(this).find(":checked").length==0)?0:1;
            }else{
                status_check=($.trim($(this).val())=="")?0:1;
            }
            formCheckStatus($(this),status_check);
        });

        var formCheckStatus = function(obj,status){
            if(status==1){
                obj.parent(".form-group").removeClass("has-error").addClass("has-success");
                obj.next(".glyphicon").removeClass("glyphicon-warning-sign").addClass("glyphicon-ok");
            }else{
                obj.parent(".form-group").removeClass("has-success").addClass("has-error");
                obj.next(".glyphicon").removeClass("glyphicon-ok").addClass("glyphicon-warning-sign");
            }
        }
    });

   </script>
<html lang="en">
<head>
</head>
<body>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">เพิ่มรายชื่อนักศึกษา</h4>
  </div>
  <div class="modal-body">
        <!-- /.box-header -->
        <!-- form start -->
        <form action='<?php echo $_SERVER["PHP_SELF"];?>' method='post' enctype="multipart/form-data">
          <div class="box-body">
            <div class="custom-file label-floating has-feedback">
            <input type="file" name='sel_file' class="custom-file-input css-require" id="customFile">
            <label class="custom-file-label" for="customFile"></label>
            </div>
          </div>
          <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" id="submit" name="submit" class="btn btn-success btn-round has-feedback">ยืนยันข้อมูล</button>
              <button class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิก</button>
            </div>
        </form>
      </div>

<? mysqli_close($conn); ?>
</body>
</html>
