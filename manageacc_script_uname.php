<?php
	session_start();

	require 'vendor/autoload.php';
	$con = new MongoDB\Client('mongodb+srv://khushi:khushi123@cluster-nc.nm1fy.mongodb.net/ncdb?retryWrites=true&w=majority');
	$db = $con->ncdb;
	$buyercoll = $db->buyer;
	
	/* CHANGE USERNAME */
	$olduname = $_POST['oldusername'];
	$newuname = $_POST['newusername'];
	$email = $_SESSION['em'];
	$cunameqry = $buyercoll->updateOne(['email' => $email, 'uname' => $olduname], ['$set' => ['uname' => $newuname]]);
?>