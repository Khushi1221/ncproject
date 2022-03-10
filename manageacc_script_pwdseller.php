<?php
	session_start();

	require 'vendor/autoload.php';
	$con = new MongoDB\Client('mongodb+srv://khushi:khushi123@cluster-nc.nm1fy.mongodb.net/ncdb?retryWrites=true&w=majority');
	$db = $con->ncdb;
	$sellercoll = $db->seller;
	
	/* CHANGE PASSWORD */
	$oldpwd = $_POST['oldpassword'];
	$encoldpwd = md5($oldpwd);
	$newpwd = $_POST['newpassword'];
	$retypepwd = $_POST['retypepassword'];
	$email = $_SESSION['em'];
	if(strcmp($newpwd,$retypepwd)==0)
	{
		$encnewpwd = md5($newpwd);
		$cpwdqry = $sellercoll->updateOne(['email' => $email, 'password' => $encoldpwd], ['$set' => ['password' => $encnewpwd]]);
	}
	else
	{
		echo "Re-typed password does not match with the New password.";
	}
?>