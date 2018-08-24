<?
   $serverName = "localhost";
   $userName = "root";
   $userPassword = "12345678";
   $dbName = "mayz_messs";
	 $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " . mysqli_connect_error();
	}
  mysqli_set_charset($conn,"utf8");
?>
