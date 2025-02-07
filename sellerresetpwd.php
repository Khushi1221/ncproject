<?php
session_start();
?>

<!DOCTYPE html>

<html>
      <head>
            <title>Reset Password page</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
            <script type="text/javascript" src="bootstrap/js/jquery-3.5.1.min.js"> </script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"> </script>
            <link rel="stylesheet" type="text/css" href="ncprojectcss.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
            
			<style type="text/css">
				.login-form {
					width: 500px;
					margin: 75px auto;
					margin-top:100px;
				}
				.login-form form {
					margin-bottom: 15px;
					background: #f7f7f7;
					box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
					padding: 30px;
				}
				.login-form h2 {
					margin: 0 0 15px;
				}
				.form-control, .btn {
					min-height: 38px;
					border-radius: 2px;
				}
				.btn {        
					font-size: 15px;
					font-weight: bold;
				}
				.second_box{display:none;}
				.field_error{color:red;}
			</style>
			
      </head>
      <body>
            <div class="navbar navbar-inverse navbar-fixed-top"> 
                  <div class="container header"> 
                        <div class="navbar-header"> 
                        <h3>Newbie's Companion</h3>
                        </div>
                  </div>
             </div>
            
            <div class="login-form">
			<form  method="post">
				<h2 class="text-center">Reset Password</h2>       
				<div class="form-group first_box">
					<input type="text" id="email" class="form-control input-lg" placeholder="Email" required="required">
					<span id="email_error" class="field_error"></span>
				</div>
						<div class="form-group first_box">
						<input type="password" id="password2" class="form-control input-lg" minlength="8"  name="newpassword" placeholder="New Password (minimum 8 characters)" required ><br>
						<i class="bi bi-eye-slash" id="togglePassword2"></i>
						<script type="text/javascript">
						const togglePassword2 = document.querySelector('#togglePassword2');
						const password2 = document.querySelector('#password2');	
						togglePassword2.addEventListener('click', function (e) {
							// toggle the type attribute
							const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
							password2.setAttribute('type', type);
							// toggle the eye / eye slash icon
							this.classList.toggle('bi-eye');
						});
						</script>

						<input type="password" id="password3" class="form-control input-lg" minlength="8"  name="retypepassword" placeholder="Re-type New Password" required ><br>
						<i class="bi bi-eye-slash" id="togglePassword3"></i>
						<span id="pwd_error" class="field_error"></span>
						<script type="text/javascript">
						const togglePassword3 = document.querySelector('#togglePassword3');
						const password3 = document.querySelector('#password3');	
						togglePassword3.addEventListener('click', function (e) {
							// toggle the type attribute
							const type = password3.getAttribute('type') === 'password' ? 'text' : 'password';
							password3.setAttribute('type', type);
							// toggle the eye / eye slash icon
							this.classList.toggle('bi-eye');
						});
						</script>
						</div>
				<div class="form-group first_box">
					<button type="button" class="btn btn-primary btn-block" style="font-size:18px" onclick="send_otp()">Send OTP</button>
				</div>
				<div class="form-group second_box">
					<input type="text" id="otp" class="form-control" placeholder="OTP" required="required">
					<span id="otp_error" class="field_error"></span>
				</div>
				<div class="form-group second_box">
					<button type="button" class="btn btn-primary btn-block" onclick="submit_otp()">Submit OTP</button>
				</div>       
			</form>
			</div>
			
			<script>
			function send_otp(){
				var email=jQuery('#email').val();
				var newpwd=jQuery('#password2').val();
				var retypedpwd=jQuery('#password3').val();
				jQuery.ajax({
					url:'send_otp_s.php',
					type:'post',
					data:{email:email , password2:newpwd , password3:retypedpwd},
					success:function(result){
						if(result=='Proceeding...'){
							jQuery('.second_box').show();
							jQuery('.first_box').hide();
						}
						if(result=='Email does not exists!'){
							jQuery('#email_error').html('Please enter valid email');
						}
						if(result=='New and Retyped passwords does not match!'){
							jQuery('#pwd_error').html('New and Retyped passwords does not match!');
						}
					}
				});
			}

			function submit_otp(){
				var otp=jQuery('#otp').val();
				jQuery.ajax({
					url:'check_otp_s.php',
					type:'post',
					data:'otp='+otp,
					success:function(result){
						if(result=='Logged in successfully!'){
							window.location='changepwd_s.php'
						}
						if(result=='Invalid OTP!'){
							jQuery('#otp_error').html('Please enter valid otp');
						}
					}
				});
			}
			</script>
            
            <footer>	  
					  <div style="float:left; padding-left:50px; padding-top:10px; margin-left:240px">
						<p style="font-size:22px">About Us</p>
						<div style="width:300px">
							<p style="text-align:justify; font-size:16px">Newbie's Companion is a website that makes settlement easy for a new comer in a particular city.<br>It helps the users
							   in finding accommodation, food and stationery thus saving their time and energy.</p>
						</div>
					  </div>
					  <div style="float:left; padding-left:50px; padding-top:10px;">
						<p style="font-size:22px">Locations We Serve</p>
						<div style="width:auto">
							<p style="font-size:16px">Pune, Maharashtra, India</p>
						</div>
					  </div>
					  <div style="float:left; padding-left:50px; padding-top:10px;">
						<p style="font-size:22px">Contact Us</p>
						<div style="width:auto">
							<p style="font-size:16px">+91 9876543210<br>newbiescompanion@gmail.com<br>Some Address</p>
						</div>
					  </div>
					  <br><br><br><br><br><br><br><br><br>
                                    
                      <center>
                            <p style="padding-top: 35px; padding-bottom: 20px">© Copyright 2022 Newbie's Companion. All Rights Reserved.</p>
                      </center>
          </footer>
      </body>
</html>
