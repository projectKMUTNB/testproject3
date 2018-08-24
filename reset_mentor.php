<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<title>Reset รหัสผ่าน &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
	<link rel="stylesheet" type="text/css" href="login/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login/css/my-login.css">
</head>
<?php
	@session_start();
	require_once('class.phpmailer.php');
	include('include/connect.php');


	if(isset($_POST['submit']) && $_POST['h_refer']!="" && $_POST['mentorpassword']!="" ){
	//	echo $_POST['submit_resetpassword'];
	//	echo $_POST['h_refer'];
	//	echo $_POST['new_password'];
$con=mysqli_connect("localhost","mayz","sB0k55NO","mayz_messs");
$q="SELECT * FROM mentor WHERE  reset_check='".addslashes(trim($_POST['h_refer']))."'";
$qr=mysqli_query($con,$q);


if(mysqli_num_rows($qr)>0){

	echo"<div class='container'>";
	echo"<div class='alert alert-success  alert-dismissible' role='success'>";
	echo"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
	echo"<strong>Pass</strong> : ข้อมูลถูกต้องส่ง Username และ Password เข้า Email แล้วโปรดตรวจสอบใน Email  ";
	echo"</div>";
	echo"</div>";
	echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=login.php\">";



				$rs=@mysqli_fetch_array($qr);
				$gen_password=md5(stripslashes($_POST['mentorpassword']));
				$reset_refer=""; // ล่างค่าเป็นว่าง
				$pre=$rs['mentor_tel'];
			//	echo "$gen_password";

				$qre=" UPDATE mentor SET
				reset_check='$reset_refer',mentor_password='$gen_password' WHERE mentor_tel='$pre'";
					$qre=mysqli_query($con,$qre);
			mysqli_error($con);
				$htmlContact='<p>อีเมลล์แจ้งเปลี่ยนรหัสใหม่  </p>
				<p>คุณสามารถใช้ข้อมูลต่อไปนี้ในการล็อกอินใช้งานได้  ดังนี้</p>
				<br />
				ชื่อผู้ใช้ของคุณคือ ::'.$rs['email_mentor'].'<br />
				รหัสผ่านของคุณคือ ::'.$_POST['mentorpassword'].'<br />
				<br />';

				$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
		//  $mail->IsSMTP(); // telling the class to use SMTP
				$mail->IsMail(); // telling the class to use Mail() function


				try{
						$mail->CharSet = "utf-8";
						$mail->AddAddress($rs['email_mentor'], 'ชื่อผู้รับ'); // ส่งถึง
						$mail->SetFrom('mayz@mayziti20.com', 'mayziti20.com'); // ส่งจาก
						$mail->AddReplyTo('mayz@mayziti20.com', 'mayziti20.com'); // ตอบกลับมาที่อีเมลล์
				//  $mail->AddBCC('yorwebsitemail@gmail.com', 'Example.com');
						$mail->Subject ="ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา";  //หัวเรื่องอีเมลล์
						$mail->MsgHTML($htmlContact);
						$mail->Send();
				}catch (phpmailerException $e){
					echo"<div class='container'>";
					echo"<div class='alert alert-success  alert-dismissible' role='success'>";
					echo"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
						echo"<strong>Pass</strong> : เกิดข้อผิดพลาดในการส่งอีเมลล์ กรุณาลองใหม่อีกครั้ง : ";
					echo"</div>";
					echo"</div>";
					echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=login.php\">";
				}catch (Exception $e) {
					echo"<div class='container'>";
					echo"<div class='alert alert-success  alert-dismissible' role='success'>";
					echo"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
					echo"<strong>Pass</strong> : เกิดข้อผิดพลาดในการส่งอีเมลล์ กรุณาลองใหม่อีกครั้ง : ";
					echo"</div>";
					echo"</div>";
					echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=login.php\">";
				}

}else{
	echo"<div class='container'>";
	echo"<div class='alert alert-success  alert-dismissible' role='success'>";
	echo"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
	echo"<strong>Pass</strong> : ไม่พบข้อมูลในระบบโปรดตรวจสอบข้อมูลใน E-mail อีกครั้ง  ";
	echo"</div>";
	echo"</div>";
	echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=login.php\">";
}



}
else {

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
							<h4 class="card-title">Reset Password</h4>
							<form action="reset_mentor.php" method="post" role="form"  name="formresetmentor" onSubmit="JavaScript:return fncSubmit('formresetmentor');" >

								<div class="form-group">
									<label for="password">รหัสผ่านที่ต้องการใช้ในการล็อคอิน</label>
									<input id="password" type="password" class="form-control" name="mentorpassword" value="" placeholder="กรุณากรอกรหัสผ่าน" required data-eye>
								</div>
								<div class="form-group">
									<label for="passwordag">ยืนยันรหัสผ่านที่ต้องการใช้ในการล็อคอิน</label>
									<input id="passwordad" type="password" class="form-control" name="mentorpasswordag" value="" placeholder="กรุณายืนยันรหัสผ่าน" required data-eye>
								</div>

								<div class="form-group no-margin">
									<button type="submit" name="submit" class="btn btn-primary btn-block">
										  <input name="h_refer" type="hidden" id="h_refer" value="<?=trim($_GET['refer'])?>">
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
<script src="login/js/jquery.min.js"></script>
<script src="login/bootstrap/js/bootstrap.min.js"></script>
<script src="login/js/my-login.js"></script>
<script type="text/javascript">
function fncSubmit(frm)
	{
		if(document.forms[frm].mentorpassword.value != document.forms[frm].mentorpasswordag.value){
	    alert('กรุณายืนยันรหัสผ่านใหม่ให้ตรงกัน');
	    document.forms[frm].mentorpassword.focus();
	    return false;
	  }

	  return true;
	}

		</script>
