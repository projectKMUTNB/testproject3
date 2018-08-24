<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("101730039432-52ctig9bs63p75l6cnrcfbd8pdri6ro5.apps.googleusercontent.com");
	$gClient->setClientSecret("OhLmBU91FoxJCXqjSXQuI2e0");
	$gClient->setApplicationName("Teacher Login ");
	$gClient->setRedirectUri("https://mayziti20.com/project2/gcallback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
