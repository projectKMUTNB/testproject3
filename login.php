<?php
/*  require_once "config.php";
		unset($_SESSION['access_token']);
    $gClient->revokeToken();
	 /*if (isset($_SESSION['access_token']) {
			header('Location: teacherindex.php');
			exit();
		}

	$loginURL = $gClient->createAuthUrl();*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author">
	<title>เข้าสู่ระบบ &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
	<link rel="stylesheet" type="text/css" href="login/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login/css/my-login.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<?php
@session_start();
include('include/connect.php');
?>

<body class="my-login-page">
	<section class="h-50">
		<div class="container h-50">
			<div class="row justify-content-md-center h-50">
				<div class="card-wrapper">
					<div class="brand">
						<img src="login/img/FITM.png">
					</div>

					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">เข้าสู่ระบบ</h4>
							<form action="loginQuery.php" method="post" role="form">

								<div class="form-group">
									<label for="username">ชื่อสมาชิก</label>

									<input id="username" type="text" class="form-control" name="username" value="" placeholder="กรุณากรอกชื่อสมาชิก">
								</div>

								<div class="form-group">
									<label for="password">รหัสผ่าน
									</label>
									<input id="password" type="password" class="form-control" name="password" placeholder="กรุณากรอกรหัสผ่าน" required data-eye>
								</div>
								<div class="form-group">
									<label>
										<a href="forgot.php" class="float-right">คุณลืมรหัสผ่านใช่ไหม?</a>
										</label>
								</div>
								<div class="form-group">
									<button type="submit" name="login" class="btn btn-primary btn-block">
										เข้าสู่ระบบ
									</button>
								</div>
								<div class="form-group no-margin">
										<button class="btn btn-danger btn-block" type="button" onclick="window.location = '<?php echo $loginURL ?>';" />
										<i class="fa fa-google-plus-circle"></i> เข้าสู่ระบบอาจารย์ผ่าน Google+</button>
								</div>
								<div class="margin-top20 text-center">
									คุณยังไม่ได้เป็นสมาชิกใช่ไหม ? <a href="register.php">สมัครสมาชิกพี่เลี้ยง</a>
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

	<script src="login/js/jquery.min.js"></script>
	<script src="login/bootstrap/js/bootstrap.min.js"></script>
	<script src="login/js/my-login.js"></script>
</body>
</html>
