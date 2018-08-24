<?php
@session_start();
 include('include/connect.php');
 ?>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="author" content="Kodinger">
 	<title>Login Google+ &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
 	<link rel="stylesheet" type="text/css" href="login/bootstrap/css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="login/css/my-login.css">
 </head>


<?php
$serverName = "localhost";
$userName = "mayz";
$userPassword = "sB0k55NO";
$dbName = "mayz_messs";
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
if (mysqli_connect_errno())
{
 echo "Database Connect Failed : " . mysqli_connect_error();
}
mysqli_set_charset($conn,"utf8");

	require_once "config.php";

	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		header('Location: login.php');
		exit();
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();
  $emails = $userData['email'];
	$query2 = "select * from teacher where email_teacher = '$emails'  ";
  $result2 = mysqli_query($conn,$query2) or die(mysql_error());
  $rs2 = mysqli_fetch_row($result2);

  if($rs2){
    $_SESSION['teacher_code'] = $rs2[0];
    $_SESSION['teacher_name'] = $rs2[1];
		$_SESSION['teacher_surname'] = $rs2[2];
    $_SESSION['status_id'] = $rs2[5];
		$_SESSION['statusp_id'] = $rs2[8];




	}else{
	unset($_SESSION['access_token']);
	$gClient->revokeToken();
	session_destroy();
	//header('Location: login.php');
  echo"<div class='container'>";
  echo"<div class='alert alert-success  alert-dismissible' role='success'>";
  echo"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
  echo"<strong>Pass</strong> : Gmail ของท่านไม่ได้รับอนุญาติให้เข้าใช้งาน  ";
  echo"</div>";
  echo"</div>";
  echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=login.php\">";
	exit();

		  }

	   if(!empty($userData)&&$userData['email']){
        $_SESSION['gplog'] = "3";
				$_SESSION['id'] = $userData['id'];
				$_SESSION['email'] = $userData['email'];
				$_SESSION['gender'] = $userData['gender'];
				$_SESSION['picture'] = $userData['picture'];
				$_SESSION['familyName'] = $userData['familyName'];
				$_SESSION['givenName'] = $userData['givenName'];
			//	header('Location: teacherindex.php');
      echo"<div class='container'>";
      echo"<div class='alert alert-success  alert-dismissible' role='success'>";
      echo"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
      echo"<strong>Pass</strong> : Login สำเร็จ ยินดีต้อนรับเข้าสู่ ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา  ";
      echo"</div>";
      echo"</div>";
      echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=teacherindex.php\">";





	}
	else{

	}
exit();
?>
