/* Admin Login Script */

<?php
	require 'vendor/autoload.php';
	
	if(isset($_POST['email']) && isset($_POST['password']))
	{
		$email = ($_POST['email']);
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
		$con = new MongoDB\Client;
		if($con)
		{
			// Select Database
			$db = $con->ncdb;
			// Select Collection
			$collection = $db->admin;
			$qry = array("email" => $email, "password" => $pass_hash);
			$result = $collection->findOne($qry);

			if(!empty($result))
			{
				// include "home.php";
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