/* Admin Signup Script */

<?php
	require 'vendor/autoload.php';
	$client = new MongoDB\Client;
	$ncdb = $client->ncdb;
	$admincoll = $ncdb->admin;
	
	$fname = $_POST['fname'];
    $lname = $_POST['lname'];
	$email = $_POST['email'];
    $phone = $_POST['phone'];
	$uname = $_POST['uname'];
	$password = $_POST['password'];
	$encrypted_pwd = md5($password);
	
	$admincoll->insertOne(
	["fname" => "$fname", "lname" => "$lname", "email" => "$email", "phone" => "$phone", "uname" => "$uname", "password" => "$encrypted_pwd"]
	);
                     
?>