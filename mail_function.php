<?php
	function sendOTP($email,$otp)
	{
		require('PHPMailer/src/PHPMailer.php');
		require('PHPMailer/src/SMTP.php');
		
		$message_body = "One Time Password for Admin Login is<br><br>".$otp;
		$mail = new PHPMailer();
		$mail->AddReplyTo('krathi1221@gmail.com', 'Khushi Rathi');
		$mail->SetFrom('krathi1221@gmail.com', 'Khushi Rathi');
		$mail->AddAddress($email);
		$mail->Subject = "OTP to Login";
		$mail->MsgHTML($message_body);
		$result = $mail->Send();
		if(!$result)
		{
			echo "Mailer Error: ".$mail->ErrorInfo;
		}
		else
		{
			return $result;
		}
	}
?>