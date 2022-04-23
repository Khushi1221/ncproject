<?php
	session_start();

	require 'vendor/autoload.php';
	$con = new MongoDB\Client('mongodb+srv://khushi:khushi123@cluster-nc.nm1fy.mongodb.net/ncdb?retryWrites=true&w=majority');
	$db = $con->ncdb;
	$sellercoll = $db->seller;
	
	/* CHANGE PASSWORD */
	
	$newpwd = $_SESSION['password2'];
	$encnewpwd = md5($newpwd);
	$email = $_SESSION['EMAIL'];
	
		$encnewpwd = md5($newpwd);
		$cpwdqry = $sellercoll->updateOne(['email' => $email], ['$set' => ['password' => $encnewpwd]]);
		session_unset();
		session_destroy();
		header("Location:seller_login.php");
?>