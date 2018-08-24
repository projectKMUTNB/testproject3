<?
@session_start();
require_once('include/connect.php');

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>เปลี่ยนรหัสผ่าน &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
  <link rel="stylesheet" type="text/css" href="login/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login/css/my-login.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

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
							<form action="resetpasswordQuery.php" enctype="multipart/form-data" method="post" role="form" name="formRegister" onSubmit="JavaScript:return fncSubmit('formRegister');">

								<div class="form-group">
									<label for="password">รหัสผ่านที่ต้องการใช้ในการล็อคอิน</label>
									<input id="password" type="password" class="form-control" name="mempassword" value="" placeholder="กรุณากรอกรหัสผ่าน" required data-eye>
								</div>
								<div class="form-group">
									<label for="passwordag">ยืนยันรหัสผ่านที่ต้องการใช้ในการล็อคอิน</label>
									<input id="passwordad" type="password" class="form-control" name="mempasswordag" value="" placeholder="กรุณายืนยันรหัสผ่าน" required data-eye>
								</div>

								<div class="form-group no-margin">
									<button type="submit" name="submit" class="btn btn-primary btn-block">
										Reset Password
									</button>
								</div>
                <input type="hidden" name="email" value="<?php echo $_GET['mail'];?>">
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
		if(document.forms[frm].studentpassword.value != document.forms[frm].studentpasswordag.value){
	    alert('กรุณายืนยันรหัสผ่านใหม่ให้ตรงกัน');
	    document.forms[frm].studentpassword.focus();
	    return false;
	  }
	  return true;
	}
	</script>
