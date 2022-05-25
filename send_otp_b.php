<?php
session_start();

//use PHPMailer\PHPMailer\PHPMailer;
require_once('../sendgrid/config.php');
require 'vendor/autoload.php';
require '../sendgrid/vendor/autoload.php';
//require 'C:\xampp\htdocs\test\vendor\phpmailer\phpmailer\src\PHPMailer.php'; 
//require 'C:\xampp\htdocs\test\vendor\phpmailer\phpmailer\src\SMTP.php';  
//require 'C:\xampp\htdocs\test\vendor\phpmailer\phpmailer\src\Exception.php'; 

$con = new MongoDB\Client('mongodb+srv://khushi:khushi123@cluster-nc.nm1fy.mongodb.net/ncdb?retryWrites=true&w=majority');
$db = $con->ncdb;
$userscoll = $db->users;
$buyercoll = $db->buyer;

if(isset($_POST['email']))
{
$email1 = $_POST['email'];
$e = ($_POST['email']);
$_SESSION['em'] = $e;
$res = $userscoll->findOne(["email" => $_POST['email']]);
$count = $userscoll->count();
if($count>0)
{
	if($res)
	{
		
		if(strcmp($_POST['password2'],$_POST['password3'])==0)
		{
			$otp = rand(100000,999999);
			$userscoll->updateOne(["email" => $_POST['email']], ['$set' => ['otp' => $otp, "isexpired" => 0]]);
			$_SESSION['EMAIL']=$email1;
			$_SESSION['password2']=$_POST['password2'];
			$_SESSION['password3']=$_POST['password3'];
			sendOTP($email1, $otp);
			echo "Proceeding...";
		}
		else
		{
			echo "New and Retyped passwords does not match!";
		}
	}
	else
	{
		echo "Email does not exists!";
	}
}
else
{
	echo "Email does not exists!";
}
}

function sendOTP($email1,$otp)
	{	
		$email = new \SendGrid\Mail\Mail(); 
		$email->setFrom("newbiescompanion@gmail.com", "Newbie's Companion");
		$email->setSubject("OTP to Reset Password");
		$email->addTo($email1, "Newbie's Companion user");
		$email->addContent("text/plain","Your One Time Password is ".$otp.".\n\nPlease do not share it with anyone.\n\nFor any queries, please write to us at newbiescompanion@gmail.com.");
		$sendgrid = new \SendGrid( SENDGRID_API_KEY );
		try 
		{
			$response = $sendgrid->send($email);
			//print $response->statusCode() . "\n";
			//print_r($response->headers());
			//print $response->body() . "\n";
		} 
		catch (Exception $e) 
		{
			//echo 'Caught exception: '. $e->getMessage() ."\n";
		}
	}
?>