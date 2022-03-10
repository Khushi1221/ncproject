<?php

	session_start();
	
	require 'vendor/autoload.php';
	$con = new MongoDB\Client('mongodb+srv://khushi:khushi123@cluster-nc.nm1fy.mongodb.net/ncdb?retryWrites=true&w=majority');
	$db = $con->ncdb;
	$admincoll = $db->admin;
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$e = ($_POST['email']);
	$_SESSION['em'] = $e;
	$phone = $_POST['phone'];
	$uname = $_POST['uname'];
	
	$doccnt = $admincoll->count();
	if($doccnt == 0)
	{
		$idcnt = 1;
	}
	else
	{
		$idcnt = $doccnt + 1;
	}
	
	$res = $admincoll->insertOne(
	["id" => $idcnt, "fname" => "$fname", "lname" => "$lname", "email" => "$email", "phone" => "$phone", "uname" => "$uname"]
	);
	
	 header("Location:admin.php");
?>