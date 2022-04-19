<?php
	include "mail_function.php";
	date_default_timezone_set("Asia/Kolkata");
	$success = "";
	$error_message = "";
	$con = new MongoDB\Client('mongodb+srv://khushi:khushi123@cluster-nc.nm1fy.mongodb.net/ncdb?retryWrites=true&w=majority');
	$db = $con->ncdb;
	$regusers =$db->registered_users;
	$otpexp = $db->otp_expiry;
	if(!empty($_POST["submit_email"]))
	{
		$res = $regusers->findOne(["email" => $_POST["email"]]);
		$count = $regusers->count();
		if($count > 0)
		{
			// generate OTP
			$otp = rand(100000,999999);
			// send OTP
			$mail_status = sendOTP($_POST["email"],$otp);
			if($mail_status == 1)
			{
				$doccnt = $otpexp->count();
				if($doccnt == 0)
				{
					$idcnt = 1;
				}
				else
				{
					$idcnt = $doccnt + 1;
				}
				$otpexp->insertOne(["id" => $idcnt, "otp" => $otp, "is_expired" => 0, "created_at" => date("d/m/Y-H:i:s")]);
				$current_id = $idcnt;
				if(!empty($current_id))
				{
					$success = 1;
				}
			}
		}
		else
		{
			$error_message = "Email does not exists!";
		}
	}
	if(!empty($_POST["submit_otp"]))
	{
		$otpexp->findOne(["otp" => $_POST["otp"], "is_expired" => 0, 'new Date("d/m/Y-H:i:s")' => 
		['$lte' => $dateAdd =>
		[
         startDate => 'created_at',
         unit => "minute",
         amount => 1
		]
		]
		]);
		$count = $otpexp->count();
		
		if(!empty($count))
		{
			$otpexp->updateOne(['otp' => $_POST["otp"]], ['$set' => ['is_expired' => 1]]);
			$success = 2;
		}
		else
		{
			$success = 1;
			$error_message = "Invalid OTP!";
		}
	}
?>

<html>
<head>
<title> User Login </title>
<style>
body
{
	font-family: calibri;
}
.tblLogin
{
	border: #95bee6 1px solid;
	background: #d1e8ff;
	border-radius: 4px;
	max-width: 300px;
	padding: 20px 30px 30px;
	text-align: center;
}
.tableheader
{
	font-size: 20px;
}
.tablerow
{
	padding: 20px;
}
.error_message
{
	color: #b12d2d;
	background: #ffb5b5;
	border: #c76969 1px solid;
}
.message
{
	width: 100%;
	max-width: 300px;
	padding: 10px 30px;
	border-radius: 4px;
	margin-bottom: 5px;
}
.login-input
{
	border: #CCC 1px solid;
	padding: 10px 20px;
	border-radius: 4px;
}
.btnSubmit
{
	padding: 10px 20px;
	background: #2c7ac5;
	border: #d1e8ff 1px solid;
	color: #FFF;
	border-radius: 4px;
}
</style>
</head>
<body>
	<?php
		if(!empty($error_message)) 
		{
	?>
	<div class="message error_message"><?php echo $error_message; ?></div>
	<?php
		}
	?>
	
	<form name="frmUser" method="post" action="">
		<div class="tblLogin">
			<?php
				if(!empty($success == 1))
				{
			?>
			<div class="tableheader">Enter OTP</div>
			<p style="color: #31ab00";>Check your email for the OTP</p>
			<div class="tablerow">
				<input type="text" name="otp" placeholder="One Time Password" class="login-input" required>
			</div>
			<div class="tableheader"><input type="submit" name="submit_otp" value="Submit" class="btnSubmit"></div>
			<?php
				}
				else if($success == 2)
				{
			?>
			<p style="color: #31ab00;">Welcome! You have successfully logged in!</p>
			<?php
				}
				else
				{
			?>
			<div class="tableheader">Enter your Login Email</div>
			<div class="tablerow"><input type="text" name="email" placeholder="Email" class="login-input" required></div>
			<div class="tableheader"><input type="submit" name="submit_email" value="Submit" class="btmSubmit"></div>
			<?php
				}
			?>
		</div>
	</form>
</body>
</html>


