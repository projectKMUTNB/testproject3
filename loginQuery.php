<html>
<head>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
@session_start();
include('include/connect.php');

	$username = $_POST['username'];
	$password = md5($_POST['password']);
  $password1 = $_POST['password'];

	$query = "select * from student where student_code = '$username' and student_password = '$password'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rs = mysqli_fetch_row($result);

	if($rs){
    $_SESSION['student_code'] = $rs[0];
    $_SESSION['student_name'] = $rs[1];
		$_SESSION['student_surname'] = $rs[2];
    $_SESSION['status_id'] = $rs[4];
		$_SESSION['statusp_id'] = $rs[7];
	}else{

		  }
	if($rs[4]==4&&$rs[7]==1&&$rs[6]==$password){
		?> <script>swal("ถูกต้อง", "เข้าสู่ระบบข้อมูลนักศึกษา", "success");</script> <?
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=studentindex.php\">";
	}

		else {

		}

$query4 = "select * from student where student_code = '$username' and student_code = '$password1'";
$result4 = mysqli_query($conn,$query4) or die(mysql_error());
$rs4 = mysqli_fetch_row($result4);

	if($rs4){
	  $_SESSION['student_code'] = $rs4[0];
	  $_SESSION['student_name'] = $rs4[1];
		$_SESSION['student_surname'] = $rs4[2];
	  $_SESSION['status_id'] = $rs4[4];
		$_SESSION['statusp_id'] = $rs4[7];
	}else{

  }
  if($rs4[4]==4&&$rs4[7]==2){
	?>	<script>swal("คำเตือน", "ท่านจำเป็นจะต้อง Reset Password ก่อนเข้าใช้งาน", "warning");</script> <?
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=resetpasswordstudent.php\">";
     }
		else {

		}

	$query1 = "select * from admintable where username = '$username' and password = '$password'";
  $result1 = mysqli_query($conn,$query1) or die(mysql_error());
  $rs1 = mysqli_fetch_row($result1);
  if($rs1){
    $_SESSION['admin_id'] = $rs1[0];
    $_SESSION['username'] = $rs1[1];
    $_SESSION['status_id'] = $rs1[3];
	}else{

		  }
	if($rs1[3]==1){
    ?>	<script>swal("ถูกต้อง", "เข้าสู่ระบบแอดมินของระบบติดตามและประเมินผล", "success");</script> <?
	  echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=adminmanage.php\">";
	}
	if($rs1[3]==2){
    ?>	<script>swal("ถูกต้อง", "เข้าสู่ระบบแอดมินรองของระบบติดตามและประเมินผล", "success");</script> <?
	  echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=secondaryadminmanage.php\">";
	}

	$query2 = "select * from teacher where teacher_code = '$username' and teacher_password = '$password' ";
  $result2 = mysqli_query($conn,$query2) or die(mysql_error());
  $rs2 = mysqli_fetch_row($result2);

  if($rs2){
    $_SESSION['teacher_code'] = $rs2[0];
    $_SESSION['teacher_name'] = $rs2[1];
		$_SESSION['teacher_surname'] = $rs2[2];
    $_SESSION['status_id'] = $rs2[5];
		$_SESSION['statusp_id'] = $rs2[8];
	}else{

		  }
	if($rs2[5]==3&&$rs2[8]==1&&$rs2[7]==$password){
    ?>	<script>swal("ถูกต้อง", "เข้าสู่ระบบอาจารย์ติดตามและประเมินผล", "success");</script> <?
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=teacherindex.php\">";
		}
		elseif($rs2[5]==3&&$rs2[8]!=1){
 			  ?>	<script>swal("คำเตือน", "ท่านจำเป็นจะต้อง Reset Password ก่อนเข้าใช้งาน", "warning");</script> <?
 			echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=resetpasswordteacher.php\">";
 			}
	$query3 = "select * from teacher where teacher_code = '$username' and teacher_code = '$password1' ";
	$result3 = mysqli_query($conn,$query3) or die(mysql_error());
	$rs3 = mysqli_fetch_row($result3);

	if($rs3){
	  $_SESSION['teacher_code'] = $rs3[0];
	  $_SESSION['teacher_name'] = $rs3[1];
	  $_SESSION['status_id'] = $rs3[5];
		$_SESSION['statusp_id'] = $rs3[8];
		}else{

			  }
	 if($rs3[5]==3&&$rs3[8]!=1){
			?>	<script>swal("คำเตือน", "ท่านจำเป็นจะต้อง Reset Password ก่อนเข้าใช้งาน", "warning");</script> <?
			echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=resetpasswordteacher.php\">";
			}
			elseif($rs3[5]==3&&$rs3[8]==1){
      ?>  <script>swal("ผิดพลาด", "โปรดตรวจสอบชื่อสมาชิกหรือรหัสผ่านให้ถูกต้อง", "error");</script> <?
        echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=login.php\">";
			}

			$query5 = "SELECT * FROM `mentor` WHERE email_mentor = '$username' AND mentor_password = '$password'";
		  $result5 = mysqli_query($conn,$query5) or die(mysql_error());
		  $rs5 = mysqli_fetch_row($result5);

		  if($rs5){
		    $_SESSION['mentor_code'] = $rs5[0];
		    $_SESSION['mentor_name'] = $rs5[1];
        $_SESSION['mentor_surname'] = $rs5[2];
				$_SESSION['email_mentor'] = $rs5[5];
				$_SESSION['company_code'] = $rs5[4];
		    $_SESSION['status_id'] = $rs5[7];
			}else{

				  }
			if($rs5[7]==5&&$rs5[10]==1){
        ?>	<script>swal("ถูกต้อง", "เข้าสู่ระบบพี่เลี้ยงเพื่อประเมินนักศึกษาฝึกงาน", "success");</script> <?
				echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=mentorindex.php\">";
				}
        if($rs5[7]==5&&$rs5[10]==2){
          ?>	<script>swal("คำเตือน", "รอการอนุมัติข้อมูลจากผู้ดูแลในการยืนข้อมูล", "warning");</script> <?
          echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=login.php\">";
  				}

        $query6 = "SELECT * FROM staff WHERE staff_username = '$username' AND staff_password = '$password'";
        $result6 = mysqli_query($conn,$query6) or die(mysql_error());
        $rs6 = mysqli_fetch_row($result6);

        if($rs6){
          $_SESSION['staff_id'] = $rs6[0];
          $_SESSION['staff_name'] = $rs6[1];
          $_SESSION['staff_surname'] = $rs6[2];
          $_SESSION['staff_email'] = $rs6[5];
          $_SESSION['status_id'] = $rs6[6];
        }else{

            }
        if($rs6[6]==6){
            ?>	<script>swal("ถูกต้อง", "เข้าสู่ระบบเจ้าหน้าที่", "success");</script> <?
          echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=staffindex.php\">";
          }

			if(!$rs[4]&&!$rs1[3]&&!$rs2[5]&&!$rs3[5]&&!$rs4[7]&&!$rs5[7]&&!$rs6[6]){ ?>
				<script>swal("ผิดพลาด", "โปรดตรวจสอบชื่อสมาชิกหรือรหัสผ่านให้ถูกต้อง", "error");</script> <?
        echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=login.php\">";
			}
?>
</body>
</html>
