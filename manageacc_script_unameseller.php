<?php
	session_start();

	require 'vendor/autoload.php';
	$con = new MongoDB\Client('mongodb+srv://khushi:khushi123@cluster-nc.nm1fy.mongodb.net/ncdb?retryWrites=true&w=majority');
	$db = $con->ncdb;
	$sellercoll = $db->seller;
	
	/* CHANGE USERNAME */
	$olduname = $_POST['oldusername'];
	$newuname = $_POST['newusername'];
	$email = $_SESSION['em'];
	$cunameqry = $sellercoll->updateOne(['email' => $email, 'uname' => $olduname], ['$set' => ['uname' => $newuname]]);
	session_unset();
	session_destroy();
	header("Location:seller_login.php");
?>