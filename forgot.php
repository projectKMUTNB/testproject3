<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<title>แก้ไขการลืมรหัสผ่าน &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
	<link rel="stylesheet" type="text/css" href="login/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login/css/my-login.css">
</head>
<?php
require_once('class.phpmailer.php');
	@session_start();
	include('include/connect.php');
	if(isset($_POST['submit'])&& $_POST['username']!=""&& $_POST['email']!=""){
		//$msg_text="เข้าแล้ว";
		//echo $msg_text;

	$query = "select * from admintable where username = '".trim($_POST['username'])."' and email = '".trim($_POST['email'])."'";
  $result = mysqli_query($conn,$query) or die(mysqli_error());
  $objResult = mysqli_fetch_array($result);


	$query1 = "select * from student where student_code = '".trim($_POST['username'])."' and email_student = '".trim($_POST['email'])."'";
  $result1 = mysqli_query($conn,$query1) or die(mysqli_error());
  $objResult1 = mysqli_fetch_array($result1);


	$query2 = "select * from teacher where teacher_code = '".trim($_POST['username'])."' and email_teacher = '".trim($_POST['email'])."'";
	$result2 = mysqli_query($conn,$query2) or die(mysql_error());
	$objResult2 = mysqli_fetch_array($result2);

		$query4 = "select * from mentor where mentor_tel = '".trim($_POST['username'])."' and email_mentor = '".trim($_POST['email'])."'";
		$result4 = mysqli_query($conn,$query4) or die(mysql_error());
		$objResult4 = mysqli_fetch_array($result4);

			$query3 = "select * from staff where staff_username = '".trim($_POST['username'])."' and staff_email = '".trim($_POST['email'])."'";
			$result3 = mysqli_query($conn,$query3) or die(mysql_error());
			$objResult3 = mysqli_fetch_array($result3);

	if(mysqli_num_rows($result)>0){
		//$msg_text="เข้า1";
		echo $msg_text;

		echo"<div class='container'>";
		echo"<div class='alert alert-success  alert-dismissible' role='success'>";
		echo"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
		echo"<strong>Pass</strong> : ข้อมูลถูกต้องส่ง Username และ Link Reset Password เข้า Email แล้วโปรดตรวจสอบใน Email : ".$objResult["email"];
		echo"</div>";
		echo"</div>";
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=login.php\">";
		$con=mysqli_connect("localhost","mayz","sB0k55NO","mayz_messs");

							 //$rs=mysql_fetch_array($objResult1);
										$reset_refer=md5(time());
										$id =  $objResult['admin_id'];
									//	echo 	$id;
									//	echo 	$reset_refer;


										$qq="UPDATE  admintable SET
											reset_check='$reset_refer'
											WHERE admin_id=$id";
											 $qq=mysqli_query($con,$qq);

																				$htmlContact='<p>อีเมลล์แจ้งขอรับรหัสผ่านใหม่ กรณีลืมรหัสผ่าน และชื่อผู้ใช้ </p>
																				<p>คุณได้ทำการแจ้งลืมรหัสผ่าน และขอรับรห้สผ่านใหม่ ดังนี้</p>
																				<br />
																				ไอดีผู้ใช้ของคุณคือ :'.$objResult['username'].'<br />
																				รีเซ็ตรหัสผ่านใหม่ <a href="https://mayziti20.com/project2/reset_admin.php?refer='.$reset_refer.'"> https://mayziti20.com/project2/reset_admin.php?refer='.$reset_refer.'</a><br />
																				<br />';

																				$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
																		//  $mail->IsSMTP(); // telling the class to use SMTP
																				$mail->IsMail(); // telling the class to use Mail() function


																				try{
																						$mail->CharSet = "utf-8";
																						$mail->AddAddress($objResult['email'], 'ชื่อผู้รับ'); // ส่งถึง
																						$mail->SetFrom('mayz@mayziti20.com', 'mayziti20.com'); // ส่งจาก
																						$mail->AddReplyTo('mayz@mayziti20.com', 'mayziti20.com'); // ตอบกลับมาที่อีเมลล์
																						$mail->AddBCC('mayz@mayziti20.com', 'mayziti20.com');
																						$mail->Subject ="Reset Password ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา";  //หัวเรื่องอีเมลล์
																						$mail->MsgHTML($htmlContact);
																						$mail->Send();



																				}catch (phpmailerException $e){
																						$msg_text="เกิดข้อผิดพลาดในการส่งอีเมลล์ กรุณาลองใหม่อีกครั้ง";
																						echo $msg_text;
																				}catch (Exception $e) {
																						$msg_text="เกิดข้อผิดพลาดในการส่งอีเมลล์ กรุณาลองใหม่อีกครั้ง";
																						echo $msg_text;
																				}



	}

elseif (mysqli_num_rows($result1)>0) {
	echo"<div class='container'>";
	echo"<div class='alert alert-success  alert-dismissible' role='success'>";
	echo"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
	echo"<strong>Pass</strong> : ข้อมูลถูกต้องส่ง Username และ Link Reset Password เข้า Email แล้วโปรดตรวจสอบใน Email : ".$objResult1['email_student'];
	echo"</div>";
	echo"</div>";
	echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=login.php\">";
	$con=mysqli_connect("localhost","mayz","sB0k55NO","mayz_messs");
	//$msg_text="เข้า2";
	//echo $msg_text;
	           //$rs=mysql_fetch_array($objResult1);
									$reset_refer=md5(time());
									$id =  $objResult1['student_code'];
								//	echo 	$id;
								//	echo 	$reset_refer;


									$qq="UPDATE  student SET
										reset_check='$reset_refer'
										WHERE student_code=$id";
										 $qq=mysqli_query($con,$qq);

									                    $htmlContact='<p>อีเมลล์แจ้งขอรับรหัสผ่านใหม่ กรณีลืมรหัสผ่าน และชื่อผู้ใช้ </p>
									                    <p>คุณได้ทำการแจ้งลืมรหัสผ่าน และขอรับรห้สผ่านใหม่ ดังนี้</p>
									                    <br />
									                    ชื่อผู้ใช้ของคุณคือ :'.$objResult1['student_name'].'&nbsp;'.$objResult1['student_surname'].'<br />
									                    ไอดีผู้ใช้ของคุณคือ :'.$objResult1['student_code'].'<br />
									                    รีเซ็ตรหัสผ่านใหม่ <a href="https://mayziti20.com/project2/reset_std.php?refer='.$reset_refer.'"> https://mayziti20.com/project2/reset_std.php?refer='.$reset_refer.'</a><br />
									                    <br />';

									                    $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
									                //  $mail->IsSMTP(); // telling the class to use SMTP
									                    $mail->IsMail(); // telling the class to use Mail() function


									                    try{
									                        $mail->CharSet = "utf-8";
									                        $mail->AddAddress($objResult1['email_student'], 'ชื่อผู้รับ'); // ส่งถึง
									                        $mail->SetFrom('mayz@mayziti20.com', 'mayziti20.com'); // ส่งจาก
									                        $mail->AddReplyTo('mayz@mayziti20.com', 'mayziti20.com'); // ตอบกลับมาที่อีเมลล์
									                        $mail->AddBCC('mayz@mayziti20.com', 'mayziti20.com');
									                        $mail->Subject ="Reset Password ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา";  //หัวเรื่องอีเมลล์
									                        $mail->MsgHTML($htmlContact);
									                        $mail->Send();







									                    }catch (phpmailerException $e){
									                        $msg_text="เกิดข้อผิดพลาดในการส่งอีเมลล์ กรุณาลองใหม่อีกครั้ง";
									                        echo $msg_text;
									                    }catch (Exception $e) {
									                        $msg_text="เกิดข้อผิดพลาดในการส่งอีเมลล์ กรุณาลองใหม่อีกครั้ง";
									                        echo $msg_text;
									                    }




									            }


elseif (mysqli_num_rows($result2)>0) {
	echo"<div class='container'>";
	echo"<div class='alert alert-success  alert-dismissible' role='success'>";
	echo"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
	echo"<strong>Pass</strong> : ข้อมูลถูกต้องส่ง Username และ Link Reset Password เข้า Email แล้วโปรดตรวจสอบใน Email : ".$objResult2['email_teacher'];
	echo"</div>";
	echo"</div>";
	echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=login.php\">";
	$con=mysqli_connect("localhost","mayz","sB0k55NO","mayz_messs");
	/*$msg_text="เข้า3";
	echo $msg_text;**/
	           //$rs=mysql_fetch_array($objResult1);
									$reset_refer=md5(time());
									$id =  $objResult2['teacher_code'];
								//	echo 	$id;
									//echo 	$reset_refer;


									$qq="UPDATE  teacher SET
										reset_check='$reset_refer'
										WHERE teacher_code=$id";
										 $qq=mysqli_query($con,$qq);

									                    $htmlContact='<p>อีเมลล์แจ้งขอรับรหัสผ่านใหม่ กรณีลืมรหัสผ่าน และชื่อผู้ใช้ </p>
									                    <p>คุณได้ทำการแจ้งลืมรหัสผ่าน และขอรับรห้สผ่านใหม่ ดังนี้</p>
									                    <br />
									                    ชื่อผู้ใช้ของคุณคือ :'.$objResult2['teacher_name'].'&nbsp;'.$objResult2['teacher_surname'].'<br />
									                    ไอดีผู้ใช้ของคุณคือ :'.$objResult2['teacher_code'].'<br />
									                    รีเซ็ตรหัสผ่านใหม่ <a href="https://mayziti20.com/project2/reset_teah.php?refer='.$reset_refer.'"> https://mayziti20.com/project2/reset_teah.php?refer='.$reset_refer.'</a><br />
									                    <br />';

									                    $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
									                //  $mail->IsSMTP(); // telling the class to use SMTP
									                    $mail->IsMail(); // telling the class to use Mail() function


									                    try{
									                        $mail->CharSet = "utf-8";
									                        $mail->AddAddress($objResult2['email_teacher'], 'ชื่อผู้รับ'); // ส่งถึง
									                        $mail->SetFrom('mayz@mayziti20.com', 'mayziti20.com'); // ส่งจาก
									                        $mail->AddReplyTo('mayz@mayziti20.com', 'mayziti20.com'); // ตอบกลับมาที่อีเมลล์
									                        $mail->AddBCC('mayz@mayziti20.com', 'mayziti20.com');
									                        $mail->Subject ="Reset Password ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา";  //หัวเรื่องอีเมลล์
									                        $mail->MsgHTML($htmlContact);
									                        $mail->Send();




									                    }catch (phpmailerException $e){
									                        $msg_text="เกิดข้อผิดพลาดในการส่งอีเมลล์ กรุณาลองใหม่อีกครั้ง";
									                        echo $msg_text;
									                    }catch (Exception $e) {
									                        $msg_text="เกิดข้อผิดพลาดในการส่งอีเมลล์ กรุณาลองใหม่อีกครั้ง";
									                        echo $msg_text;
									                    }




}
elseif (mysqli_num_rows($result3)>0) {
	echo"<div class='container'>";
	echo"<div class='alert alert-success  alert-dismissible' role='success'>";
	echo"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
	echo"<strong>Pass</strong> : ข้อมูลถูกต้องส่ง Username และ Link Reset Password เข้า Email แล้วโปรดตรวจสอบใน Email : ".$objResult3['staff_email'];
	echo"</div>";
	echo"</div>";
	echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=login.php\">";
	$con=mysqli_connect("localhost","mayz","sB0k55NO","mayz_messs");
	/*$msg_text="เข้า3";
	echo $msg_text;**/
	           //$rs=mysql_fetch_array($objResult1);
									$reset_refer=md5(time());
									$id =  $objResult3['staff_id'];
								//	echo 	$id;
									//echo 	$reset_refer;


									$qq="UPDATE  staff SET
										reset_check='$reset_refer'
										WHERE staff_id=$id";
										 $qq=mysqli_query($con,$qq);

									                    $htmlContact='<p>อีเมลล์แจ้งขอรับรหัสผ่านใหม่ กรณีลืมรหัสผ่าน และชื่อผู้ใช้ </p>
									                    <p>คุณได้ทำการแจ้งลืมรหัสผ่าน และขอรับรห้สผ่านใหม่ ดังนี้</p>
									                    <br />
									                    ชื่อผู้ใช้ของคุณคือ :'.$objResult3['staff_name'].'&nbsp;'.$objResult3['staff_surname'].'<br />
									                    ไอดีผู้ใช้ของคุณคือ :'.$objResult3['staff_username'].'<br />
									                    รีเซ็ตรหัสผ่านใหม่ <a href="https://mayziti20.com/project2/reset_staff.php?refer='.$reset_refer.'"> https://mayziti20.com/project2/reset_staff.php?refer='.$reset_refer.'</a><br />
									                    <br />';

									                    $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
									                //  $mail->IsSMTP(); // telling the class to use SMTP
									                    $mail->IsMail(); // telling the class to use Mail() function


									                    try{
									                        $mail->CharSet = "utf-8";
									                        $mail->AddAddress($objResult3['staff_email'], 'ชื่อผู้รับ'); // ส่งถึง
									                        $mail->SetFrom('mayz@mayziti20.com', 'mayziti20.com'); // ส่งจาก
									                        $mail->AddReplyTo('mayz@mayziti20.com', 'mayziti20.com'); // ตอบกลับมาที่อีเมลล์
									                        $mail->AddBCC('mayz@mayziti20.com', 'mayziti20.com');
									                        $mail->Subject ="Reset Password ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา";  //หัวเรื่องอีเมลล์
									                        $mail->MsgHTML($htmlContact);
									                        $mail->Send();




									                    }catch (phpmailerException $e){
									                        $msg_text="เกิดข้อผิดพลาดในการส่งอีเมลล์ กรุณาลองใหม่อีกครั้ง";
									                        echo $msg_text;
									                    }catch (Exception $e) {
									                        $msg_text="เกิดข้อผิดพลาดในการส่งอีเมลล์ กรุณาลองใหม่อีกครั้ง";
									                        echo $msg_text;
									                    }




}
elseif (mysqli_num_rows($result4)>0) {
	echo"<div class='container'>";
	echo"<div class='alert alert-success  alert-dismissible' role='success'>";
	echo"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
	echo"<strong>Pass</strong> : ข้อมูลถูกต้องส่ง Username และ Link Reset Password เข้า Email แล้วโปรดตรวจสอบใน Email : ".$objResult4['email_mentor'];
	echo"</div>";
	echo"</div>";
	echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=login.php\">";
	$con=mysqli_connect("localhost","mayz","sB0k55NO","mayz_messs");
	/*$msg_text="เข้า3";
	echo $msg_text;**/
	           //$rs=mysql_fetch_array($objResult1);
									$reset_refer=md5(time());
									$id =  $objResult4['mentor_tel'];
								//	echo 	$id;
									//echo 	$reset_refer;


									$qq="UPDATE  mentor SET
										reset_check='$reset_refer'
										WHERE mentor_tel=$id";
										 $qq=mysqli_query($con,$qq);

									                    $htmlContact='<p>อีเมลล์แจ้งขอรับรหัสผ่านใหม่ กรณีลืมรหัสผ่าน และชื่อผู้ใช้ </p>
									                    <p>คุณได้ทำการแจ้งลืมรหัสผ่าน และขอรับรห้สผ่านใหม่ ดังนี้</p>
									                    <br />
									                    ชื่อผู้ใช้ของคุณคือ :'.$objResult4['mentor_name'].'&nbsp;'.$objResult4['mentor_surname'].'<br />
									                    ไอดีผู้ใช้ของคุณคือ :'.$objResult4['email_mentor'].'<br />
									                    รีเซ็ตรหัสผ่านใหม่ <a href="https://mayziti20.com/project2/reset_mentor.php?refer='.$reset_refer.'"> https://mayziti20.com/project2/reset_mentor.php?refer='.$reset_refer.'</a><br />
									                    <br />';

									                    $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
									                //  $mail->IsSMTP(); // telling the class to use SMTP
									                    $mail->IsMail(); // telling the class to use Mail() function


									                    try{
									                        $mail->CharSet = "utf-8";
									                        $mail->AddAddress($objResult4['email_mentor'], 'ชื่อผู้รับ'); // ส่งถึง
									                        $mail->SetFrom('mayz@mayziti20.com', 'mayziti20.com'); // ส่งจาก
									                        $mail->AddReplyTo('mayz@mayziti20.com', 'mayziti20.com'); // ตอบกลับมาที่อีเมลล์
									                        $mail->AddBCC('mayz@mayziti20.com', 'mayziti20.com');
									                        $mail->Subject ="Reset Password ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา";  //หัวเรื่องอีเมลล์
									                        $mail->MsgHTML($htmlContact);
									                        $mail->Send();




									                    }catch (phpmailerException $e){
									                        $msg_text="เกิดข้อผิดพลาดในการส่งอีเมลล์ กรุณาลองใหม่อีกครั้ง";
									                        echo $msg_text;
									                    }catch (Exception $e) {
									                        $msg_text="เกิดข้อผิดพลาดในการส่งอีเมลล์ กรุณาลองใหม่อีกครั้ง";
									                        echo $msg_text;
									                    }




}


else {

	echo"<div class='container'>";
	echo"<div class='alert alert-danger  alert-dismissible' role='alert'>";
	echo"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
	echo"<strong>Warning!</strong> : ชื่อ Username ไม่ตรงกับ Email ที่มีในระบบกรุณาลองใหม่";
	echo"</div>";
	echo"</div>";
}

}

?>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center align-items-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="login/img/FITM.png">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Forgot Password</h4>
							<form action="forgot.php" method="post" role="form">

								<div class="form-group">
									<label for="username">ชื่อสมาชิกที่ลืมรหัสผ่าน</label>
									<input id="username" type="text" class="form-control" name="username" value="" placeholder="กรุณากรอกชื่อสมาชิกที่ลืมรหัสผ่าน">
								</div>
								<div class="form-group">
									<label for="email">E-Mail ที่สมัคร Username</label>
									<input id="email" type="email" class="form-control" name="email" value="" placeholder="กรุณากรอก Email ให้ตรงกับชื่อสมาชิก" required autofocus>

									<div class="form-text text-muted">
										โปรดใส่ Username และ Email ที่ใช้ให้ตรงกันหากใส่ไม่ตรงกันจะไม่สามารถเข้าสู่ระบบได้
									</div>
								</div>

								<div class="form-group no-margin">
									<button type="submit" name="submit" class="btn btn-primary btn-block">
										Reset Password
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; คณะเทคโนโลยีและการจัดการอุตสาหกรรม มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือวิทยาเขตปราจีนบุรี
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
