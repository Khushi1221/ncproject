<?php

	session_start();

	require 'vendor/autoload.php';
	
	if(isset($_POST['email']) && isset($_POST['password']))
	{
		$email = ($_POST['email']);
		$e = ($_POST['email']);
		$_SESSION['em'] = $e;
		$password = ($_POST['password']);
		$pass_hash = md5($password);
		if(empty($email))
		{
			die("Empty or invalid email address.");
		}
		if(empty($password))
		{
			die("Enter your password.");
		}
		$con = new MongoDB\Client('mongodb+srv://khushi:khushi123@cluster-nc.nm1fy.mongodb.net/ncdb?retryWrites=true&w=majority');
		if($con)
		{
			// Select Database
			$db = $con->ncdb;
			// Select Collection
			$collection = $db->buyer;
			$qry = array("email" => $email, "password" => $pass_hash);
			$result = $collection->findOne($qry);

			if(!empty($result))
			{
				header("Location:buyer.php");
				$_SESSION['loggedin']=true;
			}
			else
			{
				echo "Wrong combination of email and password.";
			}
		}
		else
		{
			die("MongoDB not connected!");
		}
	}

?>