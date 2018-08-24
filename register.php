<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<title>สมัครสมาชิก &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
	<link rel="stylesheet" type="text/css" href="login/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login/css/my-login.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="login/img/FITM.png">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">สมัครสมาชิกพี่เลี้ยง</h4>
							<form method="POST" action="registerQuery.php">
								<div class="form-group">
									<label for="name">ชื่อของท่าน</label>
									<input id="name" type="text" class="form-control" name="mentor_name" required autofocus>
								</div>
								<div class="form-group">
									<label for="name">นามสกุล</label>
									<input id="name" type="text" class="form-control" name="mentor_surname" required autofocus>
								</div>
								<div class="form-group">
									<label for="email">อีเมล์</label>
									<input id="email" type="email" class="form-control" name="email_mentor" required>
								</div>
								<div class="form-group">
									<label for="password">รหัสผ่าน</label>
									<input id="password" type="password" class="form-control" name="mentor_password" required data-eye>
								</div>
								<div class="form-group">
									<label for="name">เบอร์โทรศัพท์</label>
									<input id="name" type="text" class="form-control" name="mentor_tel" required autofocus>
								</div>

								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block">
										สมัครสมาชิก
									</button>
								</div>
								<div class="margin-top20 text-center">
									หากคุณมี Username แล้ว ?<a href="login.php">กลับสู่หน้าหลัก</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy;
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
