<?php
	require 'vendor/autoload.php';
	
	$pwd = ($_POST['password']);
	if(strcmp($pwd, "1234567890") == 0)
	{
		header("Location:admin.php");
	}
	else
	{
		echo "Access Denied! Incorrect Password.";
	}

?>